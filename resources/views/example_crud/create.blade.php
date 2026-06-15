@extends('layouts.app')

@section('content')
<h1>Create ExampleCrud</h1>
<form action="{{ route('example_cruds.store') }}" method="POST">
    @csrf
<div class="form-group">
            <label for="title">{{ ucfirst('title') }}</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="content">{{ ucfirst('content') }}</label>
            <input type="text" class="form-control" name="content" id="content">
        </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
