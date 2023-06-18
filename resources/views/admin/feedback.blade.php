@extends('layouts.admin')
@section('header')
header
@endsection
@section('content')
<div class="h-full w-full p-5">

    @foreach ($feedback as $feedback)
    <div class="bg-white rounded drop-shadow-lg w-full h-fit antialiased">
        <div class="p-3 text-center flex capitalize gap-1 justify-center">
            <div>Dari</div>
            {{ $feedback['pengirim'] }}
        </div>
        <div class="p-3 text-center overflow-scroll bg-gray-300 m-3 rounded">
            {{ $feedback['isi'] }}
        </div>
        <form action="{{ route('admin.feedback.destroy',$id = $feedback['id']) }}" method="post" class="flex justify-center">
            @method('DELETE')
            @csrf
            <button type="submit" class="bg-red-500 flex items-center justify-center rounded shadown-sm p-3 m-1"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
    @endforeach
</div>
@endsection