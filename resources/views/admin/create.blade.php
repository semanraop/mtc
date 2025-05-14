<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    @include('home.css')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    
    <!-- jsvectormap -->
    
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      @include('admin.header')
      <!--end::Header-->
      <!--begin::Sidebar-->

      @include('admin.sidebar')
      

      
      <!--end::Sidebar-->
      <!--begin::App Main-->
      
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
</style>

<main class="p-4 border-2 rounded-s">
<div class="px-40">
    <div class="boxtop">
        <div class="h3">
        </div>
        <div class="h3">
            <h3>Add MTC to store</h3>
        </div>
    </div>
    
        
        <div class="flex" >
            <div class="flex flex-col rounded-xl" style="flex:3;">
                <form method="POST" action="/index" enctype="multipart/form-data">
                    @csrf
                <div class="p-4 space-y-4">
                    {{-- Model --}}
                    <x-label for="model" value="{{ __('Model MTC') }}" />
                    <select id="model" name="model" class="block mt-1 w-full p-1" required>
                        <option value="" disabled selected>Select a Type</option>
                        @foreach($mtcmodels as $mtcmodel)
                        <option value="{{ $mtcmodel->id }}" {{ old('model') == $mtcmodel->id ? 'selected' : '' }}>
                            {{ $mtcmodel->name }}
                        </option>
                        @endforeach
                    </select>
                
                    @error('model')
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
                        <x-label for="status" value="{{ __('Status') }}" />
                            <select id="status" name="status" class="block mt-1 w-full p-1" required>
                                <option value="store" {{ old('status', 'store') === 'store' ? 'selected' : '' }}>Store</option>
                                <option value="deployed" {{ old('status') === 'deployed' ? 'selected' : '' }}>Deployed</option>
                                <option value="loan" {{ old('status') === 'loan' ? 'selected' : '' }}>Loan</option>
                            </select>
                    </div>
                    @error('status')
                        <p class="error"> {{$message}} </p>
                    @enderror

                </div>
                
                <div class="flex justify-center" style="flex:1;">
                    <button class="inline-block border-2 bg-white-500 border-red text-red py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black hover:shadow-lg hover:-translate-y-1 active:bg-blue-500 active:shadow-sm active:translate-y-0 transition-all duration-300 ease-in-out">
                        add MTC
                    </button>
                </div>
            </form>
            </div>      
                {{-- user (nullable) --}}
                {{-- <div>
                    <x-label for="user" value="{{ __('User') }}" />
                    <x-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')"  autofocus autocomplete="name" />
                </div>  
                @error('user')
                    <p class="error"> {{$message}} </p>
                @enderror --}}

                <div class="flex items-center justify-center" style="flex:1;">
                    <div class="text-black-500 hover:text-blue-700 font-semibold border bg-gray-200 border-clay-500 px-4 py-2 rounded-lg hover:bg-blue-100 transition">>
                        
                        No such model? Add here
                        <form method="POST" action="/add_model" enctype="multipart/form-data">
                            @csrf
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
                            <button class="border-2 p-2 mt-2">Add model</button>
                        </form>
                    </div>
                </div>
        </div>
</div>

</main>
<!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2024&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
      <!--begin::Third Party Plugin(OverlayScrollbars)-->
      @include('admin.script')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
