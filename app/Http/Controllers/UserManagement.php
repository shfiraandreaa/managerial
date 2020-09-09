<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserManagement extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == "admin") {
            return view('user.index');

        } else {
            return redirect(route('dashboard'));
        }
        
    }

    public function loadData(Request $request)
    {
        $data = User::select()->get();
        return response()->json(['data'=>$data]);
    }

    public function getData(Request $request)
    {
        $data = User::select()->where('role','staff')->get();
        return response()->json($data);
    }

    public function show(Request $request)
    {
        $data = User::select()->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $isUpdate = $request->filled('$id');
        $store;

        if ($isUpdate) {
            $store = User::where('id'->$request->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back();

        } else {
            $store =  User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back();

        }
        
    }

    public function delete($id)
    {
        $delete = User::where('id',$id)->delete();

        if($delete){
            return redirect(route('user.index'));
        }

        return redirect()->back();
    }
}
