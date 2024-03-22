
    @extends('layout.layout')
    @section('test')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- Sidebar --}}
            @include('partials.sidebar')
            {{-- /Sidebar --}}
                
            <div class="layout-page">
                <!-- Navbar -->
                <!-- / Navbar -->
  
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4">Rekonsiliasi</h4>

                    
                        <!-- Card Content -->
                        <div class="row">        
                        <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                     @include('partials.progress-bar')
                                        <section class="2">
                                            <h5>Templates</h5>
                                            <div class="row">
                                              <div class="col-sm">
                                                <ol>
                                                  <form action="2/post" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <li>Pilih jenis data</li>
                                                  
                                                    <input type="radio" id="Bank" name="dataReferensi" value="bank" onclick>
                                                    <label for="Bank">Bank</label><br>
                                                    <input type="radio" id="Bankplus" name="dataReferensi" value="bankplus" onclick>
                                                    <label for="Bankplus">Bankplus</label><br>
                                                    <input type="radio" id="Biller" name="dataReferensi" value="biller" onclick>
                                                    <label for="Biller">Biller</label>
                      
                                                    <li class="my-2">Pilih tipe file </li>
                                                    <input type="radio" id="XLS" name="file" value="xls" class="@error('file') is-invalid @enderror">
                                                    <label for="XLS">XLS</label><br>
                                                    <input type="radio" id="XLSX" name="file" value="xlsx">
                                                    <label for="XLSX">XLSX</label><br>
                                                    <input type="radio" id="CSV" name="file" value="csv">
                                                    <label for="CSV">CSV</label><br>


                                                  
                      
                                                </ol>
                                                @error('jenisData')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                              @enderror
                                            
                                              @error('file')
                                              <div class="alert alert-danger mt-2">
                                                  {{ $message }}
                                              </div>
                                            @enderror


                                              </div>  
                                              <div class="col">
                                                <p>Catatan
                                                <br>*Lengkapi data berdasarkan template yang ada </p>
                                              </div>
                                            </div>
    
                                            <div class="row">
                                              <div class="col">
                                                <div class="justify-content">
                                                  <a class="btn btn-primary" href="\1" role="button">Sebelumnya</a> 
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="d-flex flex-row-reverse ">
                                                  {{-- Pake javascript DOM text required --}}
                                                  <button class="btn btn-primary" type="submit">Berikutnya</button>
                                                </div>
                                              </div>
                                            </div>
                                          </form>
                                         </section>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <script> 
        document.getElementById("rekonsiliasi-menu").classList.add("active");
        const step2 = document.getElementById("step2");
        step2.classList.add("active");





        




      
      </script>

@endsection
    