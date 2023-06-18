<form action="{{ route('pesanan.store') }}" method="post">
    @csrf
    <button type="submit" class="font-medium transition text-gray-600 bg-white hover:text-gray-800 ease-in-out duration-150 h-fit w-fit ml-auto mr-auto px-3 py-2 rounded-lg">Pesan</button>
</form>