<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12 px-5">
        <form action="{{ route('feedback.store')}}" method="post" class="rounded bg-gray-50 flex flex-col gap-3 items-center justify-center p-5 drop-shadow-lg">
            @csrf
            <label for="isi">Kolom Feedback</label>
            <textarea name="isi" id="isi" cols="30" rows="10" maxlength="600" class="w-full rounded-md" placeholder="masukan feedbackmu"></textarea>
            <button type="submit" class="bg-gray-500 mt-3 rounded shadow p-5 text-lg font-bold text-gray-100">Kirim Feedback</button>
        </form>
    </div>
</x-app-layout>