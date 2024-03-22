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
                                 <section class="mt-5">
                                    <h5 class="mb-0">File Acuan</h5>
                                    <div class="row">
                                        {{-- Content Inside of first Row --}}
                                        <div class="col">
                                            <ol>
                                            <li>Pilih jenis data acuan</li>
                
                                            <form action="3/post" method="post" enctype="multipart/form-data">
                                                @csrf
                                                {{-- IF menyesuaikan templates  --}}
                                                @if ($referensi === "bank")
                                                <input type="radio" id="bankplus" name="dataAcuan" value="bankplus">
                                                <label for="bankplus">Bankplus</label><br>
                                                
                                                <input type="radio" id="biller" name="dataAcuan" value="biller">
                                                <label for="biller">Biller</label>

                                                <input hidden type="radio" id="bank" name="dataAcuan" value="bank" >
                                                <label hidden for="bank">Bank</label><br>
                                                @endif

                                                @if ($referensi === "bankplus")

                                                <input type="radio" id="bank" name="dataAcuan" value="bank" >
                                                <label for="bank">Bank</label><br>

                                                <input type="radio" id="biller" name="dataAcuan" value="biller">
                                                <label for="biller">Biller</label>

                                                <input hidden type="radio" id="bankplus" name="dataAcuan" value="bankplus">
                                                <label hidden for="bankplus">Bankplus</label><br>



                                                @endif

                                                @if ($referensi === "biller")

                                                <input type="radio" id="bank" name="dataAcuan" value="bank">
                                                <label for="bank">Bank</label><br>
                                                <input type="radio" id="bankplus" name="dataAcuan" value="bankplus">
                                                <label for="bankplus">Bankplus</label><br>

                                                <input hidden type="radio" id="biller" name="dataAcuan" value="biller">
                                                <label hidden for="biller">Biller</label>
                                                @endif


                                                {{-- <input type="radio" id="bank" name="dataAcuan" value="bank" class="@error('dataAcuan') is-invalid @enderror">
                                                <label for="bank">Bank</label><br>
                                                <input type="radio" id="bankplus" name="dataAcuan" value="bankplus">
                                                <label for="bankplus">Bankplus</label><br>
                                                <input type="radio" id="biller" name="dataAcuan" value="biller">
                                                <label for="biller">Biller</label> --}}
                                                
                                                <li>Upload file acuan </li>
                                                <input type="file" class="form-control-file " id="fileAcuan" name="fileAcuan"><br>
                                                </ol>

                                                @if(count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                    {{ $error }} <br/>
                                                    @endforeach
                                                </div>
                                                @endif
                                            
                                        </div>
                                        <div class="col">
                                            <h5>Verifikasi</h5>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="checkFormatData" value="1" disabled="true">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Format data sesuai template
                                            </label>
                                            </div>   
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="formatFileChecked" name="checkFormatFile" value="1" disabled="true">
                                            <label class="form-check-label" for="flexCheckChecked1">
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
                                            <a class="btn btn-primary" href="\2" role="button">Sebelumnya</a> 
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-row-reverse">
                                                <button class="btn btn-primary" id="submit" type="submit">Berikutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                   </section>

                                   <table id="table"></table>
                                 
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

    document.getElementById("step3");
    const step4 = document.getElementById("step3");
    step4.classList.add("active");


    const fileAcuan = document.getElementById('fileAcuan');
    fileAcuan.setAttribute('accept', '.'+'{{ $radioButtonValue }}');

    var bank = document.getElementById("bank");
    var bankplus = document.getElementById("bankplus");
    var biller = document.getElementById("biller");

    biller.onclick = function(){
        bankplus.disabled = true;
        bank.disabled = true;

        document.getElementById('flexCheckChecked').checked = false;
        document.getElementById('formatFileChecked').checked = false;
        
        fileAcuan.addEventListener('change', function() {
        const file = document.getElementById('fileAcuan').files[0]; 
        const reader = new FileReader();
        reader.onload = function() {
            const fileContent = reader.result;
            const workbook = XLSX.read(fileContent, {type: 'binary'});
            //Ngambil file terus dijadikan objek
            const sheetNames = workbook.SheetNames[0];
            const sheetData = workbook.Sheets[sheetNames];

            // Ambil nama dulu 
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
                document.getElementById('flexCheckChecked').checked = true;
            }
        };
        document.getElementById('flexCheckChecked').checked = false;
        reader.readAsBinaryString(file);

        if (this.files.length > 0) {
            document.getElementById('formatFileChecked').checked = true;
        }
    })
    }

    bank.onclick = function(){
        bankplus.disabled = true;
        biller.disabled = true;

        document.getElementById('flexCheckChecked').checked = false;
        document.getElementById('formatFileChecked').checked = false;
        
        fileAcuan.addEventListener('change', function() {
        const file = document.getElementById('fileAcuan').files[0]; 
        const reader = new FileReader();
        reader.onload = function() {
            
            const fileContent = reader.result;
            const workbook = XLSX.read(fileContent, {type: 'binary'});
            //Ngambil file terus dijadikan objek
            const sheetNames = workbook.SheetNames[0];
            const sheetData = workbook.Sheets[sheetNames];

            // Ambil nama dulu 
            var r1 = sheetData.A1.v
            var r2 = sheetData.B1.v
            var r3 = sheetData.C1.v
            var r4 = sheetData.D1.v
            var r5 = sheetData.E1.v
            var r6 = sheetData.F1.v
            var r7 = sheetData.G1.v

                        // Berlaku cuman untuk bank
            if(r1 === "No." && r2 === "Tgl. Transaksi" && r3 === "TimeStamp" && r4 === "No. Arsip" && r5 === "Kode" && r6 === "Keterangan" && r7 === "Jumlah Mutasi") {
                document.getElementById('flexCheckChecked').checked = true;
            }
        };
        document.getElementById('flexCheckChecked').checked = false;
        reader.readAsBinaryString(file);

        if (this.files.length > 0) {
            document.getElementById('formatFileChecked').checked = true;
        }
    })
    }

    bankplus.onclick = function(){
        bank.disabled = true;
        biller.disabled = true;

        document.getElementById('flexCheckChecked').checked = false;
        document.getElementById('formatFileChecked').checked = false;
        
        fileAcuan.addEventListener('change', function() {
        const file = document.getElementById('fileAcuan').files[0]; 
        const reader = new FileReader();
        reader.onload = function() {
            const fileContent = reader.result;
            const workbook = XLSX.read(fileContent, {type: 'binary'});
            //Ngambil file terus dijadikan objek
            const sheetNames = workbook.SheetNames[0];
            const sheetData = workbook.Sheets[sheetNames];

            // Ambil nama dulu 

            var r2 = sheetData.B1.v
            var r10 = sheetData.J1.v;


                        // Berlaku cuman untuk bank
            if(r2 === "refnum" && r10 === "biller_journal") {
                document.getElementById('flexCheckChecked').checked = true;
            }
        };
        document.getElementById('flexCheckChecked').checked = false;
        reader.readAsBinaryString(file);

        if (this.files.length > 0) {
            document.getElementById('formatFileChecked').checked = true;
        }
    })
    }
        
    document.getElementById("submit").onclick = function(){
        document.getElementById('formatFileChecked').disabled = false;
        document.getElementById('flexCheckChecked').disabled = false;
    };
  </script>
@endsection