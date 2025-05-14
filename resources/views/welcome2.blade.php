<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-laravel">Welcome to MTC Loan</h1>
        <p class="text-lg text-gray-700 mt-4">Adib Wafi's Project</p>
        <div class="mt-6">
            <a href="{{ route('login') }}" class="text-white bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-600">
                Login
            </a>
            <a href="{{ route('register') }}" class="text-white bg-green-500 px-4 py-2 rounded-md hover:bg-green-600">
                Register
            </a>
        </div>
    </div>
</body>
</html>



{{-- dump thing for property --}}

<x-app-layout>
</x-app-layout>

@include('home.css')

<div class="flex justify-center">{{$mtc->type->name}}</div> 
<div class="flex justify-center uppercase"> Current Status : <p>{{$mtc->status}}</p></div>   

<div class="flex justify-center mt-10" justify-content:center;">
    {{-- Section for "to store" --}}
    <div class="flex flex-col flex-1 bg-blue-500 border-2 p-6">
        <div class="uppercase">to store</div>
        <input type="radio" id="store" name="status" value="store" onchange="handleStatusChange('store')">
        <button class="button">to store</button>
    </div>
    {{-- Section for "to deploy" --}}
    <div id="deploy-section" class="flex flex-col flex-1 bg-blue-500 border-2 p-6">
    <form method="POST" action="/index2/{{ $mtc->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        
            <div class="uppercase">to deploy</div>
            {{-- <input type="radio" id="deploy" name="status" value="deploy" onchange="handleStatusChange('deploy')"> --}}
            <div class="mt-2">
                <x-label for="seatid" value="{{ __('Seat No') }}" />
                <x-input type="text" name="seatid" value="{{$mtc->seatid}}" class="h-14" placeholder="seat id awak" required/>            

                @error('seatid')
                    <p class="error"> {{$message}} </p>
                @enderror
            </div>
            <div class="mt-2">
                <x-label for="user" value="{{ __('User') }}" />
                <x-input type="text" name="user" value="{{$mtc->user}}" class="h-14" placeholder="user" required/>            

                @error('user')
                    <p class="error"> {{$message}} </p>
                @enderror
            </div>
            <div>
                <x-label for="status" value="{{ __('Status') }}" />
                    <select id="status" name="status" class="block mt-1 w-full p-1" required>
                        <option value="store" {{ old('status', 'store') === 'store' ? 'selected' : '' }}>Store</option>
                        <option value="deployed" {{ old('status') === 'deployed' ? 'selected' : '' }}>Deployed</option>
                        <option value="loan" {{ old('status') === 'loan' ? 'selected' : '' }}>Loan</option>
                    </select>
            </div>
            {{-- <div class="mt-2">
                <x-label for="status" value="{{ __('Status') }}" />
                <x-input type="text" name="status" value="{{$mtc->status}}" class="h-14" placeholder="user" required/>            

                @error('status')
                    <p class="error"> {{$message}} </p>
                @enderror
            </div> --}}
            {{-- <div class="mt-2">
                <x-label for="user" value="{{ __('User') }}" />
                <x-input id="deploy-user" class="block mt-1 w-full" type="text" name="user" value={{$mtc->user}} />
                @error('user')
                    <p class="error"> {{$message}} </p>
                @enderror
            </div> --}}
            <button class="button">Update MTC</button>
        </div>
    </form>
    {{-- Section for "to loan" --}}
    <div id="loan-section" class="flex flex-col flex-1 bg-blue-500 border-2 p-6">
        <div class="uppercase">to loan</div>
        <input type="radio" id="loan" name="status" value="loan" onchange="handleStatusChange('loan')">
        <div class="mt-2">
            <x-label for="loan-user" value="{{ __('User') }}" />
            <x-input id="loan-user" class="block mt-1 w-full" type="text" name="loan-user" value={{$mtc->user}} />
            @error('user')
                <p class="error"> {{$message}} </p>
            @enderror
        </div>
    </div>
</div>

<script>
    function handleStatusChange(selectedStatus) {
        if (selectedStatus === 'store') {
            document.querySelector('input[name="seatid"]').value = null;
            document.querySelector('input[name="user"]').value = null;
            document.querySelector('input[name="seatid"]').disabled = true;
            document.querySelector('input[name="user"]').disabled = true;
        } else {
            document.querySelector('input[name="seatid"]').disabled = false;
            document.querySelector('input[name="user"]').disabled = false;
        }
    }
</script>


