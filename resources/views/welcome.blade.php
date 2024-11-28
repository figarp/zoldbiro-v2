@extends('layouts.main')

@section('content')
    <header class="pt-40 text-white py-16 bg-black bg-opacity-50">
        <div id="default-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="5000">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="flex justify-end align-bottom w-3/4 m-auto">
                            <div class="pt-40">
                                <h1 class="text-3xl md:text-6xl font-bold mb-4">
                                    Zöldbirodalom Plusz
                                </h1>
                                <p class="text-lg md:text-xl mb-6">
                                    Fűnyírás, kerti munkák és légkondi szerelés – minden, ami otthonod kényelmét és
                                    környezeted
                                    szépségét
                                    szolgálja!
                                </p>
                                <div class="flex justify-start space-x-4">
                                    <a href="#features"
                                        class="bg-white text-green-600 py-3 px-6 rounded-lg text-sm md:text-base font-semibold hover:bg-gray-100 transition">
                                        Kérjen árajánlatot még ma!
                                    </a>
                                </div>
                            </div>
                            <img src="{{ asset('assets/images/zoldbiro_logo.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="flex justify-end align-bottom w-3/4 m-auto">
                            <div class="pt-40">
                                <h1 class="text-3xl md:text-6xl font-bold mb-4">
                                    Coolzone
                                </h1>
                                <p class="text-lg md:text-xl mb-6">
                                    Fűnyírás, kerti munkák és légkondi szerelés – minden, ami otthonod kényelmét és
                                    környezeted
                                    szépségét
                                    szolgálja!
                                </p>
                                <div class="flex justify-start space-x-4">
                                    <a href="#features"
                                        class="bg-white text-green-600 py-3 px-6 rounded-lg text-sm md:text-base font-semibold hover:bg-gray-100 transition">
                                        Kérjen árajánlatot még ma!
                                    </a>
                                </div>
                            </div>
                            <img src="{{ asset('assets/images/coolzone_logo.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
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
                <a href="#fűnyírás"
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
                <a href="#kertgondozás"
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
                <a href="#légkondi"
                    class="inline-block px-6 py-3 bg-green-700 text-white rounded-lg hover:bg-green-800 transition">Tudjon
                    meg többet!</a>
            </div>
        </div>
    </section>

    <section class="bg-black bg-opacity-50 text-white py-16 pt-28">
        <h2 class="text-center text-2xl pb-6">Szolgáltatásaink részletes listáját
            <a href="/" class="underline font-bold" title="szolgáltatások teljes listája">ide kattintva</a>
            tekintheti meg!
        </h2>
    </section>

    <section class="pt-12 bg-gray-100 pb-7" id="gallery">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold pb-7">
                Galéria
            </h2>
            <x-gallery />
        </div>
    </section>
@endsection
