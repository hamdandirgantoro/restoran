@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="h-full w-full p-5">

    <div class="flex flex-col gap-3">
        <a href="{{ route('admin.user.create') }}" class="bg-amber-700 rounded shadow-md p-3 text-amber-50">Tambah</a>
        <div class="bg-white rounded shadow-md grid grid-cols-6">
            <div class="p-3 text-center text-lg font-bold">id</div>
            <div class="p-3 text-center text-lg font-bold">nama</div>
            <div class="p-3 text-center text-lg font-bold">balance</div>
            <div class="p-3 text-center text-lg font-bold">role</div>
            <div class="p-3 text-center text-lg font-bold">Profile Pic</div>
            <div class="p-3 text-center text-lg font-bold"></div>
        </div>
        <div class="bg-white rounded shadow-md grid grid-cols-6">
            @foreach ($user as $item)
            <div class="p-3 text-center">

                {{ $item['id'] }}
            </div>
            <div class="p-3 text-center">

                {{ $item['name'] }}
            </div>
            <div class="p-3 text-center">

                RP {{ number_format($item['balance'],2,',','.') }}
            </div>
            <div class="p-3 text-center">

                {{ $item['role'] }}
            </div>
            <div>
                <img src="{{ asset('storage/' . $item['profile_pic']) }}" alt="">
            </div>
            <form action="{{ route('admin.user.destroy',$id = $item['id']) }}" method="post" class="flex justify-center">
                @method('DELETE')
                <a href="{{ route('admin.user.edit',$id = $item['id']) }}" class="bg-blue-500 flex items-center justify-center rounded shadown-sm px-3 m-1"><i class="fa-solid fa-pencil"></i></a>
                @csrf
                <button type="submit" class="bg-red-500 flex items-center justify-center rounded shadown-sm px-3 m-1"><i class="fa-solid fa-trash"></i></button>
            </form>

            @endforeach
        </div>
    </div>
</div>
@endsection