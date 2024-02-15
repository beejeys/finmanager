<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class BudgetController extends Controller
{
    function index() {

        $tree = Category::tree();
        return view('pages.budget');
    }
}
