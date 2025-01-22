<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Galéria') }}
            </h2>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('dashboard.gallery.create') }}">
                Feltöltés
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Modal -->
        <div id="image-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
            <div class="relative bg-white rounded shadow-lg max-w-4xl">
                <button onclick="closeModal()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2">
                    &times;
                </button>
                <img id="modal-image" src="" alt="Modal Image" class="w-full h-auto rounded">
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($images as $image)
                <div class="bg-white shadow rounded overflow-hidden transition-transform transform hover:scale-105 duration-300">
                    <img 
                        src="{{ asset('storage/' . $image->file_path) }}" 
                        alt="{{ $image->title }}" 
                        class="w-full h-48 object-cover cursor-pointer"
                        onclick="openModal('{{ asset('storage/' . $image->file_path) }}')">
                    <div class="p-4">
                        <h3 class="text-lg font-bold">{{ $image->title }}</h3>

                        @if ($image->user_id === auth()->id())
                            <form method="POST" action="{{ route('dashboard.gallery.destroy', $image) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 mt-2">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openModal(imageSrc) {
            const modal = document.getElementById('image-modal');
            const modalImage = document.getElementById('modal-image');
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('image-modal');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>