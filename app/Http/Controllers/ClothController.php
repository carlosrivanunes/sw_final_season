<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use Illuminate\Http\Request;

class ClothController extends Controller
{
    public function index()
    {
        $clothes = Cloth::latest()->paginate(10);
        return view('clothes.index', compact('clothes'));
    }

    public function create()
    {
        return view('clothes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('clothes', 'public');
        }

        Cloth::create($validated);

        return redirect()->route('clothes.index')->with('success', 'Roupa cadastrada com sucesso!');
    }

    public function show($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('clothes.show', compact('cloth'));
    }

    public function edit($id)
    {
        $cloth = Cloth::findOrFail($id);
        return view('clothes.edit', compact('cloth'));
    }

    public function update(Request $request, $id)
    {
        $cloth = Cloth::findOrFail($id);

        $data = $request->validate([
            'brand' => 'required|string',
            'type' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('clothes', 'public');
        }

        $cloth->update($data);

        return redirect()->route('clothes.show', $cloth->id)->with('success', 'Roupa atualizada com sucesso!');
    }

    public function destroy(Cloth $cloth)
    {
        $cloth->delete();
        return redirect()->route('clothes.index')->with('success', 'Roupa removida com sucesso!');
    }
}