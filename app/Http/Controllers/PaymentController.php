<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::orderBy('id')->paginate(10);
        return view('payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_by' => 'required',
            'payment_date'=> 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'currency' => 'required',
            'status' => 'required', 
            'description' => 'required'
        ]);

        $data = $request ->except('_token');

        Payment::create($data);

        return redirect()->route('payments.index')->withMessage('Payment information added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);

        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'payment_by' => 'required',
            'payment_date'=> 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'currency' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $data = $request->all();
        $payment->update($data);

        return redirect()->route('payments.index')->withMessage('Payment information has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
