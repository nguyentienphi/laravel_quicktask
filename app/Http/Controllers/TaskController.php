<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks')->with('tasks', $tasks);
    }
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try
        {
            $task = new Task;
            $task->name = $request->name;
            $task->save();   
            $request->session()
            ->flash('status', trans('message.status_add'));

            return redirect()->route('task.index');
        } catch(Exception $e) {
            $request->session()->flash('status', trans('message.fails'));

            return view('massage');
        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }
    public function destroy(Request $request,$id)
    {
        try
        {
            $task = Task::findOrFail($id);
            $task->delete();
            $request->session()->flash('status', trans('message.status_delete'));

            return redirect()->route('task.index');
        } catch(Exception $e) {
            $request->session()
            ->flash('status', trans('message.delete_fails'));

            return view('massage');
        }  
    }
}
