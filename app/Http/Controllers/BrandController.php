<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.show', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:brands|min:4',
                'image' => 'required|unique:brands|mimes:png,jpg,jpeg',
            ],
            [
                'name.required' => 'Enter Brand Name',
                'name.unique' => 'Enter unique Name',
                'name.max' => 'Enter Name at least 10',
                'image.required' => 'Enter Brand Image',
                'image.unique' => 'Enter unique Image',
                'image.mimes' => 'Enter png,jpg or jpeg Image',
            ]
        );

        $brand_image = $request->file('image');

        // $name_gen = hexdec(uniqid());
        // $img_extention = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_extention;                                   //21232323.png
        // $upload_location = 'image/brand/';
        // $image = $upload_location . $img_name;
        // $brand_image->move($upload_location, $img_name);

        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();     //using imaage intevention package
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);
        $image = 'image/brand/' . $name_gen;

        Brand::insert([
            'name' => $request->name,
            'image' => $image,
            'created_at' => Carbon::now(),

        ]);

        $alert = array(                                 //custom alerts
            'message' => 'Brand Added Successfully!!',
            'alert-type' => 'success'
        );


        return Redirect()->back()->with($alert);
    }

    public function editView($id)
    {
        $data = Brand::find($id);
        return view('admin.brand.edit', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|min:4',
            ],
            [
                'name.required' => 'Enter Brand Name',
                'name.min' => 'Enter Name at least 4',
            ]
        );

        $old_image = $request->old_image;

        $brand_image = $request->file('image');

        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_extention = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_extention;            //21232323.png
            $upload_location = 'image/brand/';
            $image = $upload_location . $img_name;
            $brand_image->move($upload_location, $img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'name' => $request->name,
                'image' => $image,
                'created_at' => Carbon::now(),

            ]);

            return Redirect()->back()->with('success', 'Brand Updated Successfully!!');
        } else {
            Brand::find($id)->update([
                'name' => $request->name,
                'created_at' => Carbon::now(),

            ]);

            return Redirect()->back()->with('success', 'Brand Updated Successfully!!');
        }
    }

    public function delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand Delete Successfully!!');
    }
}
