<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Task::where('status', 0)->orderBy('id', 'DESC')->get()->jsonSerialize());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $task = Task::create($request->all());

        return response()->json($task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
		{
            $data = $request->all();
            $today = date('Y-m-d');
            if(!array_key_exists('description', $data) || is_null($data['description']) || empty($data['description']))
            {
                $data['description'] = ' ';
            }
            if(!array_key_exists('finished', $data) || is_null($data['finished']) || empty($data['finished']))
            {
                $data['finished'] = $today;
            }
            if(!array_key_exists('remember', $data) || is_null($data['remember']) || empty($data['remember']))
            {
                $data['remember'] = $today;
            }



			$task = Task::create($data);
            return response()->json(['data' => $task,
                'message' => 'Tarefa criada com sucesso.'], 201);
		}
		catch (\Exception $e)
		{
            if(config('app.debug'))
            {
    			return response()->json($e->getMessage(), 400);
    		}
			return response()->json('Houve um erro ao criar a tarefa.', 400);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        try
		{
            $data = $request->all()['param'];
            $today = date('Y-m-d');

            $t = Task::find($data['id']);
            $t->status = $data['status'];
            $t->finished = $today;
            $t->update();
            return response()->json(['data' => $task,
                'message' => 'Tarefa concluída com sucesso.'], 201);
		}
		catch (\Exception $e)
		{
            if(config('app.debug'))
            {
    			return response()->json($e->getMessage(), 400);
    		}
			return response()->json('Houve um erro ao atualizar a tarefa.', 400);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
