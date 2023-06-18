@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="flex p-5">
    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col">
        @csrf
        <div>Nama</div>
        <input name="name" type="text">
        <div>Email</div>
        <input name="email" type="text">
        <div>Password</div>
        <input name="password" type="text">
        <div>Balance</div>
        <input name="balance" type="number">
        <div>Role</div>
        <select name="role" type="text">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <div>Profile Picture</div>
        <input type="file" name="profile_picture" id="profile_picture">
        <input type="submit" value="submit" class="bg-red-500 rounded p-3 shadow m-3">
    </form>
</div>
@endsection