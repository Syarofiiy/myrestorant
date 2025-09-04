@extends('customer.layouts.master')

@section('title', 'Order Success')

@section('content')

<div class="container-fluid py-5 d-flex justify-content-center">
    <div class="receipt border p-4 bg-white shadow" style="width: 450px; margin-top: 5rem;">
        <h5 class="text-center mb-2">Order successfully created</h5>
        @if ($order->payment_method == 'cash' && $order->status == 'pending')
            <p class="text-center"><span class="badge bg-danger">Waiting for payment</span></p>
        @elseif ($order->payment_method == 'qris' && $order->status == 'pending')
            <p class="text-center"><span class="badge bg-success">Waiting for payment confirmation</span></p>
        @else
            <p class="text-center"><span class="badge bg-success">Payment successful, your order will be processed soon</span></p>
        @endif
        <hr>
        <h4 class="fw-bold text-center">Kode bayar: <br> <span class="text-primary">{{ $order->order_code }}</span></h4>
        <hr>
        <h5 class="mb-3 text-center">Detail Pesanan</h5>
        <table class="table table-borderless">
            <tbody>
                @foreach ($orderItems as $orderItem)
                <tr>
                    <td>{{ Str::limit($orderItem->item->name, 25)}} ({{ $orderItem->quantity }}) </td>
                    <td class="text-end">{{ 'Rp' . number_format($orderItem->price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <td class="text-end">{{ 'Rp' . number_format($order->subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td class="text-end">{{ 'Rp' . number_format($order->tax, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td class="text-end">{{ 'Rp' . number_format($order->grand_total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        @if ($order->payment_method == 'cash')
            <p class="small text-center">Show this payment code to the cashier to complete your payment. Don't forget to smile!</p>
        @elseif ($order->payment_method == 'qris')
            <p class="small text-center">Yay! Payment successful. Please wait, your order will be processed soon.</p>
        @endif
        <hr>
        <a href="{{ route('menu') }}" class="btn btn-primary w-100">Kembali ke menu</a>
    </div>
</div>

@endsection
