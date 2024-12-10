<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;

class CheckoutController extends Controller
{
    public function checkoutForm()
    {
        $product = Product::find(1);
        return view('checkout', compact('product'));
    }
    public function processCheckout(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $transactionDetails = array(
            'order_id' => 'order_' . time(),
            'gross_amount' => (int) Product::where('id', 1)->first()->price,
        );
        $customerDetails = array(
            'first_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        );
        $payment = array(
            'payment_type' => $request->payment_method,
        );
        $transaction = array(
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'payment' => $payment,
        );
        try {
            $snapToken = Snap::getSnapToken($transaction);
            $product = Product::where('id', 1)->first();
            return view('payment', compact('snapToken','product'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
