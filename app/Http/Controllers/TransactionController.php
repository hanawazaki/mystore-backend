<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Transaction::all();
        return view('pages.transactions.index')->with(['items' => $items]);
    }

    public function show($id)
    {
        $item = Transaction::with('details.product')->findOrFail($id);

        return view('pages.transactions.show')->with([
            'item' => $item
        ]);
    }

   
    public function edit($id)
    {
        $item = Transaction::findOrfail($id);

        return view('pages.transactions.edit')->with([
            'item' => $item
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);
        $item->update($data);
        
        return redirect()->route('transactions.index');
    }

  
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transactions.index');
    }

    public function setstatus(Request $request, $id)
    {
        $request->validate([
            'status'=>'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $item = Transaction::findOrFail($id);
        $item->transaction_status = $request->status;

        $item->save();

        return redirect()->route('transactions.index');
    }
}
