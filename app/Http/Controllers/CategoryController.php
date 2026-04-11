<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $category->update($request->all());

            return response()->json($category);
    }
    public function delete($id)
    {
        Category::destroy($id);

        return response()->json([
            'message' => ' deleted success'
        ]);
    }
    public function getCategories($id)
    {
        $prduct = Product::findOrFail($id);
        $categories = $prduct->categories;
        return response()->json($categories);
    }
}