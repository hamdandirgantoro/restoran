<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-5">
                @foreach ($makanan as $makanan)
                <div class="bg-white flex flex-col gap-5 p-3 rounded-md shadow-lg md:shadow-md sm:shadow-sm">
                    <img src="" alt="produk" height="200px" class="shadow-md">
                    <div class="shadow-md text-gray-800">
                        {{ $makanan['nama'] }}
                    </div>
                    <div class="shadow-md text-gray-800">
                        {{ $makanan['harga'] }}
                    </div>
                    <button class="font-medium transition text-gray-600 bg-white hover:text-gray-800 ease-in-out duration-150 h-fit w-fit ml-auto mr-auto px-3 py-2 rounded-lg">Pesan</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>