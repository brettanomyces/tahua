<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'amount' => 'required',
            'description' => 'string'
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction);
    }

    public function retrieve(Request $request, $id)
    {
        $transaction = Transaction::with('record')->find($id);

        if (! $transaction) {
            abort(404);
        }

        return response()->json($transaction);
    }

    public function retrieveAll(Request $request)
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (! $transaction) {
            abort(404);
        }

        $transaction->fill($request->all());
        $transaction->save();

        return response()->json($transaction);
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);

        if (! $transaction) {
            abort(404);
        }

        $transaction->delete();

        return response(null, 204);
    }
}
