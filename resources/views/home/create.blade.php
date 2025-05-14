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

{{-- <style>
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
</style> --}}

<main class="p-4 border-2 rounded-s">
<div class="container">
    <div class="boxtop">
        <div class="h3">
        </div>
        <div class="h3">
            <h3>Add MTC to store (hosde)</h3>
        </div>
    </div>
    <form method="POST" action="/index" enctype="multipart/form-data">
        @csrf
    <div class="boxmid">
            {{-- type --}}
            <div>
                <x-label for="type" value="{{ __('Type') }}" />
                <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus autocomplete="name" />
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
                <x-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')" required autofocus autocomplete="name" />
            </div>  
            @error('user')
                <p class="error"> {{$message}} </p>
            @enderror

        <button class="bg-blue-500 text-white px-2 uppercase py-1 rounded-lg hover:bg-blue-600 transition">submit MTC</button>
    </div></form>
    
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

    {{-- <style> --}}
        {{-- #sidebar{
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
   
        #container3D {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        display: flex; /* Center the canvas horizontally */
        justify-content: center; /* Center the canvas horizontally */
        align-items: center; /* Center the canvas vertically */
        border: 2px solid #705757; /* Add a dark-colored border */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Optional: Add a shadow for better visibility */
        border-radius: 20px; /* Optional: Add rounded corners */
    }
    
    #container3D canvas {
        display: block;
        max-width: 100%; /* Prevent the canvas from stretching beyond the container */
        max-height: 100%; /* Maintain the aspect ratio */
    }

    .tab-button {
            cursor: pointer;
        }
        .active-tab {
            background-color: #4f46e5; /* Primary color for active tabs */
            color: white;
        }
        .view-content.hidden, .floor-view.hidden {
            display: none;
        } --}}
    
    {{-- </style>--}}


</html>