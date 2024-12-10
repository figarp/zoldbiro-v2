@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto mt-24 bg-white p-6 shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Rendelés leadása sikeres!</h1>
    <p class="text-gray-700">Köszönjük, hogy leadta rendelését, {{ $order->customer_first_name }}!</p>
    <p class="text-gray-700">Hamarosan felvesszük Önnel a kapcsolatot a megadott elérhetőségek valamelyikén.</p>
    <p class="text-gray-700">Az alábbiakban találja a rendelés részleteit:</p>

    <div class="mt-6 border-t pt-4">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Rendelés adatai</h2>
        <ul class="text-gray-700">
            <li><strong>Vezetéknév:</strong> {{ $order->customer_last_name }}</li>
            <li><strong>Keresztnév:</strong> {{ $order->customer_first_name }}</li>
            <li><strong>Email cím:</strong> {{ $order->customer_email }}</li>
            <li><strong>Telefonszám:</strong> {{ $order->customer_phone }}</li>
            <li><strong>Szolgáltatás:</strong> {{ $order->service->name }}</li>
            @if($order->comment)
                <li><strong>Megjegyzés:</strong> {{ $order->comment }}</li>
            @endif
            <li><strong>Várható árazás:</strong> {{ $order->service->price }}</li>
        </ul>
    </div>

    <div class="mt-6">
        <a href="{{ route('orders.create') }}" class="text-blue-500 underline">Új rendelés leadása</a>
    </div>
</div>
@endsection
