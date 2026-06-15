<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleCrudController extends Controller
{

    public function index()
    {
        $items = \App\Models\ExampleCrud::all();
        return view('example_crud.index', compact('items'));
    }

    public function create()
    {
        return view('example_crud.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        \App\Models\ExampleCrud::create($validated);
        return redirect()->route('example_cruds.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $item = \App\Models\ExampleCrud::findOrFail($id);
        $item->update($validated);
        return redirect()->route('example_cruds.index');
    }

    public function show($id)
    {
        $item = \App\Models\ExampleCrud::findOrFail($id);
        return view('example_crud.show', compact('item'));
    }

    public function edit($id)
    {
        $item = \App\Models\ExampleCrud::findOrFail($id);
        return view('example_crud.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $item = \App\Models\ExampleCrud::findOrFail($id);
        $item->update($validated);
        return redirect()->route('example_cruds.index');
    }

    public function destroy($id)
    {
        $item = \App\Models\ExampleCrud::findOrFail($id);
        $item->delete();
        return redirect()->route('example_cruds.index');
    }

}
