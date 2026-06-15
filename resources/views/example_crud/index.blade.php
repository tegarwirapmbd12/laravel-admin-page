@extends('layouts.app')

@section('content')
<h1>ExampleCrud List</h1>
<a href="{{ route('example_cruds.create') }}" class="btn btn-primary mb-3">Create New ExampleCrud</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
<th>{{ ucfirst('title') }}</th>
                <th>{{ ucfirst('content') }}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
<td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
            <td>
                <a href="{{ route('example_cruds.show', $item->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('example_cruds.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('example_cruds.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
