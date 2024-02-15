<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Account;

class AccountController extends Controller
{
    
    public function index() {
        $accounts = Account::all();
        return view('pages.accounts',compact('accounts'));
    }

    public function create() {
        return view('pages.account-form');
    }

    public function store(Request $request) {

        $account = new Account();

        $account->name      = $request->name;
        $account->balance   = $request->balance;
        $account->type      = $request->type;
        
        try {
            $account->save();
            session()->flash('message','<p class="success">Successfully created the account</p>');
            return redirect('app/accounts');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to create the account</p>');
            return redirect('app/accounts');
        }
    }

    public function edit($id) {
        $account = Account::find($id) or abort(404);
        return view('pages.account-form',compact('account'));
    }

    public function update(Request $request, $id) {

        $account = Account::find($id);

        $account->name      = $request->name;
        $account->balance   = $request->balance;
        $account->type      = $request->type;
        
        try {
            $account->save();
            session()->flash('message','<p class="success">Successfully updated the account</p>');
            return redirect('app/accounts');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to update the account</p>');
            return redirect('app/accounts');
        }
    }

    public function delete($id) {
        $account = Account::find($id) or abort(404);
        
        try {
            $account->delete();
            session()->flash('message','<p class="success">Successfully deleted the account</p>');
            return redirect('app/accounts');
        }
        catch(\Exception $e) {
            session()->flash('message','<p class="error">Failed to delete the account</p>');
            return redirect('app/accounts');
        }
    }
}
