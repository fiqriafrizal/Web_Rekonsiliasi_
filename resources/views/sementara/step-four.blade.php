@extends('layout.layout')
@section('test')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.1/xlsx.core.min.js"></script>
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

                                 <section class="">
                                    <h5>File Referensi</h5>
                                    <ol>
                                      <div class="row">
              
              
                                        <div class="col">
                                          {{-- Ngikuti fileAcuan --}}
                                            @if ($dataAcuan === "bank")
                                              <li>Upload file Bankplus</li>
                                            @endif
                                            @if ($dataAcuan === "bankplus")
                                              <li>Upload file Bank</li>
                                            @endif
                                            @if ($dataAcuan === "biller")
                                              <li>Upload file Bank</li>
                                            @endif
                                          <div class="my-2">
                                            <h5>Verifikasi</h5>
                                            <form method = "post" action= "4/post" enctype="multipart/form-data">
                                              @csrf
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="flexCheckChecked1" name="checkFormatData1" disabled>
                                              <label class="form-check-label" for="flexCheckChecked1">
                                                Format data sesuai template
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="fileCheckBox1" name="checkFormatFile1" disabled>
                                              <label class="form-check-label" for="flexCheckChecked2">
                                                Format file valid
                                              </label>
                                            </div>   
                                          </div>
                                        </div>
              
          
                                        <div class="col">
                                          <input type="file" class="form-control-file" id="file1" name="fileReferensi1">
                                        </div>
                                      </div>
              
              
                                      <div class="row">
                                        <div class="col">

                                          @if ($dataAcuan === "bank")
                                          <li>Upload file Biller</li>  
                                          @endif
                                          @if ($dataAcuan === "bankplus")
                                          <li>Upload file Biller</li>  
                                          @endif
                                          @if ($dataAcuan === "biller")
                                          <li>Upload file Bankplus</li>  
                                          @endif
                                          <div class="my-2">
                                            <h5>Verifikasi</h5>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="flexCheckChecked2" name="checkFormatData2" disabled>
                                              <label class="form-check-label" for="flexCheckChecked3">
                                                Format data sesuai template
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="fileCheckBox2" name="checkFormatFile2" disabled>
                                              <label class="form-check-label" for="flexCheckChecked4">
                                                Format file valid
                                              </label>
                                            </div>
                                          </div>
                                        </div>
              
              
              
                                        <div class="col">
                                          <input type="file" class="form-control-file" id="file2" name="fileReferensi2">
                                        </div>
                                      </div>
                                    </ol>

                                    @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                        {{ $error }} <br/>
                                        @endforeach
                                    </div>
                                    @endif
              
                                    <div class="row">
                                      <div class="col">
                                        <div class="justify-content">
                                          <a class="btn btn-primary" href="\3" role="button">Sebelumnya</a> 
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="d-flex flex-row-reverse">
                                        <button class="btn btn-primary" id="submit" type="submit">Berikutnya</button>
                                        </form>
                                        </div>
                                      </div>
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

    @if ($dataAcuan === "bank")
    <script>
      document.getElementById("rekonsiliasi-menu").classList.add("active");
      
      document.getElementById('file1').addEventListener('change', function() {
        document.getElementById('flexCheckChecked1').checked = false;
        const file = document.getElementById('file1').files[0];
        const reader = new FileReader();
        reader.onload = function() {
          const fileContent = reader.result;
          const workbook = XLSX.read(fileContent, {type: 'binary'});
          const sheetNames = workbook.SheetNames[0];
          const sheetData = workbook.Sheets[sheetNames];

          var r2 = sheetData.B1.v
          var r10 = sheetData.J1.v;

                        // Berlaku cuman untuk bank
          if(r2 === "refnum" && r10 === "biller_journal") {
              document.getElementById('flexCheckChecked1').checked = true;
          }

        };
        reader.readAsBinaryString(file);
      if (this.files.length > 0) {
        document.getElementById('fileCheckBox1').checked = true;
      }});

      document.getElementById('file2').addEventListener('change', function() {
        document.getElementById('flexCheckChecked2').checked = false;
        const file = document.getElementById('file2').files[0];
        const reader = new FileReader();

        reader.onload = function() {
          const fileContent = reader.result;
          const workbook = XLSX.read(fileContent, {type: 'binary'});
          const sheetNames = workbook.SheetNames[0];
          const sheetData = workbook.Sheets[sheetNames];

          var r1 = sheetData.A1.v;
            var r2 = sheetData.B1.v;
            var r3 = sheetData.C1.v;
            var r4 = sheetData.D1.v;
            var r5 = sheetData.E1.v;
            var r6 = sheetData.F1.v;
            var r7 = sheetData.G1.v;
            var r8 = sheetData.H1.v;
            var r9 = sheetData.I1.v;
            var r10 = sheetData.J1.v;
            var r11 = sheetData.K1.v;
            var r12 = sheetData.L1.v;
            var r13 = sheetData.M1.v;
            var r14 = sheetData.N1.v;
            var r15 = sheetData.O1.v;
            var r16 = sheetData.P1.v;
            var r17 = sheetData.Q1.v;
            var r18 = sheetData.R1.v;
            // Berlaku cuman untuk bank
            if(r1 === "id" && r2 === "datetime" && r3 === "amount" && r4 === "margin" && r5 === "total" && r6 === "user_id" && r7 === "product_id" && r8 === "supplier_amount" && r9 === "supplier_admin" && r10 === "supplier_total" && r11 === "transaction_status" && r12 === "transaction_message" && r13 === "journal" && r14 === "cust_id" && r15 === "supplier_reff" && r16 === "additional" && r17 ==="created_at" && r18 === "updated_at") {
                document.getElementById('flexCheckChecked2').checked = true;
            }

        };

        reader.readAsBinaryString(file);

        if (this.files.length > 0) {
            document.getElementById('fileCheckBox2').checked = true;
            }
        });
    </script>
    @endif

    @if ($dataAcuan === "bankplus")
    <script>
      document.getElementById("rekonsiliasi-menu").classList.add("active");
      
      document.getElementById('file1').addEventListener('change', function() {
        document.getElementById('flexCheckChecked1').checked = false;
        const file = document.getElementById('file1').files[0];
        const reader = new FileReader();
        reader.onload = function() {
          const fileContent = reader.result;
          const workbook = XLSX.read(fileContent, {type: 'binary'});
          const sheetNames = workbook.SheetNames[0];
          const sheetData = workbook.Sheets[sheetNames];

          var r1 = sheetData.A1.v
          var r2 = sheetData.B1.v
          var r3 = sheetData.C1.v
          var r4 = sheetData.D1.v
          var r5 = sheetData.E1.v
          var r6 = sheetData.F1.v
          var r7 = sheetData.G1.v

          if(r1 === "No." && r2 === "Tgl. Transaksi" && r3 === "TimeStamp" && r4 === "No. Arsip" && r5 === "Kode" && r6 === "Keterangan" && r7 === "Jumlah Mutasi") {
              document.getElementById('flexCheckChecked1').checked = true;
          }

        };
        reader.readAsBinaryString(file);
      if (this.files.length > 0) {
        document.getElementById('fileCheckBox1').checked = true;
      }});

      document.getElementById('file2').addEventListener('change', function() {
        document.getElementById('flexCheckChecked2').checked = false;
        const file = document.getElementById('file2').files[0];
        const reader = new FileReader();

        reader.onload = function() {
          const fileContent = reader.result;
          const workbook = XLSX.read(fileContent, {type: 'binary'});
          const sheetNames = workbook.SheetNames[0];
          const sheetData = workbook.Sheets[sheetNames];

          var r1 = sheetData.A1.v;
            var r2 = sheetData.B1.v;
            var r3 = sheetData.C1.v;
            var r4 = sheetData.D1.v;
            var r5 = sheetData.E1.v;
            var r6 = sheetData.F1.v;
            var r7 = sheetData.G1.v;
            var r8 = sheetData.H1.v;
            var r9 = sheetData.I1.v;
            var r10 = sheetData.J1.v;
            var r11 = sheetData.K1.v;
            var r12 = sheetData.L1.v;
            var r13 = sheetData.M1.v;
            var r14 = sheetData.N1.v;
            var r15 = sheetData.O1.v;
            var r16 = sheetData.P1.v;
            var r17 = sheetData.Q1.v;
            var r18 = sheetData.R1.v;
            // Berlaku cuman untuk bank
            if(r1 === "id" && r2 === "datetime" && r3 === "amount" && r4 === "margin" && r5 === "total" && r6 === "user_id" && r7 === "product_id" && r8 === "supplier_amount" && r9 === "supplier_admin" && r10 === "supplier_total" && r11 === "transaction_status" && r12 === "transaction_message" && r13 === "journal" && r14 === "cust_id" && r15 === "supplier_reff" && r16 === "additional" && r17 ==="created_at" && r18 === "updated_at") {
                document.getElementById('flexCheckChecked2').checked = true;
            }

        };

        reader.readAsBinaryString(file);

        if (this.files.length > 0) {
            document.getElementById('fileCheckBox2').checked = true;
            }
        });
    </script>
    @endif

    @if ($dataAcuan === "biller")
    <script>
      document.getElementById("rekonsiliasi-menu").classList.add("active");
      document.getElementById('file1').addEventListener('change', function() {
        document.getElementById('flexCheckChecked1').checked = false;
        const file = document.getElementById('file1').files[0];
        const reader = new FileReader();
        reader.onload = function() {
          const fileContent = reader.result;
          const workbook = XLSX.read(fileContent, {type: 'binary'});
          const sheetNames = workbook.SheetNames[0];
          const sheetData = workbook.Sheets[sheetNames];

          var r1 = sheetData.A1.v
          var r2 = sheetData.B1.v
          var r3 = sheetData.C1.v
          var r4 = sheetData.D1.v
          var r5 = sheetData.E1.v
          var r6 = sheetData.F1.v
          var r7 = sheetData.G1.v

          if(r1 === "No." && r2 === "Tgl. Transaksi" && r3 === "TimeStamp" && r4 === "No. Arsip" && r5 === "Kode" && r6 === "Keterangan" && r7 === "Jumlah Mutasi") {
              document.getElementById('flexCheckChecked1').checked = true;
          }

        };
        reader.readAsBinaryString(file);
      if (this.files.length > 0) {
        document.getElementById('fileCheckBox1').checked = true;
      }});

      document.getElementById('file2').addEventListener('change', function() {
        document.getElementById('flexCheckChecked2').checked = false;
        const file = document.getElementById('file2').files[0];
        const reader = new FileReader();

        reader.onload = function() {
          const fileContent = reader.result;
          const workbook = XLSX.read(fileContent, {type: 'binary'});
          const sheetNames = workbook.SheetNames[0];
          const sheetData = workbook.Sheets[sheetNames];
          var r2 = sheetData.B1.v
          var r10 = sheetData.J1.v;

            // Berlaku cuman untuk bank
            if(r2 === "refnum" && r10 === "biller_journal") {
                document.getElementById('flexCheckChecked2').checked = true;
            }

        };

        reader.readAsBinaryString(file);

        if (this.files.length > 0) {
            document.getElementById('fileCheckBox2').checked = true;
            }
        });
    </script>
    
    @endif

    

    

    <script> 

      const step4 = document.getElementById("step4");
      step4.classList.add("active");

      
      // Format file akan mengisi attribute masing-masing input dalam halaman ini
      document.getElementById('file1').setAttribute('accept', '.'+'{{ $radioButtonValue }}');
      document.getElementById('file2').setAttribute('accept', '.'+'{{ $radioButtonValue }}');

      document.getElementById("submit").onclick = function(){
        document.getElementById('flexCheckChecked1').disabled = false;
        document.getElementById('flexCheckChecked2').disabled = false;
        document.getElementById('fileCheckBox1').disabled = false;
        document.getElementById('fileCheckBox2').disabled = false;
    };

      
        

    
    </script>

    @endsection
