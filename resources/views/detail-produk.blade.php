<x-app-layout>
    @foreach ($makanan as $makanan)

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex gap-4">
            <a href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <div class="capitalize"> detail {{ $makanan->nama }} </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-3 flex">
            <div class="bg-amber-300 flex justify-center h-96 w-full py-2">

                <img src="{{ asset('storage/' . $makanan->foto) }}" alt="foto" class="rounded h-full w-auto ">
            </div>
        </div>
        <div class="mt-5 mx-3 flex">
            <div class="text-center w-full">
                Harga : RP {{ $makanan->harga }}
            </div>
        </div>
        <div class="mt-5 mx-3 flex justify-center">
            <div class="text-center w-9/12">
                {{ $makanan->deskripsi }}
            </div>
        </div>

        <div class="mt-5 mx-3 flex max-h-screen">
            <div class="h-full w-full bg-white">
                <form method="post" action="{{ route('komentar.post',$id = $makanan->id) }}" class="text-center bg-gray-300 m-2 p-2 rounded flex">
                    @csrf
                    <input name="isi" type="text" placeholder="ketik disini untuk memberi komentar" maxlength="500" class="w-full h-full bg-transparent border-none focus:border-transparent focus:border-none focus:outline-none focus:outline-transparent focus:ring-0">
                    <input name="id_makanan" type="hidden" value="{{$makanan->id}}">
                    <button type="submit" class="ml-auto border-l-2 border-gray-200"><i class="px-2 fa-solid fa-paper-plane text-xl"></i></button>
                </form>
                <div class="bg-gray-200 m-2 rounded p-3 flex flex-col gap-3">
                    @foreach ($komentar as $index => $komentar)
                    <div class="p-2 shadow">
                        <div class="flex items-center gap-1 mb-2">
                            <img src="{{ asset('storage/' . $komentar->user->profile_pic) }}" alt="foto" class="mr-2 shadow-md h-12 w-12 bg-amber-200 rounded-full">
                            <div>
                                {{ $komentar->user->name }}
                            </div>
                            <div> {{ $komentar->user->created_at }} </div>
                            @if ($komentar->id_pengirim == Auth::user()->id)
                            <div class="flex items-center justify-center h-fit w-fit">
                                <form action="{{ route('komentar.destroy', ['id' => $makanan->id, 'id_komentar' => $komentar->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">
                                        <div class="text-red-600 text-sm opacity-70 font-bold ml-2 underline">Hapus</div>
                                    </button>
                                </form>
                                <div id="buttonGroup{{ $index }}" class="cursor-pointer mt-1 text-sm ml-2 font-bold underline opacity-70">
                                    <div id="editButton{{ $index }}" onclick="turnIntoInput({{ $index }})">Edit</div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <form action="{{ route('komentar.edit',$id = $komentar->id) }}" method="post">
                            @csrf
                            <div id="content{{ $index }}">
                                {{ $komentar->isi }}
                            </div>
                        </form>
                        <script>
                            var activeInput = null; // Variable to store the active input field

                            function turnIntoInput(index) {
                                var contentElement = document.getElementById("content" + index);
                                var content = contentElement.textContent.trim(); // Remove leading and trailing white spaces
                                var inputElement = document.createElement("input");
                                inputElement.type = "text";
                                inputElement.id = "editInput" + index;
                                inputElement.value = content;
                                inputElement.name = 'isi';
                                inputElement.classList.add('cursor-pointer', 'w-full', 'h-full', 'bg-transparent', 'border-none', 'focus:border-transparent', 'focus:border-none', 'focus:outline-none', 'focus:outline-transparent', 'focus:ring-0');
                                contentElement.parentNode.replaceChild(inputElement, contentElement);

                                var buttonGroup = document.getElementById("buttonGroup" + index);
                                var editButton = document.getElementById("editButton" + index);
                                var cancelButton = document.createElement("div");
                                cancelButton.textContent = "Cancel";
                                cancelButton.addEventListener("click", function() {
                                    inputElement.parentNode.replaceChild(contentElement, inputElement);
                                    buttonGroup.replaceChild(editButton, cancelButton);
                                    activeInput = null; // Reset the active input field
                                });
                                buttonGroup.replaceChild(cancelButton, editButton);

                                inputElement.focus();

                                // Check if there is an active input field, and revert it back to a div
                                if (activeInput && activeInput !== inputElement) {
                                    var activeContentElement = activeInput.parentNode;
                                    var activeContent = document.createElement("div");
                                    activeContent.textContent = activeInput.value;
                                    activeContentElement.replaceChild(activeContent, activeInput);

                                    var activeButtonGroup = activeContentElement.previousElementSibling;
                                    var activeEditButton = activeButtonGroup.querySelector("div");
                                    activeButtonGroup.replaceChild(activeEditButton, cancelButton);
                                }

                                activeInput = inputElement; // Set the current input field as the active input
                            }
                        </script>
                    </div>
                    @endforeach




                </div>
            </div>
        </div>

    </div>
    @endforeach
</x-app-layout>