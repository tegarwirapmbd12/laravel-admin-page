<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingFourController extends Controller
{

    public function index()
    {
        $items = \App\Models\TestingFour::all();
        return view('backend.testing_four.index', compact('items'));
    }

    public function create()
    {
        return view('backend.testing_four.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        \App\Models\TestingFour::create($validated);
        return redirect()->route('testing_fours.index');
    }

    public function update(Request $request, $uuid)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        $item = \App\Models\TestingFour::where('uuid', $uuid)->firstOrFail();
        $item->update($validated);
        return redirect()->route('testing_fours.index');
    }

    public function show($uuid)
    {
        $item = \App\Models\TestingFour::where('uuid', $uuid)->firstOrFail();
        return view('backend.testing_four.show', compact('item'));
    }

    public function edit($uuid)
    {
        $item = \App\Models\TestingFour::where('uuid', $uuid)->firstOrFail();
        return view('backend.testing_four.edit', compact('item'));
    }

    public function destroy($uuid)
    {
        $item = \App\Models\TestingFour::where('uuid', $uuid)->firstOrFail();
        $item->delete();
        return redirect()->route('testing_fours.index');
    }

}
