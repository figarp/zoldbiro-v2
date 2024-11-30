<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Megrendelések') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Rendelések</h1>

        <!-- Kereső -->
        <form method="GET" action="{{ route('dashboard.orders') }}" class="mb-4">
            <input type="text" name="search" value="{{ request('search') }}"
                class="border-gray-300 rounded-lg p-2 w-full sm:w-1/2"
                placeholder="Keresés név, email, vagy szolgáltatás alapján...">
            <button type="submit" class="ml-2 text-white bg-blue-500 px-4 py-2 rounded-lg">Keresés</button>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Megrendelő</th>
                        <th class="px-6 py-3">Szolgáltatás</th>
                        <th class="px-6 py-3">Ár</th>
                        <th class="px-6 py-3">Elérhetőségek</th>
                        <th class="px-6 py-3">Megjegyzés</th>
                        <th class="px-6 py-3">Dátum</th>
                        <th class="px-6 py-3">Státusz</th>
                        <th class="px-6 py-3">Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr
                            class="
                        {{ $order->status === 'completed' ? 'text-green-600 bg-green-50' : '' }}
                        {{ $order->status === 'rejected' ? 'text-red-600 bg-red-50 line-through' : '' }}
                        bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600
                    ">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $order->customer_last_name }} {{ $order->customer_first_name }}
                            </td>
                            <td class="px-6 py-4">{{ $order->service->name }}</td>
                            <td class="px-6 py-4">{{ $order->service->price }} Ft</td>
                            <td class="px-6 py-4">{{ $order->customer_email }} <br> {{ $order->customer_phone }}</td>
                            <td class="px-6 py-4">{{ $order->comment ?: '-' }}</td>
                            <td class="px-6 py-4">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-4">{{ ucfirst($order->status) }}</td>
                            <td class="px-6 py-4 text-right">
                                @if ($order->status === 'pending')
                                    <form method="POST" action="{{ route('dashboard.orders.update', $order) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="status" value="completed"
                                            class="text-green-500 hover:underline">Teljesítve</button>
                                        <button type="submit" name="status" value="rejected"
                                            class="text-red-500 hover:underline ml-2">Elutasítva</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center">Nincsenek rendelések.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Lapozás -->
        <div class="mt-6">
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
