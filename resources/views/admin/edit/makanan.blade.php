@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="flex p-5">

    @foreach ($makanan as $item)
    <form action="{{route('admin.makanan.update',$id = $item['id'])}}" method="post" enctype="multipart/form-data" class="bg-white h-fit w-full flex flex-col gap-3 p-5 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="text-center text-lg font-bold">Nama</div>
        <input type="text" name="nama" value="{{$item['nama']}}">
        <div class="text-center text-lg font-bold">Harga</div>
        <input type="text" name="harga" value="{{$item['harga']}}">
        <div class="text-center text-lg font-bold">Deskripsi</div>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="8">{{ $item->deskripsi }}</textarea>
        <div class="text-center text-lg font-bold">foto</div>
        <input type="file" name="foto" id="foto">
        <input type="submit" value="submit" class="bg-red-500 p-3 rounded drop-shadow text-gray-900">
    </form>
    @endforeach
</div>
@endsection