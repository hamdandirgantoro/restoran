@if (request()->routeIs('dashboard','pesanan','pesananterbayar','profile.edit','feedback','makanan.detail'))
<img draggable="false" src="{{ asset('logo.png') }}" alt="logo" class="block h-9 w-auto fill-current text-gray-800">
@else
<img draggable="false" src="{{ asset('logo.png') }}" alt="logo" class="h-20 w-20">
@endif