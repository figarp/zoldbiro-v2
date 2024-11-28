@extends('layouts.main')

@section('content')
    <div class="container mx-auto mt-24 bg-gray-50 p-6 rounded-lg shadow-lg">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Szolgáltatásaink</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="service-card p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-3">{{ $service->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                    <p class="text-lg font-bold text-gray-900">{{ $service->price }} Ft</p>
                    
                    @if ($service->image_url)
                        <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="mt-4 rounded-md w-full h-48 object-cover object-center">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection