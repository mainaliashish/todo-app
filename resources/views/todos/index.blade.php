@extends('layouts')

@section('content')
    <div class="row">
        <div class="col-xl-8 m-auto">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @elseif($message = Session::get('error'))
                <div class="alert alert-danger">{{ $message }}</div>
            @endif
            <form action="{{ isset($todo) ? route('todos.update', $todo->id) : route('todos.store') }}" method="POST">
                @csrf
                @if (isset($todo))
                    @method('PUT')
                @endif

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title" id="title"
                        value="{{ old('title', $todo->title ?? '') }}" />
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" placeholder="Description" name="description" id="description">{{ old('description', $todo->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn {{ isset($todo) ? 'btn-info' : 'btn-primary' }}">
                        {{ isset($todo) ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </form>

            {{-- List out the todos --}}
            <div class="table-responsive mt-3">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr class="">
                                <td scope="row">{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning w-100 mb-2">
                                        Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                        class="w-100 btn-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
