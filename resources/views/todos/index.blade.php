@extends('layouts')

@section('content')
<div class="row">
    <div class="col-xl-6 m-auto">
        <form action="{{ route("todos.store") }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="Description">Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" id="title"/>
            </div>

            <div class="form-group mb-3">
                <label for="Description">Description</label>
                <textarea class="form-control" placeholder="Description" name="Description" id="Description"></textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection