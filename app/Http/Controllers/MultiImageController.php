<?php

namespace App\Http\Controllers;

use App\Models\MultiImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class MultiImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $multiImages = MultiImage::all();
        return view('admin.multi_img.show', compact('multiImages'));
    }

    public function store(Request $request)
    {
        $brand_image = $request->file('image');

        foreach ($brand_image as $data) {

            $name_gen = hexdec(uniqid()) . '.' . $data->getClientOriginalExtension();
            Image::make($data)->resize(300, 300)->save('image/multi/' . $name_gen);
            $image = 'image/multi/' . $name_gen;

            MultiImage::insert([
                'image' => $image,
                'created_at' => Carbon::now(),

            ]);
        } //end for each

        return Redirect()->back()->with('success', 'Images Added Successfully!!');
    }
}
