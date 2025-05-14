<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    @include('home.css')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>edit property</title>
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
      <main class="p-4 border-2 rounded-s">
        
<div class="flex justify-center">{{$mtc->type->name}}</div> 
<div class="flex justify-center uppercase"> Current Status : <p>{{$mtc->status}}</p></div>   

<div class="flex justify-center mt-10 px-10" justify-content:center;>
    {{-- Section for "to deploy" --}}
    <div id="deploy-section" class="flex flex-col flex-1 border-2 rounded-3 p-6 ">
    <form method="POST" action="/index2/{{ $mtc->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        
            <div class="text-2xl uppercase"><h1>to deploy</h1></div>
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
            <div class="mt-5"><button class="btn btn-primary border-white">Update MTC</button></div>
            
        </div>
    </form>
</div>

<script>
    function handleStatusChange(selectedStatus) {
    const seatidInput = document.querySelector('input[name="seatid"]');
    const userInput = document.querySelector('input[name="user"]');

    if (selectedStatus === 'store') {
        seatidInput.value = '';
        userInput.value = '';
        seatidInput.disabled = true;
        userInput.disabled = true;
    } else if(selectedStatus === 'loan') {
        seatidInput.value = '';
        seatidInput.disabled = true;
        userInput.disabled = false;
    }
}

</script>

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


