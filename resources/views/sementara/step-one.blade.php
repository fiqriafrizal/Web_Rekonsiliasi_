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
                                          <a class="btn btn-primary" href="\2" role="button">Berikutnya</a> 
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            {{ $error }} <br/>
                                            @endforeach
                                        </div>
                                        @endif
                                      </div>
                                    </div>
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

  const step1 = document.getElementById("step1");
  step1.classList.add("active");

</script>
    
@endsection