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
                                 <h3>Preview</h3>
                                    <h4>File Acuan</h4>
                                    <p>{{ $namaAcuanFile }}</p>
                                    <div class="overflow-scroll">
                                    <table class="table card-table">
                                      <thead>
                                        <tr>
                                          @foreach ($rowsAcuan[0] as $row)
                                          <th>{{ $row }}</th>
                                          @endforeach
                                        </tr>
                                      </thead>

                                      <tbody class="table-border-bottom-0">
                                        @foreach ($tableAcuan as $isi)
                                          <tr>
                                            @foreach ($isi as $contain)
                                              <td>{{ $contain }}</td>
                                            @endforeach
                                          </tr>
                                        @endforeach
                                          

                                      
                                        

                                      </tbody>
                                    </table>
                                  </div>
                                    
                                    <h4 class="mt-3">File Referensi</h4>
                                    <p>{{ $namaReferensiFile1 }}</p>
                                    <div class="overflow-scroll">
                                    <table class="table card-table">
                                      

                                      <thead>
                                        <tr>
                                          @foreach ($rowsReferensi1[0] as $rowsRe1 )
                                          <th>{{ $rowsRe1 }}</th>
                                          @endforeach
                                        </tr>
                                      </thead>
                                      <tbody class="table-border-bottom-0">
                                        @foreach ($tableReferensi1 as $tabRef1 )
                                          
                                        
                                        <tr>
                                          @foreach ($tabRef1 as $isiRef1)
                                          <td>{{ $isiRef1 }}</td>
                                            
                                          @endforeach
                                          
                                        </tr>
                                        @endforeach             
                                      </tbody>
                                      
                                    </table>
                                  </div>


                                    <p class="mt-3">{{ $namaReferensiFile2 }}</p>
                                    <div class="overflow-scroll">
                                    <table class="table card-table">
                                      <thead>
                                        <tr>
                                          @foreach ($rowsReferensi2[0] as $rowsRe2 )
                                          <th>{{ $rowsRe2 }}</th>
                                          @endforeach
                                        </tr>
                                      </thead>
                                      <tbody class="table-border-bottom-0">
                                        @foreach ($tableReferensi2 as $tabRef2 )
                                        <tr>
                                          @foreach ($tabRef2 as $isiRef2)
                                          <td>{{ $isiRef2 }}</td>
                                          @endforeach
                                        </tr>
                                        @endforeach

                                      </tbody>
                                    </table>
                                    </div>













                                 <div class="row mt-4">
                                   <div class="col">
                                     <div class="justify-content">
                                       <a class="btn btn-primary" href="\1" role="button">Sebelumnya</a> 
                                     </div>
                                   </div>
                                   <div class="col">
                                     <div class="d-flex flex-row-reverse">
                                       <a class="btn btn-primary" href="\6" role="button">Process</a> 
                                     </div>
                                   </div>
                                 </div>



                    
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

    const step5 = document.getElementById("step5");
    step5.classList.add("active");
  
  </script>

@endsection