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
                <form action="{{ route('pesanan.store') }}" method="post" class="bg-white flex flex-col gap-5 p-3 h-80 rounded-md shadow-lg md:shadow-md sm:shadow-sm">
                    @csrf
                    <a href="{{ route('makanan.detail',$id = $makanan->id ) }}" class=" h-full undraggable-link">
                        <div class=" flex flex-col justify-between h-full">
                            <div class=" h-full flex justify-center items-center bg-gray-100 rounded drop-shadow-sm">
                                <img draggable="false" src="{{ asset('storage/' . $makanan['foto']) }}" alt="produk" height="200px">
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="shadow-md text-gray-800">
                                    {{ $makanan['nama'] }}
                                </div>
                                <div class="shadow-md text-gray-800">
                                    RP {{ number_format($makanan['harga'],2,',','.') }}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="nama" id="nama" value="{{ $makanan['nama'] }}">
                        <input type="hidden" name="harga" id="harga" value="{{ $makanan['harga'] }}">
                    </a>
                    <button type="submit" class="ml-auto mr-auto undraggable-link">pesan</button>

                </form>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>