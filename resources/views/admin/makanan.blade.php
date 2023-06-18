@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="h-full w-full p-5">

    <div class="flex flex-col gap-3">
        <a href="{{ route('admin.makanan.create') }}" class="bg-amber-700 rounded shadow-md p-3 text-amber-50">Tambah</a>
        <div class="bg-white rounded shadow-md grid grid-cols-5">
            <div class="p-3 text-center text-lg font-bold">Id</div>
            <div class="p-3 text-center text-lg font-bold">Nama</div>
            <div class="p-3 text-center text-lg font-bold">Harga</div>
            <div class="p-3 text-center text-lg font-bold">Foto</div>
            <div class="p-3 text-center text-lg font-bold"></div>
        </div>
        <div class="bg-white rounded shadow-md grid grid-cols-5">
            @foreach ($makanan as $item)
            <div class="p-3 text-center">

                {{ $item['id'] }}
            </div>
            <div class="p-3 text-center">

                {{ $item['nama'] }}
            </div>
            <div class="p-3 text-center">

                RP {{ number_format($item['harga'],2,',','.') }}
            </div>
            <div class="p-3 text-center">
                <img src="{{ asset('storage/' . $item['foto']) }}" alt="foto">
            </div>
            <form action="{{ route('admin.makanan.destroy',$id = $item['id']) }}" method="post" class="flex justify-center">
                @method('DELETE')
                <a href="{{ route('admin.makanan.edit',$id = $item['id']) }}" class="bg-blue-500 flex items-center justify-center rounded shadown-sm px-3 m-1"><i class="fa-solid fa-pencil"></i></a>
                @csrf
                <button type="submit" class="bg-red-500 flex items-center justify-center rounded shadown-sm px-3 m-1"> <i class="fa-solid fa-trash"></i></button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection