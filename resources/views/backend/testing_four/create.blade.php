@extends('shared.base', ['title' => 'Testing Four'])

@section('styles')
@endsection

@section('content')
    <div class="wrapper">
        @include('shared.partials.topbar') @include('shared.partials.sidenav')

        <div class="content-page">
            <div class="container-fluid">
                @include('shared.partials.page-title', [
                    'subtitle' => 'Main',
                    'title' => 'Testing Four',
                ])
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between" style="border-bottom: none;">
                                <h4 class="card-title">Tambah Testing Four</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('testing_fours.store') }}" method="POST">
                                    @csrf
<div class="form-group mb-2">
                                        <label for="name">{{ ucfirst('name') }}</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="description">{{ ucfirst('description') }}</label>
                                        <input type="text" class="form-control" name="description" id="description">
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