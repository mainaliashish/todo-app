<?php

namespace App\Services;

use App\Interfaces\TodoInterface;

class TodoService {
    protected $todoInterface;

    public function __construct(TodoInterface $todoInterface)
    {
        $this->todoInterface = $todoInterface;
    }

    public function all()
    {
        return $this->todoInterface->all();
    }

    public function create($request) 
    {
        $todo = $this->mapTodoFormData($request);
        return $this->todoInterface->create($todo);
    }

    public function find($id) 
    {
        return $this->todoInterface->find($id);
    }

    function update($request, $id)
    {
        $todo = $this->mapTodoFormData($request);
        $todo = $this->todoInterface->update($todo, $id);
        return $todo;
    }

    function delete($id)
    {
        return $this->todoInterface->delete($id);
    }

    private function mapTodoFormData($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
        ];
    }
}