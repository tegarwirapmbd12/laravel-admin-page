@extends('shared.base', ['title' => 'CRUD Generator'])

@php
    $columnTypes = ['string', 'text', 'longText', 'integer', 'bigInteger', 'boolean', 'date'];

    $columns = old('columns', [['name' => '', 'type' => 'string', 'nullable' => '0']]);
@endphp

@section('styles')
@endsection

@section('content')
    <div class="wrapper">
        @include('shared.partials.topbar') @include('shared.partials.sidenav')

        <div class="content-page">
            <div class="container-fluid">
                @include('shared.partials.page-title', [
                    'subtitle' => 'Tools',
                    'title' => 'CRUD Generator',
                ])

                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-start gap-2" role="alert">
                        <i class="mt-1" data-lucide="check-circle"></i>
                        <div>
                            <div class="fw-semibold">{{ session('success') }}</div>
                            @if (session('output'))
                                <pre class="mb-0 mt-2 small text-reset white-space-pre-wrap">{{ session('output') }}</pre>
                            @endif
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger d-flex align-items-start gap-2" role="alert">
                        <i class="mt-1" data-lucide="circle-alert"></i>
                        <div>
                            <div class="fw-semibold">{{ session('error') }}</div>
                            @if (session('output'))
                                <pre class="mb-0 mt-2 small text-reset white-space-pre-wrap">{{ session('output') }}</pre>
                            @endif
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <div class="fw-semibold mb-1">Periksa kembali input generator.</div>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="crud-generator-form" action="{{ route('crud.generate') }}" method="POST" novalidate>
                    @csrf

                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card">
                                <div class="card-header border-dashed">
                                    <h4 class="card-title mb-0 d-flex align-items-center gap-2">
                                        <i data-lucide="box"></i>
                                        Model
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="model_name">Nama Model</label>
                                        <input class="form-control @error('model_name') is-invalid @enderror"
                                            id="model_name" name="model_name" placeholder="ProductCategory" required
                                            type="text" value="{{ old('model_name') }}">
                                        @error('model_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="sidenav_name">Nama Sidenav</label>
                                        <input class="form-control @error('sidenav_name') is-invalid @enderror"
                                            id="sidenav_name" name="sidenav_name" placeholder="Product Category" required
                                            type="text" value="{{ old('sidenav_name') }}">
                                        @error('sidenav_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="sidenav_icon">Nama Icon</label>
                                        <input class="form-control @error('sidenav_icon') is-invalid @enderror"
                                            id="sidenav_icon" name="sidenav_icon" placeholder="package" required
                                            type="text" value="{{ old('sidenav_icon') }}">
                                        @error('sidenav_icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Gunakan nama icon dari <a href="https://lucide.dev/icons"
                                                target="_blank">Lucide Icons</a></small>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input @checked(old('api')) class="form-check-input" id="api"
                                            name="api" type="checkbox" value="1">
                                        <label class="form-check-label" for="api">Generate API Controller</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xl-8">
                            <div class="card">
                                <div class="card-header align-items-center border-dashed d-flex justify-content-between">
                                    <h4 class="card-title mb-0 d-flex align-items-center gap-2">
                                        <i data-lucide="columns-3"></i>
                                        Kolom
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-3" data-next-index="{{ count($columns) }}" id="columns-wrapper">
                                        @foreach ($columns as $index => $column)
                                            @php
                                                $isNullable = filter_var(
                                                    $column['nullable'] ?? false,
                                                    FILTER_VALIDATE_BOOLEAN,
                                                );
                                            @endphp
                                            <div class="border rounded p-3 column-row">
                                                <div class="row g-2 align-items-start">
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label"
                                                            for="columns_{{ $index }}_name">Nama Kolom</label>
                                                        <input
                                                            class="form-control @error('columns.' . $index . '.name') is-invalid @enderror"
                                                            id="columns_{{ $index }}_name"
                                                            name="columns[{{ $index }}][name]"
                                                            placeholder="product_name" required type="text"
                                                            value="{{ $column['name'] ?? '' }}">
                                                        @error('columns.' . $index . '.name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-2">
                                                        <label class="form-label"
                                                            for="columns_{{ $index }}_type">Tipe Kolom</label>
                                                        <select
                                                            class="form-select @error('columns.' . $index . '.type') is-invalid @enderror"
                                                            id="columns_{{ $index }}_type"
                                                            name="columns[{{ $index }}][type]" required>
                                                            @foreach ($columnTypes as $type)
                                                                <option @selected(($column['type'] ?? 'string') === $type)
                                                                    value="{{ $type }}">{{ $type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('columns.' . $index . '.type')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-2">
                                                        <label class="form-label"
                                                            for="columns_{{ $index }}_nullable">Nullable</label>
                                                        <select
                                                            class="form-select @error('columns.' . $index . '.nullable') is-invalid @enderror"
                                                            id="columns_{{ $index }}_nullable"
                                                            name="columns[{{ $index }}][nullable]" required>
                                                            <option value="0" @selected(!$isNullable)>No</option>
                                                            <option value="1" @selected($isNullable)>Yes
                                                            </option>
                                                        </select>
                                                        @error('columns.' . $index . '.nullable')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-2">
                                                        <label class="form-label d-none d-md-block">&nbsp;</label>
                                                        <button class="btn btn-soft-danger w-100 btn-remove-column"
                                                            title="Hapus kolom" type="button">
                                                            <i data-lucide="trash-2"></i>
                                                            <span class="d-md-none ms-1">Hapus</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer border-0 d-flex justify-content-end">
                                    <button class="btn btn-sm btn-soft-secondary" id="btn-add-column" type="button">
                                        <i class="me-1" data-lucide="plus"></i>
                                        Tambah Kolom
                                    </button>
                                    <button class="btn btn-primary mx-2" id="generate-submit" type="submit">
                                        <i class="me-1" data-lucide="wand-sparkles"></i>
                                        <span data-submit-label>Generate CRUD</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @include('shared.partials.footer')
        </div>
    </div>

    <template id="column-template">
        <div class="border rounded p-3 column-row">
            <div class="row g-2 align-items-start">
                <div class="col-12 col-md-6">
                    <label class="form-label" for="columns___INDEX___name">Nama Kolom</label>
                    <input class="form-control" id="columns___INDEX___name" name="columns[__INDEX__][name]"
                        placeholder="product_name" required type="text">
                </div>

                <div class="col-12 col-md-2">
                    <label class="form-label" for="columns___INDEX___type">Tipe Kolom</label>
                    <select class="form-select" id="columns___INDEX___type" name="columns[__INDEX__][type]" required>
                        @foreach ($columnTypes as $type)
                            <option @selected($type === 'string') value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-2">
                    <label class="form-label" for="columns___INDEX___nullable">Nullable</label>
                    <select class="form-select" id="columns___INDEX___nullable" name="columns[__INDEX__][nullable]"
                        required>
                        <option value="0" selected>No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="col-12 col-md-2">
                    <label class="form-label d-none d-md-block">&nbsp;</label>
                    <button class="btn btn-soft-danger w-100 btn-remove-column" title="Hapus kolom" type="button">
                        <i data-lucide="trash-2"></i>
                        <span class="d-md-none ms-1">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </template>

    @include('shared.partials.customizer') @include('shared.partials.footer-scripts')
@endsection

@section('scripts')
    <script>
        const columnsWrapper = document.getElementById("columns-wrapper");
        const columnTemplate = document.getElementById("column-template");
        const addColumnButton = document.getElementById("btn-add-column");
        const generatorForm = document.getElementById("crud-generator-form");
        const submitButton = document.getElementById("generate-submit");
        let columnIndex = Number(columnsWrapper.dataset.nextIndex || 1);

        addColumnButton.addEventListener("click", () => {
            columnsWrapper.insertAdjacentHTML("beforeend", columnTemplate.innerHTML.replace(/__INDEX__/g,
                columnIndex));
            columnIndex += 1;

            if (window.lucide) {
                window.lucide.createIcons({
                    icons: window.lucide.icons
                });
            }
        });

        columnsWrapper.addEventListener("click", (event) => {
            const removeButton = event.target.closest(".btn-remove-column");

            if (!removeButton) {
                return;
            }

            const rows = columnsWrapper.querySelectorAll(".column-row");
            const row = removeButton.closest(".column-row");

            if (rows.length > 1) {
                row.remove();
                return;
            }

            row.querySelector('input[name$="[name]"]').value = "";
            row.querySelector('select[name$="[type]"]').value = "string";
            row.querySelector('select[name$="[nullable]"]').value = "0";
        });

        generatorForm.addEventListener("submit", () => {
            submitButton.disabled = true;
            submitButton.querySelector("[data-submit-label]").textContent = "Generating...";
        });
    </script>
@endsection
