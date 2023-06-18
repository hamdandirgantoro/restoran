@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="flex p-5">
    <form action="{{ route('admin.makanan.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col">
        @csrf
        <div>nama</div>
        <input name="nama" type="text">
        <div>harga</div>
        <input name="harga" type="number">
        <div>foto</div>
        <input type="file" name="foto" id="foto">
        <input type="submit" value="submit" class="bg-red-500 rounded p-3 shadow m-3">
    </form>
</div>
@endsection