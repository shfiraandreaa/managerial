<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == "admin") {
             return view('category.index');
        }else{
            return redirect(route('dashboard'));
        }
    }

    public function loadData(Request $request)
    {
        $data = Category::select()->get();
        return response()->json(['data'=>$data]);
    }

    public function show(Request $request)
    {
        $data = Category::select()->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $isUpdate = $request->filled('id');
        $store;

        if ($isUpdate) {
            $store = Category::where('id',$request->id)->update([
                'category_name' => $request->category_name
            ]);
            return redirect()->back();
        } else {
            $store = Category::create($request->all());
            return redirect()->back();
        }
    }

    public function delte($id)
    {
        $delete = Category::where('id',$id)->delete();

        if($delete){
            return redirect(route('category.index'));
        }

        return redirect()->back();

    }
}
