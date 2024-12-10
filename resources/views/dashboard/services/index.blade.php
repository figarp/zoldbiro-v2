<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Szolgáltatások') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="container mx-auto">
                    <h1 class="text-3xl font-bold mb-6">Szolgáltatások módosítása</h1>
                
                    <a href="{{ route('dashboard.services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Új szolgáltatás hozzáadása</a>
                
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Név</th>
                                    <th scope="col" class="px-6 py-3">Leírás</th>
                                    <th scope="col" class="px-6 py-3">Ár</th>
                                    <th scope="col" class="px-6 py-3">Műveletek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr class=" border-b dark:border-gray-700 
                                        {{ !$service->visible ? 'bg-red-50' : 'odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800' }}">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $service->name }}
                                        </th>
                                        <td class="px-6 py-4">{{ $service->description }}</td>
                                        <td class="px-6 py-4">{{ $service->price }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('dashboard.services.edit', $service->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Szerkesztés</a> |
                                            @if ($service->visible)
                                                <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eltávolítás</button>
                                                </form>
                                            @else
                                                <form action="{{ route('dashboard.services.restore', $service->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="font-medium text-green-600 dark:text-green-500 hover:underline">Visszaállítás</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
