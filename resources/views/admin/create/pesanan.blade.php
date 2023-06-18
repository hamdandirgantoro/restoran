@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="flex p-5">
    <form action="{{ route('admin.pesanan.store') }}" method="post" class="flex flex-col">
        @csrf
        <div>Pemilik</div>
        <select name="pemilik" type="text">
            @foreach ($pemilik as $item)
            <option value="{{$item['name']}}">{{$item['name']}}</option>
            @endforeach
        </select>
        <div>Isi</div>
        <select name="isi" type="number">
            @foreach ($makanan as $item)
            <option value="{{$item['nama']}}">{{$item['nama']}}</option>
            @endforeach
        </select>
        <div>Total</div>
        <input name="total" type="number">
        <div>Terbayar</div>
        <select name="terbayar" type="text">
            <option value="belum">belum</option>
            <option value="sudah">sudah</option>
        </select>
        <input type="submit" value="submit" class="bg-red-500 rounded p-3 shadow m-3">
    </form>
</div>
@endsection