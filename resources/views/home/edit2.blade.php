@include('home.css')

<div class="boxtop">
    <div class="h3">
    </div>
    <div class="h3">
        <h3>Add MTC to store (home)</h3>
    </div>
</div>

<form method="POST" action="/home" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="boxmid">
        {{-- type --}}
        <div>
            <x-label for="type" value="{{ __('Type') }}" />
            <x-input id="type" class="block mt-1 w-full" type="text" name="type" value="{{$mtc->type}}" required autofocus autocomplete="name" />
        </div>  
        @error('type')
            <p class="error"> {{$message}} </p>
        @enderror

        {{-- serialno --}}
        <div>
            <x-label for="serialno" value="{{ __('Serial No') }}" />
            <x-input id="serialno" class="block mt-1 w-full" type="text" name="serialno" :value="old('serialno')" required autofocus autocomplete="name" />
        </div>  
        @error('serialno')
            <p class="error"> {{$message}} </p>
        @enderror

        {{-- mac --}}
        <div>
            <x-label for="mac" value="{{ __('MAC Address') }}" />
            <x-input id="mac" class="block mt-1 w-full" type="text" name="mac" :value="old('mac')" required autofocus autocomplete="name" />
        </div>  
        @error('mac')
            <p class="error"> {{$message}} </p>
        @enderror
        
        {{-- status --}}
        <div>
            <x-label for="status" value="{{ __('Status...') }}" />
            <x-input id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status')" required autofocus autocomplete="name" />
        </div>  
        @error('status')
            <p class="error"> {{$message}} </p>
        @enderror

        {{-- user (nullable) --}}
        <div>
            <x-label for="user" value="{{ __('User') }}" />
            <x-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')" autofocus autocomplete="name" />
        </div>  
        @error('user')
            <p class="error"> {{$message}} </p>
        @enderror

    <button class="button">EDIT MTC</button>
</div></form>