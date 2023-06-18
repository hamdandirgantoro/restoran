<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-5">

            <a href="{{route('pesanan')}}" class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                Belum Dibayar
            </a>
            <a href="{{ route('pesananterbayar') }}" class="font-semibold text-xl leading-tight inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Sudah Dibayar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="bg-red-500 text-center mb-3 rounded flex p-5 shadow-md justify-between">
                <div>{{ session('error') }}</div> <a href="{{ route('pesanan') }}"><i class="fa-solid fa-x"></i></a>
            </div>
            @endif
            @if (session('success'))
            <div class="bg-green-500 text-center mb-3 rounded flex p-5 shadow-md justify-between">
                <div>{{ session('success') }}</div> <a href="{{ route('pesanan') }}"><i class="fa-solid fa-x"></i></a>
            </div>
            @endif
            @foreach ($pesanan as $pesanan)
            <form action="{{ route('pesanan.update',$id = $pesanan['id']) }}" method="post" class="flex flex-col bg-white gap-5 p-5 shadow-md">
                @csrf
                @method('PUT')
                <div>{{ $pesanan['pemilik'] }}</div>
                <div>{{ $pesanan['isi'] }}</div>
                <div>RP {{ number_format($pesanan['total'],2,',','.' ) }}</div>
                <input type="hidden" name="pemilik" value="{{ $pesanan['pemilik'] }}">
                <input type="hidden" name="isi" value="{{ $pesanan['isi'] }}">
                <input type="hidden" name="total" value="{{ $pesanan['total'] }}">
                <button type="submit">bayar</button>
            </form>
            @endforeach
        </div>
    </div>
</x-app-layout>