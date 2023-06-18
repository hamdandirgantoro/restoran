<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-5">

            <a href="{{route('pesanan')}}" class="font-semibold text-xl leading-tight inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                Belum Dibayar
            </a>
            <a href="{{ route('pesananterbayar') }}" class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                Sudah Dibayar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($pesanan as $pesanan)
            <div action="/pembayaran" method="post" class="flex flex-col bg-white gap-5 p-5">
                <div>{{ $pesanan['pemilik'] }}</div>
                <div>{{ $pesanan['isi'] }}</div>
                <div>RP {{ number_format($pesanan['total'],2,',','.' ) }}</div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>