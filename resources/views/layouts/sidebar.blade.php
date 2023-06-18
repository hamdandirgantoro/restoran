<div class=" overflow-x-hidden resize-x bg-amber-300 h-screen w-64 border-r-2 border-amber-300">
    <div class=" h-16 flex justify-between items-center p-3 shadow">
        <div class="flex items-center"><img height="40px" width="40px" src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="" class="mr-2 shadow-md h-12 w-12 bg-amber-200 rounded-full"> {{ Auth::user()->name }}</div> <a href="/dashboard"><i class="fa-solid fa-home"></i></a>
    </div>
    <div class="flex flex-col gap-3 p-3">

        @if (request()->routeIs('admin.makanan','admin.makanan.create','admin.makanan.edit'))
        <a class="rounded-lg shadow pt-3 pb-3 pl-3 bg-amber-400" href="{{route('admin.makanan')}}">makanan</a>
        @else
        <a class="rounded-lg pt-3 pb-3 pl-3 hover:bg-amber-400" href="{{route('admin.makanan')}}">makanan</a>
        @endif

        @if (request()->routeIs('admin.user','admin.user.create','admin.user.edit'))
        <a class="rounded-lg shadow pt-3 pb-3 pl-3 bg-amber-400" href="{{route('admin.user')}}">user</a>
        @else
        <a class="rounded-lg pt-3 pb-3 pl-3 hover:bg-amber-400" href="{{route('admin.user')}}">user</a>
        @endif

        @if (request()->routeIs('admin.pesanan','admin.pesanan.create','admin.pesanan.edit'))
        <a class="rounded-lg shadow pt-3 pb-3 pl-3 bg-amber-400" href="{{route('admin.pesanan')}}">pesanan</a>
        @else
        <a class="rounded-lg pt-3 pb-3 pl-3 hover:bg-amber-400" href="{{route('admin.pesanan')}}">pesanan</a>
        @endif
        @if (request()->routeIs('admin.komentar'))
        <a class="rounded-lg shadow pt-3 pb-3 pl-3 bg-amber-400" href="{{route('admin.komentar')}}">komentar</a>
        @else
        <a class="rounded-lg pt-3 pb-3 pl-3 hover:bg-amber-400" href="{{route('admin.komentar')}}">komentar</a>
        @endif
        @if (request()->routeIs('admin.feedback'))
        <a class="rounded-lg shadow pt-3 pb-3 pl-3 bg-amber-400 flex items-center" href="{{route('admin.feedback')}}">feedback @if ($jumlahFeedback != 0)
            <div class="rounded-full bg-amber-900 text-amber-100 h-4 w-4 text-center flex justify-center items-center ml-1">

                {{ $jumlahFeedback }}
            </div>
            @endif
        </a>
        @else
        <a class="rounded-lg pt-3 pb-3 pl-3 hover:bg-amber-400 flex items-center" href="{{route('admin.feedback')}}">feedback @if ($jumlahFeedback != 0)
            <div class="rounded-full bg-amber-900 text-amber-100 h-4 w-4 text-center flex justify-center items-center ml-1">

                {{ $jumlahFeedback }}
            </div>
            @endif
        </a>
        @endif
    </div>
</div>