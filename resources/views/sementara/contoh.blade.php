
    @extends('layout.layout')
    @section('test')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- Sidebar --}}
            @include('partials.sidebar')
            {{-- /Sidebar --}}
                
            <div class="layout-page">
                <!-- Navbar -->
                @include('partials.navbar')
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
                                     
                                     
                                     <section>
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
                                     </section>
{{-- -------------------------------------------------------------------------------------------------------------------------------- --}}
                                     <section class="2">
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
                                     </section>
{{-- -------------------------------------------------------------------------------------------------------------------------------- --}}

                                     <section class="mt-5">
                                      <h5 class="mb-0">File Acuan</h5>
                                      <div class="row">
                                          {{-- Content Inside of first Row --}}
                                          <div class="col">
                                              <ol>
                                              <li>Pilih jenis data acuan</li>
                  
                                              <form action="rekonsiliasi3/upload" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                  <input type="radio" id="bank" name="dataAcuan" value="bank">
                                                  <label for="bank">Bank</label><br>
                                                  <input type="radio" id="bankplus" name="dataAcuan" value="bankplus">
                                                  <label for="bankplus">Bankplus</label><br>
                                                  <input type="radio" id="biller" name="dataAcuan" value="biller">
                                                  <label for="biller">Biller</label>
                                                  
                                                  <li>Upload file acuan </li>
                                                  <input type="file" class="form-control-file" id="fileAcuan" name="fileAcuan"><br>
                                                  <input type="submit" class="btn btn-primary mt-2">
                                                  </ol>
                                              </form>
                                          </div>
                                          <div class="col">
                                              <h5>Verifikasi</h5>
                                              <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                              <label class="form-check-label" for="flexCheckChecked">
                                                  Format data sesuai template
                                              </label>
                                              </div>   
                                              <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                              <label class="form-check-label" for="flexCheckChecked">
                                                  Format file valid
                                              </label>
                                              </div>
                                          </div>
                                      </div>
                                  {{-- /Content Inside of first Row --}}

                                  {{-- Content Inside of seconds Row --}}
                                      <div class="row">
                                          <div class="col">
                                              <div class="justify-content">
                                              <a class="btn btn-primary" href="\rekonsiliasi2" role="button">Sebelumnya</a> 
                                              </div>
                                          </div>
                                          <div class="col">
                                              <div class="d-flex flex-row-reverse">
                                              <a class="btn btn-primary disabled" href="\rekonsiliasi4" role="button">Berikutnya</a> 
                                              </div>
                                          </div>
                                      </div>

                                     </section>
{{-- -------------------------------------------------------------------------------------------------------------------------------- --}}
                                     <section class="">
                                      <h5>File Referensi</h5>
                                      <ol>
                                        <div class="row">
                
                
                                          <div class="col">
                                            <li>Upload file Bankplus</li>
                                            <div class="my-2">
                                              <h5>Verifikasi</h5>
                                              <form method = "post" action= "/rekonsiliasi4/upload" enctype="multipart/form-data">
                                                @csrf
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  Format data sesuai template
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  Format file valid
                                                </label>
                                              </div>   
                                            </div>
                                          </div>
                
                
                
                
                                          <div class="col">
                                            <input type="file" class="form-control-file" id="bankplusFile" name="bankplusFile">
                                          </div>
                                        </div>
                
                
                
                
                                        <div class="row">
                                          <div class="col">
                                            <li>Upload file Biller</li>
                                            <div class="my-2">
                                              <h5>Verifikasi</h5>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  Format data sesuai template
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  Format file valid
                                                </label>
                                              </div>
                                              <input type="submit" class="btn btn-primary mt-2">
                                            </div>
                                          </div>
                
                
                
                                          <div class="col">
                                            <input type="file" class="form-control-file" id="billerFile" name="billerFile">
                                          </div>
                                        </div>
                                      </ol>  
                
                                      <div class="row">
                                        <div class="col">
                                          <div class="justify-content">
                                            <a class="btn btn-primary" href="\rekonsiliasi3" role="button">Sebelumnya</a> 
                                          </div>
                                        </div>
                                        <div class="col">
                                          <div class="d-flex flex-row-reverse">
                                            <a class="btn btn-primary" href="\rekonsiliasi5" role="button">Berikutnya</a>
                                          </form>
                                          </div>
                                        </div>
                                      </div>
                
                                    </div>
                                     </section>
{{-- -------------------------------------------------------------------------------------------------------------------------------- --}}



                                     
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->  
                </div>
                <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
                </div>
  
        <!-- Overlay -->
      </div>
    @endsection
</body>
</html>
