@extends('layouts.app')

@section('content')
<h1>Edit ExampleCrud</h1>
<form action="{{ route('example_cruds.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="form-group">
            <label for="title">{{ ucfirst('title') }}</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="content">{{ ucfirst('content') }}</label>
            <input type="text" class="form-control" name="content" id="content">
        </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
