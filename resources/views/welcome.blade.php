@extends('layouts.main')

@section('content')
<header id="mainHeader" class="relative w-full h-screen overflow-hidden">
    <!-- Slide Container -->
    <div id="slider" class="relative h-full">
      <!-- Slide 1 -->
      <div class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity duration-500" style="opacity: 1;">
        <div class="text-center text-white max-w-2xl px-6">
          <img src="{{asset('assets/images/zoldbiro_logo.PNG')}}" alt="Image 1" class="mx-auto mb-6 rounded-lg w-full max-w-lg">
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Zöldbirodalom Plusz</h1>
          <div class="text-center">
                <p class="text-lg md:text-xl mb-6">Fűnyírás, fűkaszálás, gyepszellőztetés, gyeplyuggatás</p>
                <p class="text-lg md:text-xl mb-6">Kiskunmajsán és területén</p>
          </div>
          <a href="{{route('orders.create')}}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition">Kérjen ajánlatot még ma!</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity duration-500 opacity-0">
        <div class="text-center text-white max-w-2xl px-6">
          <img src="{{asset('assets/images/coolzone_logo.png')}}" alt="Image 2" class="mx-auto mb-6 rounded-lg shadow-lg w-full max-w-lg">
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Coolzone</h1>
          <div class="text-center">
              <p class="text-lg md:text-xl mb-6">Klímatelepítés, hőszivattyútelepítés</p>
              <p class="text-lg md:text-xl mb-6">Klíma készülékek javítása, karbantartása, tisztítása és fertőtlenítése</p>
              <p class="text-lg md:text-xl mb-6">Autó klíma javítás, karbantartás</p>
          </div>
          <a href="{{route('orders.create')}}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-6 rounded-lg transition">Kérjen ajánlatot még ma</a>
        </div>
      </div>
    </div>

    <!-- Navigation (optional) -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3">
      <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 focus:outline-none" data-slide="1"></button>
      <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 focus:outline-none" data-slide="2"></button>
    </div>
  </header>
    <section class="pt-20 bg-gray-100">
        <h2 class="text-3xl font-semibold text-center">Kiemelt Szolgáltatásaink</h2>
        <div class="flex flex-col md:flex-row justify-between gap-5 p-10">
            <div class="flex-1 bg-white p-5 text-center rounded-lg shadow-md">
                <div class="flex justify-center mb-2">
                    <img class="rounded w-full h-60 object-cover transition duration-300 ease-in-out hover:brightness-75"
                        src="{{ asset('assets/images/funyiras-min.png') }}" alt="Fűnyírás">
                </div>
                <h3 class="text-green-800 mb-2">Fűnyírás</h3>
                <p class="text-gray-600 mb-5">Tökéletesen ápolt pázsit, gyors és precíz fűnyírás a legjobb eredményért.
                </p>
                <a href="{{route('orders.create')}}"
                    class="inline-block px-6 py-3 bg-green-700 text-white rounded-lg hover:bg-green-800 transition">Tudjon
                    meg többet!</a>
            </div>
            <div class="flex-1 bg-white p-5 text-center rounded-lg shadow-md">
                <div class="flex justify-center mb-2">
                    <img class="rounded w-full h-60 object-cover transition duration-300 ease-in-out hover:brightness-75"
                        src="{{ asset('assets/images/kert-min.png') }}" alt="Kertgondozás">
                </div>
                <h3 class="text-green-800 mb-2">Kertgondozás</h3>
                <p class="text-gray-600 mb-5">Gondoskodunk a kerted minden apró részletéről, a metszéstől kezdve a fák
                    és virágok ápolásáig.</p>
                <a href="{{route('orders.create')}}"
                    class="inline-block px-6 py-3 bg-green-700 text-white rounded-lg hover:bg-green-800 transition">Tudjon
                    meg többet!</a>
            </div>
            <div class="flex-1 bg-white p-5 text-center rounded-lg shadow-md">
                <div class="flex justify-center mb-2">
                    <img class="rounded w-full h-60 object-cover transition duration-300 ease-in-out hover:brightness-75"
                        src="{{ asset('assets/images/klima-min.png') }}" alt="Légkondi tisztítás">
                </div>
                <h3 class="text-green-800 mb-2">Klímatisztítás</h3>
                <p class="text-gray-600 mb-5">Hűvös otthon egész évben. Szakszerű telepítés és karbantartás
                    légkondicionálókhoz.</p>
                <a href="{{route('orders.create')}}"
                    class="inline-block px-6 py-3 bg-green-700 text-white rounded-lg hover:bg-green-800 transition">Tudjon
                    meg többet!</a>
            </div>
        </div>
    </section>

    <section class="bg-black bg-opacity-50 text-white py-16 pt-28">
        <h2 class="text-center text-2xl pb-6">Szolgáltatásaink részletes listáját
            <a href="{{route('services.index')}}" class="underline font-bold" title="szolgáltatások teljes listája">ide kattintva</a>
            tekintheti meg!
        </h2>
    </section>

    {{-- <section class="pt-12 bg-gray-100 pb-7" id="gallery">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold pb-7">
                Galéria
            </h2>
            <x-gallery />
        </div>
    </section> --}}
@endsection
