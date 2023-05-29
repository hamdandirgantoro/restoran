<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    @vite('resources/css/app.css')
</head>

<body class=" bg-amber-200">
    <section class="w-full text-center p-10 text-3xl font-bold" id="title">
        selamat datang di restoran wong jowo
    </section>
    <section class="text-center">
        selamat datang di restoran kami <br>
        tunggu apa lagi ayo ke website
        <div class="h-fit w-fit grid grid-cols-2 gap-3 ml-auto mr-auto mt-4" id="pilihan-autentikasi">
            <a href="{{url('register')}}" class="bg-slate-200 p-5 rounded">registrasi</a>
            <a href="{{url('login')}}" class="bg-slate-200 p-5 rounded">login</a>
        </div>
    </section>

</body>

</html>