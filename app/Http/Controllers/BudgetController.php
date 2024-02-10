<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Budget;

class BudgetController extends Controller
{
    function index(Request $request) {

        $month = $request->has('month') ? $request->month:date('n');
        $year = $request->has('year') ? $request->year:date('Y');

        $budget = Budget::with('categories')->where(['month'=>$month, 'year'=>$year])->get();

        $income = Category::tree(['type'=>'income']);
        $expense = Category::tree(['type'=>'expense']);

        return view('pages.budget',compact('income','expense','budget', 'month', 'year'));
    }

    function store(Request $request) {

        foreach($request->categories as $category_id=>$amount) {

            if(!$budget = Budget::where(['month'=>$request->month, 'year'=>$request->year, 'category_id'=>$category_id])->first()) 
               $budget = new Budget();

            $budget->month  = $request->month;
            $budget->year   = $request->year;
            $budget->amount = $amount;
            $budget->category_id=$category_id;
            $budget->save();

            try {
                $budget->save();
            }
            catch(\Exception $e) {
                session()->flash('message','<p class="error">Problem while updating the budget</p>'.$e->getMessage() );
                return redirect('app/budget');
            }
        }

        session()->flash('message','<p class="success">Successfully updated the budget</p>');
        return redirect('app/budget?month='.$request->month.'&year='.$request->year);

    }
}
