<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
<h2>Proses Pembayaran</h2>
<form id="payment-form" action="https://app.sandbox.midtrans.com/snap/v1/transactions" method="POST">
    <input type="hidden" name="token" value="{{ $snapToken }}">
    <button type="submit">Bayar Sekarang</button>
</form>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</body>
</html>
