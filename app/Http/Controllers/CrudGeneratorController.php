<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rule;
use Throwable;

class CrudGeneratorController extends Controller
{
    private const COLUMN_TYPES = [
        'string',
        'text',
        'integer',
        'bigInteger',
        'smallInteger',
        'tinyInteger',
        'boolean',
        'date',
        'dateTime',
        'timestamp',
        'decimal',
        'float',
        'double',
        'json',
        'jsonb',
    ];

    public function index()
    {
        return view('crud-generator.index');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'model_name' => ['required', 'string', 'regex:/^[A-Z][A-Za-z0-9]*$/'],
            'sidenav_name' => ['required', 'string', 'max:80', 'regex:/^[A-Za-z0-9][A-Za-z0-9 _-]*$/'],
            'sidenav_icon' => ['required', 'string', 'max:80', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'api' => ['nullable', 'boolean'],
            'columns' => ['required', 'array', 'min:1'],
            'columns.*.name' => ['required', 'string', 'regex:/^[a-z][a-z0-9_]*$/', 'distinct'],
            'columns.*.type' => ['required', Rule::in(self::COLUMN_TYPES)],
        ], [
            'model_name.regex' => 'Nama model harus PascalCase, contoh: ProductCategory.',
            'sidenav_name.regex' => 'Nama sidenav hanya boleh berisi huruf, angka, spasi, garis bawah, atau tanda hubung.',
            'sidenav_icon.regex' => 'Nama icon harus sesuai format Lucide, contoh: package atau book-open-text.',
            'columns.*.name.regex' => 'Nama kolom harus snake_case, contoh: product_name.',
            'columns.*.name.distinct' => 'Nama kolom tidak boleh duplikat.',
        ]);

        $parameters = [
            'name' => $validated['model_name'],
            '--fields' => $this->buildFields($validated['columns']),
            '--sidebar-label' => $validated['sidenav_name'],
            '--sidebar-icon' => $validated['sidenav_icon'],
        ];

        if ($request->boolean('api')) {
            $parameters['--api'] = true;
        }

        try {
            $exitCode = Artisan::call('make:crud', $parameters);
            $output = trim(Artisan::output());
        } catch (Throwable $exception) {
            return back()
                ->withInput()
                ->with('error', $exception->getMessage());
        }

        if ($exitCode !== 0) {
            return back()
                ->withInput()
                ->with('error', 'CRUD gagal digenerate.')
                ->with('output', $output);
        }

        return back()
            ->with('success', 'CRUD berhasil digenerate.')
            ->with('output', $output);
    }

    private function buildFields(array $columns): string
    {
        return collect($columns)->map(function ($col) {
            return trim($col['name']).':'.trim($col['type']);
        })->implode(',');
    }
}
