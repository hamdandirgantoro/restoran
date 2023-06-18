@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="h-full w-full p-5">

    <div class="flex flex-col gap-3">
        <a href="{{ route('admin.makanan.create') }}" class="bg-amber-700 rounded shadow-md p-3 text-amber-50">Tambah</a>
        <div class="bg-white rounded shadow-md grid grid-cols-6">
            <div class="p-3 text-center text-lg font-bold">Id</div>
            <div class="p-3 text-center text-lg font-bold">Nama</div>
            <div class="p-3 text-center text-lg font-bold">Isi</div>
            <div class="p-3 text-center text-lg font-bold">profile pic</div>
            <div class="p-3 text-center text-lg font-bold">Tgl. Dikirim</div>
            <div class="p-3 text-center text-lg font-bold"></div>
        </div>
        <div class="bg-white rounded shadow-md grid grid-cols-6">
            @foreach ($komentar as $item)
            <div class="p-3 text-center">

                {{ $item->id }}
            </div>
            <div class="p-3 text-center">

                {{ $item->user->name }}
            </div>
            <div class="p-3 text-center">

                {{ $item->isi }}
            </div>
            <div class="p-3 text-center">

                {{ $item->created_at }}
            </div>
            <div class="p-3 text-center">
                <img src="{{ asset('storage/' . $item->user->profile_pic) }}" alt="foto">
            </div>
            <form action="{{ route('admin.komentar.destroy',$id = $item['id']) }}" method="post" class="flex justify-center">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-red-500 flex items-center justify-center rounded shadown-sm px-3 m-1"> <i class="fa-solid fa-trash"></i></button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection