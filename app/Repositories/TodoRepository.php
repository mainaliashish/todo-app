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

    public function create(array $data)
    {
        return $this->todo->create($data);
    }

    public function update($id, array $data)
    {
        $todo = $this->find($id);
        $todo->update($data);
        return $todo;
    }

    public function delete($id)
    {
        $todo = $this->find($id);
        $todo->delete();
        return true;
    }
}
