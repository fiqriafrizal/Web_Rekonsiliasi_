<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                                                <a class="btn btn-primary" href="\rekonsiliasi4" role="button">Berikutnya</a> 
                                                </div>
                                            </div>
                                        </div>
                                    {{-- /Content Inside of seconds Row --}}
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
