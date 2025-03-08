<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use App\Services\TodoService;
use Illuminate\Contracts\View\View;

class TodoController extends Controller
{
    public $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = $this->todoService->all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoFormRequest $request)
    {
        $result = $this->todoService->create($request);
        if ($result) {
            return back()->with('success', 'Todo has been created.');
        } else {
            return back()->with('error', 'Unable to create todo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = $this->todoService->find($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todos = $this->todoService->all();
        $todo = $this->todoService->find($id);
        return view('todos.index', compact('todos','todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoFormRequest $request, string $id)
    {
        $result = $this->todoService->update($request, $id);
        if ($result) {
            return back()->with('success', 'Todo has been updated.');
        } else {
            return back()->with('error', 'Unable to update todo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->todoService->delete($id);
        return back()->with('success', 'Todo has been deleted.');
    }
}
