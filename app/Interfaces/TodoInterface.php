<?php

namespace App\Interfaces;

interface TodoInterface
{
    public function all(); // Get all tasks
    public function find($id); // Find a task by ID
    public function create(array $data); // Create a task
    public function update(array $data, $id); // Update a task
    public function delete($id); // Delete a task
}
