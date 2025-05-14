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
        <h1 class="text-lg font-bold mb-4">Seats by Level</h1>
        
        <!-- Tabs Navigation -->
        <div class="flex justify-between mb-4">
            <button 
                id="tab-2d" 
                class="tab-button active-tab border p-2 bg-gray-200 rounded-md font-semibold">
                2D View
            </button>
            <button 
                id="tab-3d" 
                class="tab-button border p-2 bg-gray-200 rounded-md font-semibold">
                3D View
            </button>
        </div>
    
        <!-- 2D View -->
        <div id="view-2d" class="view-content hidden">
            <div class="flex">
                @foreach ($levels as $level => $seats)
                    <div class="mb-6">
                        <h2 class="text-md font-semibold mb-2">Level {{ $level }}</h2>
                        <ul class="list-disc pl-6">
                            @foreach ($seats as $seat)
                                <li>{{ $seat->seatid }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    
        <!-- 3D View -->
        <div id="view-3d" class="view-content">
            <!-- Floor Tabs for 3D View -->
            <div class="flex justify-start mb-4 space-x-2">
                @foreach ($levels as $level => $seats)
                    <button 
                        class="floor-tab tab-button border p-2 bg-gray-200 rounded-md font-semibold"
                        data-floor="floor-{{ $level }}">
                        Floor {{ $level }}
                        {{-- @if ($level == 1)
                                <script src="{{ asset('js/main1.js') }}" type="module"></script>
                            @elseif ($level == 2)
                                <script src="{{ asset('js/main2.js') }}" type="module"></script>
                            @elseif ($level == 3)
                                <script src="{{ asset('js/main3.js') }}" type="module"></script>
                            @else
                                <script src="{{ asset('js/main-default.js') }}" type="module"></script>
                            @endif --}}
                    </button>
                @endforeach
            </div>
    
            <!-- Canvas for each floor -->
            @foreach ($levels as $level => $seats)
                <div 
                    id="floor-{{$level}}" 
                    class="floor-view hidden">
                    <div id="" class="container3D">
                        
                        <div class="" id="container3D">
                            Floor {{ $level }}
                            @include('three.three1')
                                                <!-- Check which level and load the corresponding script -->
                            {{-- @if ($level == 1) --}}
                                
                            {{-- @elseif ($level == 2)
                                @include('three.three2') --}}
                            {{-- @elseif ($level == 3)
                                @include('three.three3')
                            @elseif ($level == 4)
                                @include('three.three4')
                            @elseif ($level == 5)
                                @include('three.three5')
                            @elseif ($level == 6)
                                @include('three.three6')
                            @elseif ($level == 7.1)
                                @include('three.three71')
                            @elseif ($level == 7.2)
                                @include('three.three72')
                            @elseif ($level == 9)
                                @include('three.three9')
                            @elseif ($level == 12)
                                @include('three.three12')
                            @elseif ($level == 13)
                                @include('three.three13') --}}
                            {{-- @endif --}}
                                
                             
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

    <style>
        
    
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
        }
    
    </style>

<script>

    // document.addEventListener("DOMContentLoaded", initTabs);

    


    // JavaScript to handle tab switching
    document.addEventListener('DOMContentLoaded',() => {

        // initTabs();
        const tab2D = document.getElementById('tab-2d');
        const tab3D = document.getElementById('tab-3d');
        const view2D = document.getElementById('view-2d');
        const view3D = document.getElementById('view-3d');

        const floorTabs = document.querySelectorAll('.floor-tab');
        const floorViews = document.querySelectorAll('.floor-view');

        tab2D.addEventListener('click', () => {
            view2D.classList.remove('hidden');
            view3D.classList.add('hidden');
            tab2D.classList.add('active-tab');
            tab3D.classList.remove('active-tab');
        });

        tab3D.addEventListener('click', () => {
            view3D.classList.remove('hidden');
            view2D.classList.add('hidden');
            tab3D.classList.add('active-tab');
            tab2D.classList.remove('active-tab');
        });

        // Switch between floors in 3D view
        floorTabs.forEach((tab) => {
            tab.addEventListener('click', () => {
                const floor = tab.getAttribute('data-floor');

                // Hide all floor views
                floorViews.forEach((view) => view.classList.add('hidden'));

                // Show the selected floor
                document.getElementById(floor).classList.remove('hidden');

                // Set active state for floor tabs
                floorTabs.forEach((tab) => tab.classList.remove('active-tab'));
                tab.classList.add('active-tab');
            });
        });
    });
    // function initTabs(){
    //     const tabs = document.querySelectorAll(".tab");

    //     const contents = document.querySelectorAll('.tab-content');

    //     tabs.forEach(function(tab){
    //         tab.addEventListener("click", function(){
    //             const content = document.getElementById(this.dataset.tab);

    //             tabs.forEach(tab => tab.classList.remove('active'));

    //             contents.forEach(content => content.classList.remove('active'));

    //             content.classList.add("active");
    //             this.classList.add("active");
    //         });
    //     }
    // }


    
</script>


</html>