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


          <div class="small-box text-bg-primary w-25">
            <div class="inner">
              <h3>Loan MTC</h3>
              <p>Submit your request</p>
            </div><a href="/addforms">
                <i class="bx bx-laptop small-box-icon"></i></a>
          </div>
          
        {{-- Search in form --}}

        <form action="/forms">
            <div class="relative border-2 border-gray-100 m-4 rounded-lg mx-40">
                <div class="absolute top-4 left-3">
                </div>
                <input
                    type="text"
                    name="search"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Search MTC..."
                />
                <div class="absolute top-2 right-2">
                    <button
                        type="submit"
                        class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                    >
                        Search
                    </button>
                </div>
            </div>
        </form>

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 px-20">
            @foreach($forms as $form)
        <div class="bg-gray-50 border border-gray-200 rounded p-6 mb-6" style="width: 600px; height: 300px; display: inline-block;">
            <div class="flex" style="align-items: center;">
                <div style="width: 120px; height: 120px; overflow: hidden; margin-right: 20px; border-radius: 20px;">
                    <img src="{{ $form->proof ? asset('storage/' . $form->proof) : asset('/images/op.jpg') }}" 
                        alt="Listing Image" 
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                
                <div>
                    <h3 class="text-2xl">
                        <a href="show.html">{{$form->userid}}</a>
                        <a href="/index" style="text-decoration: none; color: #007bff;"></a>
                    </h3>
                    
                    <div class="text-xl mb-4"></div>
                    
                    <div class="">
                        <i class="fa-solid fa-location-dot">{{$form->status}}</i>
                    </div>

                    <div class="text-sm mt-3 tracking-wide">
                        <div class="fa-solid fa-location-dot text-sm">
                            <a href="/index/{{$form->serialno}}">{{$form->show->serialno}}</a>
                        </div>
                    </div>

                    <!-- Display the time created -->
                        <div class="text-lg text-gray-600 mt-2">
                            <i class="fa-solid fa-clock"></i> 
                            Created: {{ $form->created_at->timezone('Asia/Kuala_Lumpur')->format('d M Y, h:i A') }}
                        </div>

                    <div class="btn btn-danger">
                        <a href="/editform/{{$form->id}}">edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
