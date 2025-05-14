<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('home.css')
    <x-app-layout>

    </x-app-layout>
</head>
<body>
    addloc admin bruh
    <div class="bg-gray-50 border border-gray-200 rounded p-6 display-flex">

        <form method="POST" action="/loc" enctype="multipart/form-data">
            @csrf

            {{-- seatid --}}
            <div>
                <x-label for="seatid" value="{{ __('Seat') }}" />
                <x-input id="seatid" class="block mt-1 " type="text" name="seatid" :value="old('seatid')" required  />
            </div>  

            {{-- level --}}
            <div>
                <x-label for="level" value="{{ __('Level') }}" />
                <x-input id="level" class="block mt-1 " type="text" name="level" :value="old('level')" required  />
            </div>

            {{-- seat no --}}
            <div>
                <x-label for="seat" value="{{ __('Seat No') }}" />
                <x-input id="seat" class="block mt-1 " type="text" name="seat" :value="old('seat')" required  />
            </div>  

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition">
                Submit
            </button>
        </form>


    </div>
</body>
</html>