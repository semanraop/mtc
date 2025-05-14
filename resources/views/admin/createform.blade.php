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
     
    <main class="p-4 border-2 rounded-s">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
              <!--begin::Row-->
              <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Loan Form</h3></div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Loan</li>
                  </ol>
                </div>
              </div>
              <!--end::Row-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::App Content Header-->
        <div class="container">
            <div class="boxtop">
                <div class="h3">
                </div>
                <div class="h3">
                    <h3>Add indemnity form to store</h3>
                </div>
            </div>
            
            <form method="POST" action="/forms" enctype="multipart/form-data">
                @csrf
            <div class="boxmid">
                    {{-- type --}}
                    <div>
                        <x-label for="userid" value="{{ __('User Who?') }}" />
                        <x-input id="userid" class="block mt-1 w-full" type="text" name="userid" :value="old('userid')"/>
                    </div>  
                    @error('userid')
                        <p class="error"> {{$message}} </p>
                    @enderror

                    {{-- status --}}
                    <div>
                        <x-label for="status" value="{{ __('Status') }}" />
                        <select name="status" id="status" class="border-gray-300 rounded-lg">
                            <option value="" disabled selected>Select a status</option>
                            @foreach (['pending', 'loan', 'returned'] as $status)
                                <option value="{{ $status }}" 
                                    {{ old('status', $form->status ?? '') === $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
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
                        <select class="form-control" name="serialno" id="serialno">
                            <option value="" disabled selected>Which MTC</option>
                            @foreach($mtcs as $mtc)
                                <option value="{{ $mtc->serialno }}" {{ old('serialno') == $mtc->id ? 'selected' : '' }}>
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
    </main><!--end::App Main-->
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
