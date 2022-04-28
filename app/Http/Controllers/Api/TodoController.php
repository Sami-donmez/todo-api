<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::where('user_id', auth('api')->id())->get();
        return new TodoCollection($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest $request)
    {
        try {
            $todo = new  Todo();
            $todo->user_id = auth('api')->id();
            $todo->content = $request->get('content');
            $todo->status = $request->get('status');
            $todo->save();
            return response()->json([
                'message' => "Todo Eklendi",
                'data' => $todo
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        try {
            $todo->content = $request->get('content');
            $todo->status = $request->get('status');
            $todo->save();
            return response()->json([
                'message' => "Todo Güncellendi",
                'data' => $todo
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
            return response()->json([
                'message' => "Todo Güncellendi",
                'data' => $todo
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "error" => $exception->getMessage()
            ], 500);
        }
    }
}
