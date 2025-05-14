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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
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
        <!-- Search -->
        @include('home.search')

        
            <!-- Section spanning all columns -->
            {{-- <div class="col-span-full bg-gray-200 p-6 rounded">
                <h2 class="text-2xl font-bold text-center">This section spans all columns</h2>
                <p class="text-center">You can use this area for important announcements or wide content.</p>
            </div> --}}

            <div class="message">
                @if(session()->has('message'))

                <div class="alert alert-success">

                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>
                <script>
                    
                </script>
                @endif
            </div>
                
            <table class="table_center">
                <tr>
                    <th>Serial NO</th>
                    <th>mac</th>
                    <th>model</th>
                    <th>status</th>
                    <th>user</th>
                    <th>tagging</th>
                    <th>seat loc?</th>
                    <th>action</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>

                @unless(count($mtcs) == 0)
                @foreach($mtcs as $mtc)
                
                    <tr>
                        <td>{{$mtc->serialno}}</td>
                        <td>{{$mtc->mac}}</td>
                        <td>{{$mtc->type->name}}</td>
                        <td>{{$mtc->status}}</td>
                        <td>{{$mtc->user}}</td>
                        <td>{{$mtc->tagging}}</td>
                        <td><a href="/seat">{{ $mtc->seat ? $mtc->seat->seatid : '' }}</td></a>
                        <td><a 
                            class="bg-blue-500 text-white px-2 uppercase py-1 rounded-lg hover:bg-blue-600 transition" 
                            href="{{url('property',$mtc->id)}}"
                        >
                            Action
                        </a></td>
                        <td><a 
                            href="/index/{{$mtc->id}}/edit" 
                            class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 transition"
                        >
                            Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('mtc.destroy', $mtc->id) }}" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-delete">Delete</button>
                                    
                            </form></td
                        >
                            
                    </tr>

                @endforeach
                @else
                    <p style="text-align: center;">No listings found</p>
                @endunless
        
            <!-- Other grid items -->
            {{--@unless(count($mtcs) == 0)
                @foreach($mtcs as $mtc)
                    <div class="bg-gray-100 border border-gray-200 rounded p-6">
                        <div class="flex">
                            
                            <div class="w-full">
                                <h3 class="text-xl uppercase">
                                    <a href="/index/{{ $mtc->id }}" style="text-decoration: none;">
                                        Serial No: <b>{{ $mtc->serialno }}</b>
                                    </a>
                                </h3>
                                <div class="text-xl uppercase mb-4"> {{$mtc->mac}} </div>
                                <div class="text-lg mt-3">
                                    <i class='bx bx-laptop pr-2'></i>{{ $mtc->type->name }}
                                </div>
                                <div class="flex justify-end text-s mt-4">
                                    <a 
                                        href="/index/{{$mtc->id}}/edit" 
                                        class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600 transition"
                                    >
                                        Edit
                                    </a>
                                </div>
                                <div class="btn btn-danger">
                                    <a 
                                        class="bg-blue-500 text-white px-2 uppercase py-1 rounded-lg hover:bg-blue-600 transition" 
                                        href="/index/{{$mtc->id}}/property"
                                    >
                                        Action
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="text-align: center;">No listings found</p>
            @endunless --}}
        </table>    
        
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

      <script type="text/javascript">
        $(".btn-delete").click(function(){

            return confirm("Are you sure");
            e.preventDefault();
            var form = $(this).parents("form");

            Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                        });
        });


            
    </script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>

    <style>
       
    
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        margin: 20px 0;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    table th {
        background-color: #4CAF50; /* Green header */
        color: white;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9; /* Alternating row color */
    }

    table tr:hover {
        background-color: #f1f1f1; /* Hover effect */
    }

    table td a {
        text-decoration: none;
        color: #007BFF; /* Link color */
        font-weight: bold;
        transition: color 0.3s ease;
    }

    table td a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    
    </style>
    