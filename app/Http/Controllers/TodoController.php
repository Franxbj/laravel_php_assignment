<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Todo Lists";
        $todo = Todo::all();
        return view('todolists.todo', ["title"=>$title, 'todo'=>$todo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flag = "new";
        $route = "/todo/create";
        return view('todolists.form', ['flag'=>$flag,'route'=>$route]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $valid = $request->validate([
            'todo_name' => 'required|unique:todo|max:100',
            'todo_description' => 'required|min:20'
        ]);



        $todo = Todo::create([
            'todo_name' => $request->todo_name,
            'todo_description' => $request->todo_description,
            'User_id' => auth()->user()->id,
            'Status' => $request->Status
        ]);


        return redirect ('/todo');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        $title = "View Todo Item" ;
        return view('todolists.single', ['title'=>$title, 'todo' =>$todo]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = "/todo/update/$id";
        $flag = "modify";
        $todo = Todo::find($id);
        return view('todolists.form',['route'=>$route, 'flag'=>$flag, 'todo'=>$todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todo_name = $request->todo_name;
        $todo->todo_description = $request->todo_description;
        $todo->Status = $request->Status;
        $todo->update();

        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('todo');
    }
}
