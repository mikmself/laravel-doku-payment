<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(Product $product)
    {
        return view('checkout', compact('product'));
    }
    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:15',
            'payment_method' => 'required|string',
        ]);
        $transaction = auth()->user()->transactions()->create([
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'payment_method' => $validated['payment_method'],
            'transaction_status' => 'pending', // status awal
            'transaction_id' => uniqid('trans_'),
        ]);
        alert()->success('Checkout Berhasil', 'Silakan pilih metode pembayaran.');
        return redirect()->route('payment.process', $transaction->id);
    }
}
