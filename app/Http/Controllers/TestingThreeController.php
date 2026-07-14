<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingThreeController extends Controller
{

    public function index()
    {
        $items = \App\Models\TestingThree::all();
        return view('backend.testing_three.index', compact('items'));
    }

    public function create()
    {
        return view('backend.testing_three.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        \App\Models\TestingThree::create($validated);
        return redirect()->route('testing_threes.index');
    }

    public function update(Request $request, $uuid)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        $item = \App\Models\TestingThree::where('uuid', $uuid)->firstOrFail();
        $item->update($validated);
        return redirect()->route('testing_threes.index');
    }

    public function show($uuid)
    {
        $item = \App\Models\TestingThree::where('uuid', $uuid)->firstOrFail();
        return view('backend.testing_three.show', compact('item'));
    }

    public function edit($uuid)
    {
        $item = \App\Models\TestingThree::where('uuid', $uuid)->firstOrFail();
        return view('backend.testing_three.edit', compact('item'));
    }

    public function destroy($uuid)
    {
        $item = \App\Models\TestingThree::where('uuid', $uuid)->firstOrFail();
        $item->delete();
        return redirect()->route('testing_threes.index');
    }

}
