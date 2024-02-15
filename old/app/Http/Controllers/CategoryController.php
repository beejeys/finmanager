<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index() {
        $category_rows = Category::where('parent_id',NULL)->get();
        $categories = $this->getCategories($category_rows);
        return view('pages.categories',compact('categories'));
    }

    function getCategories($categories, $level = 0) {
        $catarray = array();

        foreach($categories as $category) {
            $category->level = $level;
            $catarray[] = $category;
            if($category->children->count()>0) {
                $catarray = array_merge($catarray,$this->getCategories($category->children, $level+1));
            }
        }
        return $catarray;
    }

    public function create() {
        $category_rows = Category::where('parent_id',NULL)->get();
        $categories = $this->getCategories($category_rows);
        return view('pages.category-form',compact('categories'));
    }

    public function store(Request $request) {

        $category = new Category();

        $category->name  = $request->name;
        $category->type  = $request->type;
        $category->parent_id  = $request->parent_id;
        
        try {
            $category->save();
            session()->flash('message','<p class="success">Successfully created the category</p>');
            return redirect('app/categories');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to create the category</p>'.$e->getMessage() );
            return redirect('app/categories');
        }
    }

    public function edit($id) {
        $category = Category::find($id) or abort(404);
        $categories = Category::orderBy('name','asc')->get();
        return view('pages.category-form',compact('category','categories'));
    }

    public function update(Request $request, $id) {

        $category = Category::find($id);

        $category->name  = $request->name;
        $category->type  = $request->type;
        $category->parent_id  = $request->parent_id;
        
        try {
            $category->save();
            session()->flash('message','<p class="success">Successfully updated the category</p>');
            return redirect('app/categories');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to update the category</p>');
            return redirect('app/categories');
        }
    }

    public function delete($id) {
        $category = Category::find($id) or abort(404);
        
        try {
            $category->delete();
            session()->flash('message','<p class="success">Successfully deleted the category</p>');
            return redirect('app/categories');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to delete the category</p>');
            return redirect('app/categories');
        }
    }
}
