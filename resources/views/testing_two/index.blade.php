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
                            <div class="card-header justify-content-between">
                                <h4 class="card-title">Pencarian</h4>
                                <a href="{{ route('testing_twos.create') }}"
                                    class="icon-link icon-link-hover link-secondary link-underline-secondarlink-secondary link-underline-opacity-25 fw-semibold">
                                    Tambah
                                    <i data-lucide="plus" class="bi align-middle fs-lg"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('testing_twos.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-6">
                                        <label for="validationDefault03" class="form-label">Nama</label>
                                        <input type="text" name="search_name" class="form-control me-2"
                                            placeholder="Cari berdasarkan nama..." value="{{ request('search_name') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationDefault04" class="form-label">Deskripsi</label>
                                        <input type="text" name="search_description" class="form-control me-2"
                                            placeholder="Cari berdasarkan deskripsi..."
                                            value="{{ request('search_description') }}">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped align-middle mb-0">
                                        <thead class="align-middle table-dark">
                                            <tr class="text-uppercase fs-xxs">
                                                <th>No</th>
                                                <th>{{ ucfirst('name') }}</th>
                                                <th>{{ ucfirst('description') }}</th>
                                                <th style="width: 1%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td class="text-end">
                                                        <div class="dropdown text-muted">
                                                            <a href="#"
                                                                class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i data-lucide="ellipsis-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="{{ route('testing_twos.show', $item->id) }}"
                                                                    class="dropdown-item">
                                                                    <i data-lucide="eye" class="me-1"></i>
                                                                    View
                                                                </a>
                                                                <a href="{{ route('testing_twos.edit', $item->id) }}"
                                                                    class="dropdown-item">
                                                                    <i data-lucide="square-pen" class="me-1"></i>
                                                                    Edit
                                                                </a>
                                                                <a href="#" class="dropdown-item text-danger"
                                                                    onclick="event.preventDefault(); 
                                                                    if(confirm('Yakin ingin menghapus item ini?')) { 
                                                                        document.getElementById('delete-form-{{ $item->id }}').submit(); 
                                                                    }">
                                                                    <i data-lucide="trash-2" class="me-1"></i>
                                                                    Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('testing_twos.destroy', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
