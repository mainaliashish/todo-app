<?php

namespace App\Repositories;

use App\Interfaces\TodoInterface;
use App\Models\Todo;

class TodoRepository implements TodoInterface
{
    protected $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function all()
    {
        return $this->todo->all();
    }

    public function find($id)
    {
        return $this->todo->findOrFail($id);
    }

    public function create($request)
    {
        return $this->todo->create($request);
    }

    public function update($request, $id)
    {
        $todo = $this->todo->find($id);
        $todo->update($request);
        return $todo;
    }

    public function delete($id)
    {
        $todo = $this->find($id);
        $todo->delete();
        return true;
    }
}
