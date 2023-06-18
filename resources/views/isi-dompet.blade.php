<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakananJowo</title>
    @vite('resources/css/app.css')
</head>

<body class=" shadow-md antialiased bg-amber-200 h-screen w-screen flex flex-col items-center justify-center">

    <form class="shadow-sm flex flex-col items-center justify-center gap-5 font-sans bg-gray-100 rounded p-5" action="{{ route('dompet.isi') }}" method="post">
        <div>Masukan Nominal yang Ingin Ditambahkan</div>
        @csrf
        <input type="number" name="uang" id="uang">
        <x-primary-button class="shadow">Tambahkan</x-primary-button>
    </form>
</body>

</html>