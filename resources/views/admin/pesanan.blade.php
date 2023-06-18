@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="h-full w-full p-5">

    <div class="flex flex-col gap-3">
        <a href="{{ route('admin.pesanan.create') }}" class="bg-amber-700 rounded shadow-md p-3 text-amber-50">Tambah</a>
        <div class="bg-white rounded shadow-md grid grid-cols-5">
            <div class="p-3 text-center text-lg font-bold">pemilik</div>
            <div class="p-3 text-center text-lg font-bold">isi</div>
            <div class="p-3 text-center text-lg font-bold">total</div>
            <div class="p-3 text-center text-lg font-bold">terbayar</div>
            <div class="p-3 text-center text-lg font-bold"></div>

        </div>
        <div class="bg-white rounded shadow-md grid grid-cols-5">
            @foreach ($pesanan as $pesanan)
            <div class="p-3 text-center">

                {{ $pesanan['pemilik'] }}
            </div>
            <div class="p-3 text-center">

                {{ $pesanan['isi'] }}
            </div>
            <div class="p-3 text-center">

                RP {{ number_format($pesanan['total'],'2',',','.' ) }}
            </div>
            <div class="p-3 text-center">

                {{ $pesanan['terbayar'] }}
            </div>
            <form action="{{ route('admin.pesanan.destroy',$id = $pesanan['id']) }}" method="post" class="flex justify-center">
                @method('DELETE')
                <a href="{{ route('admin.pesanan.edit',$id = $pesanan['id']) }}" class="bg-blue-500 flex items-center justify-center rounded shadown-sm px-3 m-1"><i class="fa-solid fa-pencil"></i></a>
                @csrf
                <button type="submit" class="bg-red-500 flex items-center justify-center rounded shadown-sm px-3 m-1"><i class="fa-solid fa-trash"></i></button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection