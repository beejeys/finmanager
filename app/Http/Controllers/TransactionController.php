<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Account;

class TransactionController extends Controller
{
    public function home(Request $request) {
        $date = $request->has('date') ? $request->date:date('Y-m-d');
        $transactions = Transaction::where('type','!=','transfer')->orderBy('happened_at','ASC')->get();
        return view('pages.index',compact('transactions'));
    }

    public function income(Request $request) {
        $date = $request->has('date') ? $request->date:date('Y-m-d');
        $income = Transaction::where('type','income')->where('happened_at',$date)->get();

        return view('pages.income',compact('income'));
    }
    
    public function create_income() {
        $category_rows = Category::where('parent_id',NULL)->where('type','income')->get();
        $accounts = Account::get();
        $categories = $this->getCategories($category_rows);
        return view('pages.income-form',compact('categories','accounts'));
    }
  
    public function store_income(Request $request) {
        
        $transaction = new Transaction();
        $transaction->happened_at   = $request->happened_at;
        $transaction->title         = $request->title;
        $transaction->description   = $request->description;
        $transaction->amount        = $request->amount;
        $transaction->type          = 'income';
        $transaction->category_id   = $request->category_id;
        $transaction->account_to    = $request->account_to;
        $transaction->happened_at   = $request->happened_at;

        try {
            $transaction->save();
            session()->flash('message','<p class="success">Successfully added the income</p>');
            return redirect('app/income'.'?date='.$request->happened_at);
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to add the income</p>'.$e->getMessage());
            return redirect('app/income'.'?date='.$request->happened_at);
        }
    }

    public function edit_income(Request $request, $id) {
        $income = Transaction::where('type','income')->where('id',$id)->first() or abort(404);
        $category_rows = Category::where('parent_id',NULL)->where('type','income')->get();
        $accounts = Account::get();
        $categories = $this->getCategories($category_rows);

        return view('pages.income-form',compact('categories','accounts','income'));
    }
  
    public function update_income(Request $request, $id) {
        
        $transaction = Transaction::where('type','income')->where('id',$id)->first() or abort(404);

        $transaction->happened_at   = $request->happened_at;
        $transaction->title         = $request->title;
        $transaction->description   = $request->description;
        $transaction->amount        = $request->amount;
        $transaction->type          = 'income';
        $transaction->category_id   = $request->category_id;
        $transaction->account_to    = $request->account_to;
        $transaction->happened_at   = $request->happened_at;

        try {
            $transaction->save();
            session()->flash('message','<p class="success">Successfully updated the transaction</p>');
            return redirect('app/income'.'?date='.$request->happened_at);
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to update the transaction</p>'.$e->getMessage());
            return redirect('app/income'.'?date='.$request->happened_at);
        }
    }

    public function expense(Request $request) {
        $date = $request->has('date') ? $request->date:date('Y-m-d');
        $expense = Transaction::where('type','expense')->where('happened_at',$date)->get();

        return view('pages.expense',compact('expense'));
    }

    public function create_expense() {
        $category_rows = Category::where('parent_id',NULL)->where('type','expense')->get();
        $accounts = Account::get();
        $categories = $this->getCategories($category_rows);
        return view('pages.expense-form',compact('categories','accounts'));
    }
  
    public function store_expense(Request $request) {
        
        $transaction = new Transaction();
        $transaction->happened_at = $request->happened_at;
        $transaction->title         = $request->title;
        $transaction->description   = $request->description;
        $transaction->amount        = $request->amount;
        $transaction->type          = 'expense';
        $transaction->category_id   = $request->category_id;
        $transaction->account_from    = $request->account_from;
        $transaction->happened_at   = $request->happened_at;

        try {
            $transaction->save();
            session()->flash('message','<p class="success">Successfully added the expense</p>');
            return redirect('app/expense'.'?date='.$request->happened_at);
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to add the expense</p>'.$e->getMessage());
            return redirect('app/expense'.'?date='.$request->happened_at);
        }
    }

    public function edit_expense(Request $request, $id) {
        $income = Transaction::where('type','expense')->where('id',$id)->first() or abort(404);
        $category_rows = Category::where('parent_id',NULL)->where('type','expense')->get();
        $accounts = Account::get();
        $categories = $this->getCategories($category_rows);

        return view('pages.expense-form',compact('categories','accounts','expense'));
    }
  
    public function update_expense(Request $request, $id) {
        
        $transaction = Transaction::where('type','expense')->where('id',$id)->first() or abort(404);

        $transaction->happened_at   = $request->happened_at;
        $transaction->title         = $request->title;
        $transaction->description   = $request->description;
        $transaction->amount        = $request->amount;
        $transaction->type          = 'expense';
        $transaction->category_id   = $request->category_id;
        $transaction->account_to    = $request->account_to;
        $transaction->happened_at   = $request->happened_at;

        try {
            $transaction->save();
            session()->flash('message','<p class="success">Successfully updated the transaction</p>');
            return redirect('app/expense?date='.$request->happened_at);
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to update the transaction</p>'.$e->getMessage());
            return redirect('app/expense?date='.$request->happened_at);
        }
    }

    public function transfers(Request $request) {
        $date = $request->has('date') ? $request->date:date('Y-m-d');
        $transfers = Transaction::where('type','transfer')->where('happened_at',$date)->get();
        return view('pages.transfers',compact('transfers'));
    }
    
    public function create_transfer() {
        $accounts = Account::get();
        return view('pages.transfer-form',compact('accounts'));
    }
  
    public function store_transfer(Request $request) {
        
        $transaction = new Transaction();
        $transaction->happened_at   = $request->happened_at;
        $transaction->title         = $request->title;
        $transaction->description   = $request->description;
        $transaction->amount        = $request->amount;
        $transaction->type          = 'transfer';
        $transaction->account_from  = $request->account_to;
        $transaction->account_to    = $request->account_to;
        $transaction->happened_at   = $request->happened_at;

        try {
            $transaction->save();
            session()->flash('message','<p class="success">Successfully added the transfer</p>');
            return redirect('app/transfers'.'?date='.$request->happened_at);
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to add the transfer</p>'.$e->getMessage());
            return redirect('app/transfers'.'?date='.$request->happened_at);
        }
    }

    public function edit_transfer(Request $request, $id) {
        $transfer = Transaction::where('type','transfer')->where('id',$id)->first() or abort(404);
        $accounts = Account::get();

        return view('pages.transfer-form',compact('accounts','transfer'));
    }
  
    public function update_transfer(Request $request, $id) {
        
        $transaction = Transaction::where('type','transfer')->where('id',$id)->first() or abort(404);

        $transaction->happened_at   = $request->happened_at;
        $transaction->title         = $request->title;
        $transaction->description   = $request->description;
        $transaction->amount        = $request->amount;
        $transaction->type          = 'transfer';
        $transaction->account_from  = $request->account_from;
        $transaction->account_to    = $request->account_to;
        $transaction->happened_at   = $request->happened_at;

        try {
            $transaction->save();
            session()->flash('message','<p class="success">Successfully updated the transaction</p>');
            return redirect('app/transfers'.'?date='.$request->happened_at);
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to update the transaction</p>'.$e->getMessage());
            return redirect('app/transfers'.'?date='.$request->happened_at);
        }
    }

    public function delete_income($id) {
        $this->delete_transaction($id);
        return redirect('app/income'.'?date='.request()->date);
    }

    public function delete_expense($id) {
        $this->delete_transaction($id);
        return redirect('app/expense'.'?date='.request()->date);
    }

    public function delete_transfer($id) {
        $this->delete_transaction($id);
        return redirect('app/transfers'.'?date='.request()->date);
    }


    public function delete_transaction($id) {
        $transaction = Transaction::find($id) or abort(404);
        
        try {
            $transaction->delete();
            session()->flash('message','<p class="success">Successfully deleted the transaction</p>');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to delete the transaction</p>');
        }

        return;
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
}
