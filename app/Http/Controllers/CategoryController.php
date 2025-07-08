<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
            ]);

            Category::create($data);

            return back();

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}
