@extends('layouts.app')

@section('content')
<h1>ExampleCrud Details</h1>
<div class="card">
    <div class="card-body">
        @foreach ($item->getAttributes() as $key => $value)
            @if (!in_array($key, ['id', 'created_at', 'updated_at']))
                <div class="row mb-2">
                    <div class="col-sm-3 font-weight-bold">
                        {{ ucfirst(str_replace('_', ' ', $key)) }}:
                    </div>
                    <div class="col-sm-9">
                        {{ $value }}
                    </div>
                </div>
            @endif
        @endforeach
        <a href="{{ route('example_cruds.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
</div>
@endsection
