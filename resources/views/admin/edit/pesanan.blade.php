@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="flex p-5">

    @foreach ($pesanan as $item)
    <form action="{{route('admin.pesanan.update',$id = $item['id'])}}" method="post" class="bg-white h-fit w-full flex flex-col gap-3 p-5 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="text-center text-lg font-bold">Pemilik</div>
        <input type="text" name="pemilik" value="{{$item['pemilik']}}">
        <div class="text-center text-lg font-bold">Isi</div>
        <input type="text" name="isi" value="{{$item['isi']}}">
        <div class="text-center text-lg font-bold">Total</div>
        <input type="text" name="total" value="{{$item['total']}}">
        <div class="text-center text-lg font-bold">Terbayar</div>
        <select name="terbayar" type="text">
            <option value="{{$item['terbayar']}}" selected>{{$item['terbayar']}}</option>
            @if ($item['terbayar'] == 'sudah')
            <option value="belum">belum</option>
            @else
            <option value="sudah">sudah</option>
            @endif
        </select>
        <input type="submit" value="submit" class="bg-red-500 p-3 rounded drop-shadow text-gray-900">
    </form>
    @endforeach
</div>
@endsection