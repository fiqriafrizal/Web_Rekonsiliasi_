
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
          @include('partials.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Rekonsiliasi</h4>

              {{-- Bunder Bunder --}}

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">

                    </div>
                    
                    <div class="card-body">
                      {{-- Percobaan --}}
                      <ul class="pagination pagination-lg ">
                        <li class="page-item px-1 active">
                          <a class="page-link " href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item px-1">
                          <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item px-1">
                          <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item px-1">
                          <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item px-1">
                          <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item px-1">
                          <a class="page-link" href="javascript:void(0);">6</a>
                        </li>
                      </ul>

                      {{-- Percobaan --}}
                      <h5>Petunjuk</h5>

                      <ol type="1">
                        <li>Download file template</li>
                        <li>Upload File acuan</li>
                        <li>Upload file referensi</li>
                        <li>Pastikan data sudah benar</li>
                        <li>Submit untuk melakukan proses rekonsiliasi </li>
                        <li>Download jika selesai</li>
                    </ol>

                    <div class="row">
                      <div class="col">
                        <div class="d-flex flex-row-reverse">
                          <a class="btn btn-primary" href="\rekonsiliasi2" role="button">Berikutnya</a> 
                        </div>
                      </div>
                    </div>
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
    <!-- / Layout wrapper -->
    @endsection