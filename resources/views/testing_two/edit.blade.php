@extends('shared.base', ['title' => 'Testing Two']) {{-- sesuai dengan nama sidenav --}}

@section('styles')
@endsection
@section('content')
    <div class="wrapper">
        @include('shared.partials.topbar') @include('shared.partials.sidenav')

        <div class="content-page">
            <div class="container-fluid">
                @include('shared.partials.page-title', [
                    'subtitle' => 'Main',
                    'title' => 'Testing Two', // sesuai dengan nama sidenav
                ])
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between" style="border-bottom: none;">
                                <h4 class="card-title">Edit Testing Two</h4> {{-- seuai dengan nama sidenav --}}
                            </div>
                            <div class="card-body">
                                <form action="{{ route('testing_twos.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-2">
                                        <label for="name">{{ ucfirst('name') }}</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $item->name }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="description">{{ ucfirst('description') }}</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            value="{{ $item->description }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('shared.partials.footer')
        </div>
    </div>
    @include('shared.partials.customizer') @include('shared.partials.footer-scripts')
@endsection

@section('scripts')
@endsection
