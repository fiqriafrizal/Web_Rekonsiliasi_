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
                        <li class="page-item px-1 disabled ">
                          <a class="page-link " href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item px-1 active">
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
                      <h5>Templates</h5>
                      <div class="row">
                        <div class="col-sm">
                          <ol>

                            <form action="rekonsiliasi2/upload" method="POST" enctype="multipart/form-data">
                              @csrf
                              <li>Pilih jenis data</li>
                            
                              <input type="radio" id="Bank" name="jenisData" value="Bank">
                              <label for="Bank">Bank</label><br>
                              <input type="radio" id="Bankplus" name="jenisData" value="Bankplus">
                              <label for="Bankplus">Bankplus</label><br>
                              <input type="radio" id="Biller" name="jenisData" value="Biller">
                              <label for="Biller">Biller</label>

                              <li class="my-2">Pilih tipe file </li>
                              <input type="radio" id="XLS" name="file" value="XLS">
                              <label for="XLS">XLS</label><br>
                              <input type="radio" id="XLSX" name="file" value="XLSX">
                              <label for="XLSX">XLSX</label><br>
                              <input type="radio" id="CSV" name="file" value="CSV">
                              <label for="CSV">CSV</label><br>
                              <input type="submit" id="submit" class="btn btn-primary mt-2">
                            </form>

                          </ol>  
                        </div>  
                        <div class="col">
                          <p>Catatan
                          <br>*Lengkapi data berdasarkan template yang ada </p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="justify-content">
                            <a class="btn btn-primary" href="\rekonsiliasi" role="button">Sebelumnya</a> 
                          </div>
                        </div>
                        <div class="col">
                          <div class="d-flex flex-row-reverse ">
                            {{-- Pake javascript DOM text required --}}
                            <a class="btn btn-primary disabled" id="berikutnya" href="\rekonsiliasi3" role="button">Berikutnya</a> 
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

    <script>
      const submit = document.getElementByid('submit');
      const berikutnya = document.getElementByid('berikutnya');
      submit.onclick = function(){
        berikutnya.classList.remove('active');
      }
    </script>
    @endsection