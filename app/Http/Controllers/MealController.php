<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::with('category')->latest()->get();
        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('meals.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $request->file('image')?->store('meals', 'public');

        Meal::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);

        session()->flash('success', 'Meal created successfully.');
        return redirect()->route('meals.index');
    }

    public function edit(Meal $meal)
    {
        $categories = Category::all();
        return view('meals.edit', compact('meal', 'categories'));
    }

    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($meal->image);
            $image = $request->file('image')->store('meals', 'public');
            $meal->image = $image;
        }

        $meal->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        session()->flash('success', 'Meal updated successfully.');
        return redirect()->route('meals.index');
    }

    public function destroy(Meal $meal)
    {
        Storage::disk('public')->delete($meal->image);
        $meal->delete();
        session()->flash('success', 'Meal deleted successfully.');
        return redirect()->route('meals.index');
    }

    public function show(Meal $meal)
    {
        return view('meals.show', compact('meal'));
    }

}