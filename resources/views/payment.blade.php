@extends('master')
@section('title','Payment')
@section('content')
    <div class="container mx-auto px-4 py-8" style="min-height: 85vh;">
        <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Proses Pembayaran</h2>
            <div class="bg-gray-100 p-6 rounded-md w-full text-center">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Total Pembayaran</h3>
                <p class="text-4xl font-bold text-green-600">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <div class="mt-8">
                <button id="payButton" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        const snapToken = "{{ $snapToken }}";
        document.getElementById("payButton").addEventListener("click", function() {
            snap.pay(snapToken, {
                onSuccess: function(result) {
                    fetch("{{ route('checkout.storeTransaction') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            user_id: {{ auth()->user()->id }},
                            product_id: {{ $product->id }},
                            amount: result.gross_amount,
                            payment_method: result.payment_type,
                            transaction_status: 'success',
                            transaction_id: result.transaction_id,
                        })
                    }).then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Pembayaran Berhasil!',
                                text: 'Terima kasih telah melakukan pembayaran.',
                                confirmButtonText: 'Lanjutkan ke Produk',
                                confirmButtonColor: '#3085d6',
                                showCancelButton: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('products', $product->id) }}";
                                }
                            });
                        }).catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Ada masalah saat menyimpan transaksi.',
                            confirmButtonText: 'Tutup',
                            confirmButtonColor: '#d33'
                        });
                    });
                },
                onPending: function(result) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Pembayaran Tertunda!',
                        text: 'Pembayaran Anda sedang diproses, harap tunggu.',
                        confirmButtonText: 'Tutup',
                        confirmButtonColor: '#ff9f00'
                    });
                },
                onError: function(result) {
                    fetch("{{ route('checkout.storeTransaction') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            user_id: {{ auth()->user()->id }},
                            product_id: {{ $product->id }},
                            amount: result.gross_amount,
                            payment_method: result.payment_type,
                            transaction_status: 'failed',
                            transaction_id: result.transaction_id,
                        })
                    }).then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Pembayaran Gagal!',
                                text: 'Ada masalah dengan transaksi Anda, harap coba lagi.',
                                confirmButtonText: 'Tutup',
                                confirmButtonColor: '#d33'
                            });
                        }).catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Ada masalah saat menyimpan transaksi.',
                            confirmButtonText: 'Tutup',
                            confirmButtonColor: '#d33'
                        });
                    });
                }
            });
        });
    </script>
@endsection
