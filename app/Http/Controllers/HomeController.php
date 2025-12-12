<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show all meals on the homepage
    public function index()
    {
        $meals = Meal::with('category')->latest()->get();
        $categories = Category::all();
        return view('home', compact('meals', 'categories'));
    }

    // Filter meals by category
    public function category($id)
    {
        $meals = Meal::where('category_id', $id)->get();
        $categories = Category::all();
        return view('home', compact('meals', 'categories'));
    }
}