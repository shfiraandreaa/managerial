<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Category;
use App\User;
use Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index');
    }

    public function loadData(Request $request)
    {
        $data = Task::select('tasks.*','categories.category_name','users.username','users.name')
                ->join('categories','tasks.id_category','=','categories.id')
                ->join('users','tasks.id_user','=','users.id')
                ->get();
        return response()->json(['data'=>$data]);
    }

    public function show(Request $request)
    {
        $data = Task::select()
                ->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $isUpdate = $request->filled('id');
        $store;

        if ($isUpdate) {
            $store = Task::where('id',$request->id)->update([
                'id_user_manager' => Auth::user()->id,
                'id_user' => $request->id_user,
                'id_category' => $request->id_category,
                'task_name' => $request->task_name,
                'desc' => $request->desc,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date
            ]);

        } else {
            $store =  Task::create([
                'id_user_manager' => Auth::user()->id,
                'id_user' => $request->id_user,
                'id_category' => $request->id_category,
                'task_name' => $request->task_name,
                'desc' => $request->desc,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date
            ]);

        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = Task::where('id',$id)->delete();

        if($delete){
            return redirect(route('task.index'));
        }

        return redirect()->back();

    }
}
