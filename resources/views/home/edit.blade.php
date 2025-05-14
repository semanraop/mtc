



<style>
    .container{
        display:flex; 
        justify-content: center;
        flex-direction: column;    
    }

    .h3{
        justify-content: center;
        display: flex;
    }
    .boxmid{
        width: 60%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0 auto;
    }
    .eachrow{
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-bottom: 1em;
    }
    .error{
        background-color: red;
    }
</style>

<x-app-layout>

</x-app-layout>

<div class="container">
    <div class="boxtop">
        <div class="h3">
            <h1>Edit buku awak (admin)</h1>
        </div>
        <div class="h3">
            
            <p>Edit {{$mtc->type->name}}</p>
        </div>
    </div>
    <form method="POST" action="/index/{{ $mtc->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <div class="boxmid">
        <div class="eachrow">
            {{-- Type
            <input type="text" name="model" value="{{$mtc->type->name}}"  class="h-14" placeholder="Title buku awak"/>  
            @error('title')
                <p class="error"> {{$message}} </p>
            @enderror --}}
            <x-label for="model" value="{{ __('Model MTC') }}" />
                    <select id="model" name="model" class="block mt-1 w-full p-1" required>
                        <option value="" disabled selected>Select a Type</option>
                        @foreach($mtcmodels as $mtcmodel)
                        <option value="{{ $mtcmodel->id }}" {{ old('model') == $mtcmodel->id ? 'selected' : '' }}>
                            {{ $mtcmodel->name }}       
                        </option>
                        @endforeach
                    </select>
        </div>
        <div class="eachrow">
            serial number 
            <input type="text" name="serialno" value="{{$mtc->serialno}}" class="h-14" placeholder="Desc like (hi nak desc astu dia jawab baik handsome peramah lmao <i>cliche</i>)"/>            
        </div>
        {{-- <div class="eachrow">
            front page Buku upload
            <input type="file" name="fpage" class="h-14" />
            <img src="{{$listing->fpage ? asset('storage/'. $listing->fpage) : asset('images/op.jpg')}}" alt=""/>
            @error('fpage')
                <p class="error"> {{$message}} </p>
            @enderror
        </div> --}}
        <div class="eachrow">
            mac address
            <input type="text" name="mac" value="{{$mtc->mac}}"class="h-14" placeholder="isi tempat kosong..."/>            
        </div>
        <div class="eachrow">
            status?
            <input type="text" name="status" value="{{$mtc->status}}" class="h-14" placeholder="status" />            
        </div>
        {{-- <div class="eachrow">
            user
            <input type="text" name="user" value="{{$mtc->user}}" class="h-14" placeholder="User who?"/>            
        </div> --}}
        <div class="bg-blue-500 flex justify-center space-x-4">
            <div class="pr-4"><a href="/homeadminkara"><u>back</u></a></div>
            <div><button class="button">submit book</button></div>
        </div>
    </div></form>
    
</div>
