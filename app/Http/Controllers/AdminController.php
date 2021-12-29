<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function silder()
    {
        $slider  = Slider::latest()->get();
        return view('admin.pages.slider', compact('slider'));
    }

    public function storeSlider(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
                'image' => 'required|unique:brands|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Enter title',
                'desc.required' => 'Enter dwscription',
                'image.required' => 'Enter Brand Image',
                'image.unique' => 'Enter unique Image',
                'image.mimes' => 'Enter png,jpg or jpeg Image',
            ]
        );

        $brand_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(1920,1088)->save('image/slider/' . $name_gen);
        $image = 'image/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'descripition' => $request->desc,
            'image' => $image,

        ]);

        return Redirect()->back()->with('success', 'Brand Slider Successfully!!');
    }
}
