<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen w-screen flex flex-col justify-center items-center bg-amber-200 antialiased">
    <section class="title w-full text-center p-10 text-3xl font-bold bg-amber-100 flex flex-col items-center gap-3" id="title">
        <x-application-logo></x-application-logo>
        selamat datang di restoran wong jowo
    </section>
    <section class="text-center bg-amber-400 w-full p-3 shadow-md">
        selamat datang di restoran kami <br>
        tunggu apa lagi ayo ke website
        <div class="h-fit w-fit grid grid-cols-2 gap-3 ml-auto mr-auto mt-4 text-gray-900 hover:text-gray-800 transition-all" id="pilihan-autentikasi">
            <a href="{{url('register')}}" class="border-b-2 border-b-transparent hover:border-b-amber-950 transition-all p-2 rounded">REGISTRASI</a>
            <a href="{{url('login')}}" class="border-b-2 border-b-transparent hover:border-b-amber-950 transition-all p-2 rounded">LOGIN</a>
        </div>
    </section>
</body>

</html>