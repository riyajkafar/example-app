<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
{
    $accounts = Account::all();
    return view('accounts.index', compact('accounts'));
}

public function create()
{
    return view('accounts.create');
}

public function store(Request $request)
{
    $data = $request->except('_token');
    
    $account = new Account($data);
    $account->save();

    return redirect()->route('accounts.index');
}

public function edit(Account $account)
{
    return view('accounts.edit', compact('account'));
}

public function update(Request $request, Account $account)
    {
        // Validate the request data
        $request->validate([
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'address' => 'required',
            'nic_number' => 'required',
        ]);

        // Update the account with the validated data
        $account->update([
            'account_holder_name' => $request->input('account_holder_name'),
            'account_number' => $request->input('account_number'),
            'address' => $request->input('address'),
            'nic_number' => $request->input('nic_number'),
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

public function destroy(Account $account)
{
    $account->delete();

    return redirect()->route('accounts.index');
}


}
