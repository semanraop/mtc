


{{-- @include('home.search') --}}

<head>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    
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
            width: 40%;
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
    
        #sidebar{
            box-sizing: border-box;
            height: 100vh;
            width: 250px;
            padding: 5px 1em;
            background-color: var(--base-clr);
            border-right: 1px solid var(--line-clr);
        }
    
        #sidebar ul{
            list-style: none;
        }
    
        #sidebar > ul > li:first-child{
            display: flex;
            justify-content: flex-end;
            margin-bottom: 16px;
            .logo{
                font-weight: 600;
            }
        }
        #sidebar ul li.active a{
            color: var(--accent-clr);
    
            i{
                fill: var(--accent-clr);
            }
        }
    </style>
    
    <body class="grid grid-cols-[auto_1fr] gap-4">
        admin
        @include('home.css')   
        <x-app-layout>
    
        </x-app-layout> 
        @include('admin.nav')
        <main class="p-4 border-2 rounded-s">
            <div class="container">
                <div class="boxtop">
                    <div class="h3">
                    </div>
                    <div class="h3">
                        <h3>Edit indemnity form to store (home)</h3>
                    </div>
                </div>
                
                <form method="POST" action="/editform/{{$form->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="boxmid">
                        {{-- userid --}}
                        <div>
                            <x-label for="userid" value="{{ __('User Who?') }}" />
                            <x-input id="userid" class="block mt-1 w-full" type="text" name="userid" value="{{$form->userid}}"/>
                        </div>  
                        @error('userid')
                            <p class="error"> {{$message}} </p>
                        @enderror
    
                        {{-- status --}}
                        <div>
                            <x-label for="status" value="{{ __('Status') }}" />
                            <select id="status" name="status" class="block mt-1 w-full p-1" required>
                                <option value="pending" {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="loan" {{ old('status') === 'loan' ? 'selected' : '' }}>Loan</option>
                                <option value="returned" {{ old('status') === 'returned' ? 'selected' : '' }}>Returned</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        @error('status')
                            <p class="error"> {{$message}} </p>
                        @enderror
    
                        {{-- proof image --}}
                        <div>
                            <x-label for="proof" value="{{ __('Proof images') }}" />
                            <x-input id="proof" class="block mt-1 w-full" type="file" name="proof" :value="old('proof')"/>
                        </div>  
                        @error('proof')
                            <p class="error"> {{$message}} </p>
                        @enderror
                        
                        {{-- mouse,laptop,cablelock, adapter --}}
                        <div>
                            <x-label for="mouse" value="{{ __('Mouse') }}" />
                            <input type="checkbox" id="mouse" name="mouse" value="1" 
                                {{ old('mouse') ? 'checked' : '' }} />
                        </div>
                    
                        <div>
                            <x-label for="cable" value="{{ __('Cable') }}" />
                            <input type="checkbox" id="cable" name="cable" value="1" 
                                {{ old('cable') ? 'checked' : '' }} />
                        </div>
                    
                        <div>
                            <x-label for="bag" value="{{ __('Bag') }}" />
                            <input type="checkbox" id="bag" name="bag" value="1" 
                                {{ old('bag') ? 'checked' : '' }} />
                        </div>
                    
                        <div>
                            <x-label for="adapter" value="{{ __('Adapter') }}" />
                            <input type="checkbox" id="adapter" name="adapter" value="1" 
                                {{ old('adapter') ? 'checked' : '' }} />
                        </div>
    
                        {{-- user (nullable) --}}
                        {{-- <div>
                            <x-label for="serialno" value="{{ __('Serial No') }}" />
                            <x-input id="serialno" class="block mt-1 w-full" type="text" name="serialno" :value="old('serialno')" />
                        </div>   --}}
                            <select class="form-control" name="serialno" id="serialno" value="serialno" >
                                <option value="" disabled selected>Which MTC</option>
                                @foreach($mtcs as $mtc)
                                    <option value="{{ $mtc->id }}" {{ old('serialno') == $mtc->id ? 'selected' : '' }}>
                                        {{ $mtc->serialno }}
                                    </option>
                                @endforeach
                            </select>
    
                        {{-- @error('serialno')
                            <p class="error"> {{$message}} </p>
                        @enderror --}}
    
                    <button class="button">submit MTC</button>
                </div></form>
            </div>
        </main>
    </body>
    
    <script>
        $(document).ready(function() {
            $('#serialno').select2({
            });
        });
    </script>