@extends('layout.layout')

@section('test')

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

      @include('partials.logo')



      <div class="menu-inner-shadow">
        <p>Hello World</p>
      </div>

      <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
          <a href="/informasi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Informasi</div>
          </a>
        </li>

        <!-- Dashboard -->
        <li class="menu-item">
          <a href="/rekonsiliasi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Rekonsiliasi</div>
          </a>
        </li>

        <!-- Dashboard -->
        <li class="menu-item">
          <a href="index.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Report</div>
          </a>
        </li>

        <!-- Dashboard -->
        <li class="menu-item">
          <a href="index.html" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Log Out</div>
          </a>
        </li>
        
        
        <!-- Misc -->
      </ul>
    </aside>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
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
        <!-- / Content -->

        <!-- Footer -->
        
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
</div>

@endsection
