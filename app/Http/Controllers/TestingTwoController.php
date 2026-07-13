<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingTwoController extends Controller
{

    public function index()
    {
        $items = \App\Models\TestingTwo::all();
        return view('testing_two.index', compact('items'));
    }

    public function create()
    {
        return view('testing_two.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        \App\Models\TestingTwo::create($validated);
        return redirect()->route('testing_twos.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $item = \App\Models\TestingTwo::findOrFail($id);
        $item->update($validated);
        return redirect()->route('testing_twos.index');
    }

    public function show($id)
    {
        $item = \App\Models\TestingTwo::findOrFail($id);
        return view('testing_two.show', compact('item'));
    }

    public function edit($id)
    {
        $item = \App\Models\TestingTwo::findOrFail($id);
        return view('testing_two.edit', compact('item'));
    }

    public function destroy($id)
    {
        $item = \App\Models\TestingTwo::findOrFail($id);
        $item->delete();
        return redirect()->route('testing_twos.index');
    }

}
