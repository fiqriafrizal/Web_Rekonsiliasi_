@extends('layout.layout')
@section('test')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('partials.sidebar')
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Informasi</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Basic Layout</h5>
                    </div>
                      <div class="card-body">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem quo quisquam perferendis adipisci dolores, voluptates non! Quidem odit qui deleniti corrupti consectetur tenetur, quisquam consequuntur. Rem sed nemo enim atque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, tempore unde. Neque, quidem reprehenderit perferendis, ut, temporibus odit eligendi illum cum beatae itaque dolor praesentium non! Impedit non officiis eos! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae est quam odio accusamus quos ipsa, blanditiis officia perferendis quia id, natus ut harum voluptates! Porro ullam repellendus error temporibus quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde at animi magnam nostrum in odio maiores distinctio minima! Sint aliquid vero recusandae provident incidunt suscipit dicta odit veritatis iure quae?</p>                  
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <script>
      document.getElementById("informasi-menu").classList.add("active");
    </script>
    <!-- / Layout wrapper -->
    @endsection