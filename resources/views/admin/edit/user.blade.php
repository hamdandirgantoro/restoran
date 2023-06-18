@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="h-screen w-full flex p-5 overflow-y-scroll">

    @foreach ($user as $item)
    <form action="{{route('admin.user.update',$id = $item['id'] )}}" method="post" enctype="multipart/form-data" class="bg-white h-fit w-full flex flex-col gap-3 p-5 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="text-center text-lg font-bold">Nama</div>
        <input type="text" name="nama" value="{{$item['name']}}">
        <div class="text-center text-lg font-bold">Email</div>
        <input type="email" name="email" value="{{$item['email']}}">
        <div class="text-center text-lg font-bold">Password</div>
        <input type="text" name="password" value="{{$item['password']}}">
        <div class="text-center text-lg font-bold">Balance</div>
        <input type="number" name="balance" value="{{$item['balance']}}">
        <div class="text-center text-lg font-bold">Role</div>
        <select name="role" type="text">
            <option value="{{$item['role']}}" selected>{{$item['role']}}</option>
            @if ($item['role'] == 'user')
            <option value="admin">admin</option>
            @else
            <option value="user">user</option>
            @endif
        </select>
        <div class="text-center text-lg font-bold">Profile Picture</div>
        <img src="{{asset('storage/' . $item['profile_pic'])}}" alt="profile picture" height="500px" width="500px">
        <div class="text-center text-lg font-bold">Profile Picture Baru</div>
        <input type="file" name="profile_picture" id="profile_picture">
        <input type="submit" value="submit" class="bg-red-500 p-3 rounded drop-shadow text-gray-900">
    </form>
    @endforeach
</div>
@endsection