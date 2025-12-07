<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    private function validateCategory(Request $request, $action = null)
    {
        try {

            $rules_store = [];

            $rules_update = [];

            $rules = [
                'rules_store'   =>  $rules_store,
                'rules_update'   =>  $rules_update,
            ];

            if (isset($rules[$action])) return $request->validate($rules[$action]);

        } catch (ValidationException $e) {
            return back()->withErrors($e->validator);
        }
    }

    public function store()
    {
        
    }

    public function update()
    {
        
    }


    public function index()
    {
        return view('Category.index');
    }
    public function create()
    {
        return view('Category.create');
    }
    public function edit()
    {
        return view('Category.edit');
    }
}
