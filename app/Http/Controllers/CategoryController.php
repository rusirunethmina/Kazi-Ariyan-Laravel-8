<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {
        // $category = Category::all();                                   //take all daata using ORM
        // $category = Category::latest()->get();                         //take all data and show latest one in top using ORM
        // $category =  DB::table('categories')->latest()->get();         //take all data and show latest in top using query builder

        // $category = DB::table('categories')                             //join two tabels(relationship using query builder)
        //            ->join('users','categories.user_id','users.id')
        //            ->select('categories.*','users.name')
        //            ->latest()->paginate(5);

        $category = Category::latest()->paginate(5);                             //paginate
        $trash = Category::onlyTrashed()->latest()->paginate(3);                 //soft deletes items

        return view('admin.category.show', compact('category', 'trash'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|unique:categories|max:255',
            ],
            [
                'name.required' => 'Please enter category name',
                'name.unique' => 'Please enter unique name',
                'name.max' => 'Please enter at least 5 cha',
            ]
        );

        Category::insert([                                //1 st step using ORM
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // $cateogry = new Category;                           //2 nd step using ORM
        // $cateogry->name = $request->name;
        // $cateogry->user_id = Auth::user()->id;
        // $cateogry->save();

        // Category::create([                                    //3 rd step using ORM
        //     'name' => $request->name,
        //     'user_id' => Auth::user()->id,
        // ]);

        // $data = array();                                          //4 th step using query builder
        // $data['name'] = $request->name;
        // $data['user_id'] = Auth::user()->id;
        // $data['created_at'] = Carbon::now();
        // DB::table('categories')->insert($data);

        // return redirect('/category');
        // return Redirect()->back();
        return Redirect()->back()->with('success', 'Category Added Successfully!!');
    }

    public function editView($id)
    {
        $data = Category::find($id);                                              //using ORM
        // $data = DB::table('categories')->where('id',$id)->first();              //using query builder
        return view('admin.category.edit', compact('data'));
    }

    public function edit(Request $request, $id)
    {

        Category::find($id)->update([                                            //using ORM
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        // $data = array();                                                            //using query builder
        // $data['name'] = $request->name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->where('id',$id)->update($data);


        return Redirect()->route('category')->with('success', 'Category Updated Successfully!!');
    }

    public function softDelete($id)
    {
        Category::find($id)->delete();

        return Redirect()->back()->with('success', 'Category Soft Deleted Successfully!!');
    }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restore Successfully!!');
    }

    public function permantDelete($id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Permantly Delete Successfully!!');
    }
}
