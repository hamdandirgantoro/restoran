<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Terimakasih sudah mendaftar! Sebelum memulai, bisakah kamu mengeklik link yang kami kirim ke emailmu? Jika kamu tidak menerima apapun kami dengan senang hati akan mengirimnya ulang.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('Sebuah link verifikasi sudah dikirim ke alamat email yang kamu masukan saat proses registrasi.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Kirim ulang link') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>