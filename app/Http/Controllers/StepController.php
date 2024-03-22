<?php

namespace App\Http\Controllers;


use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class StepController extends Controller

{
   
    public function stepOne(Request $request){
        $request->session()->forget('lanjut2');
        $request->session()->forget('lanjut3');
        $request->session()->forget('lanjut4');
        $request->session()->forget('lanjut5');
        
        $request->session()->put('lanjut2', '2');
        return view('sementara.step-one');
    }
    
    public function stepTwo(Request $request){        
        if($request->session()->has('lanjut2')){
            $request->session()->forget('lanjut2');
            return view('sementara.step-two');
        }
        else {
            $request->session()->forget('lanjut2');
            $request->session()->forget('lanjut3');
            $request->session()->forget('lanjut4');
            $request->session()->forget('lanjut5');
            
            return redirect('/1');
        }

    }

    public function stepTwoPost(Request $request){
        $validatedData = Validator::make($request->all(),[
            'file'=>['required'],
            'dataReferensi'=>['required']
        ]
        );
        
        if($validatedData->fails()){
            return redirect('/1')->withErrors($validatedData);
        }

        $step = new Step;
        $step->fill(['dataReferensi'=>$request->dataReferensi,'file'=>$request->file]);
        $request->session()->put('step', $step);
        $request->session()->put('lanjut3', '3');
        
        
        $radioButtonValue = $request->input('file');
        $radioButtonValue1 = $request->input('dataReferensi');

        $request->session()->put('radioButtonValue', $radioButtonValue);
        $request->session()->put('radioButtonValue1', $radioButtonValue1);

        return redirect('/3');
    }
    
    public function stepThree(Request $request,){
        $radioButtonValue = $request->session()->get('radioButtonValue');
        $radioButtonValue1 = $request->session()->get('radioButtonValue1');

        $referensi = session()->get('step')->dataReferensi;

        if($request->session()->has('lanjut3')){
            $request->session()->forget('lanjut3');
            $request->session()->put('lanjut4', '4');
            return view('sementara.step-three')->
            with('radioButtonValue', session()->get('step')->file)->
            with('referensi', session()->get('step')->dataReferensi);
        }    
        
        else {
            $request->session()->forget('lanjut2');
            $request->session()->forget('lanjut3');
            $request->session()->forget('lanjut4');
            $request->session()->forget('lanjut5');
            return redirect('/1')->withErrors(['msg', 'The Message']);
        }
    }



    public function stepThreePost(Request $request){
        $radioButtonValue = $request->session()->get('radioButtonValue');
        $step = $request->session()->get('step');

        #--/ Validadasi /--#
        $validatedData = Validator::make($request->all(),[
            'dataAcuan'=>['required'],
            'fileAcuan'=>['required', File::types([$radioButtonValue])],
            'checkFormatData'=>['accepted'],
            'checkFormatFile'=>['accepted']
        ]
        );
        
        if($validatedData->fails()){
            return redirect('/1')->withErrors($validatedData);
        }
        
        // File masuk ke-dalam controller
        $file = $request->file('fileAcuan');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$file->getClientOriginalName());

        // Ngisi data ke session
        $step->fill(['dataAcuan'=>$request->dataAcuan , 'fileAcuan'=> $nama_file]);
        $request->session()->put('step', $step);


        $request->session()->put('fileAcuan', $file->getClientOriginalName());
        return redirect('4');

        #---/ --------------------------------------------------------------------- / ---#
    }

    // Function Asli *jangan dihapus
    public function stepFour(Request $request){
        if($request->session()->has('lanjut4')){
            $request->session()->forget('lanjut4');

            $radioButtonValue = $request->session()->get('radioButtonValue');
            $radioButtonValue1 = $request->session()->get('radioButtonValue1');


            return view('sementara.step-four')->with('radioButtonValue', $radioButtonValue)->with('dataAcuan', $request->session()->get('step')->dataAcuan);
        }

        else {
            $request->session()->forget('lanjut2');
            $request->session()->forget('lanjut3');
            $request->session()->forget('lanjut4');
            $request->session()->forget('lanjut5');

            return redirect('/1')->withErrors(['msg', 'The Message']);
        }

    }

    public function stepFourPost(Request $request){
        $step = $request->session()->get('step');
        $validatedData = Validator::make($request->all(),[
            'checkFormatData2'=>['accepted'],
            'checkFormatFile2'=>['accepted'],
            'checkFormatData1'=>['accepted'],
            'checkFormatFile1'=>['accepted'],
            'fileReferensi1' =>['required'],
            'fileReferensi2' =>['required'],
        ]
        );
        if($validatedData->fails()){
            return redirect('/1')->withErrors($validatedData);
        }
        #--/ File Rekonsiliasi1 /--#
        $file1 = $request->file('fileReferensi1');
        $nama_file1 = time()."_".$file1->getClientOriginalName();
        $tujuan_upload = 'data_file';
		$file1->move($tujuan_upload,$file1->getClientOriginalName());

        #--/ File Rekonsiliasi2  /--#
        $file2 = $request->file('fileReferensi2');
        $nama_file2 = time()."_".$file2->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file2->move($tujuan_upload,$file2->getClientOriginalName());

        $step->fill(['fileReferensi1'=>$nama_file1 , 'fileReferensi2'=> $nama_file2]);
        $step->save();
        $request->session()->put('lanjut5', '5');
        $request->session()->put('namafileReferensi1', $file1->getClientOriginalName());
        $request->session()->put('namafileReferensi2', $file2->getClientOriginalName());
        return redirect('/5');
    }

    public function stepFive(Request $request){
        If($request->session()->has('lanjut5')){
            $request->session()->forget('lanjut5');

            $namaAcuanFile = $request->session()->get('fileAcuan');
            $namaReferensiFile1 = $request->session()->get('namafileReferensi1');
            $namaReferensiFile2 = $request->session()->get('namafileReferensi2');

            $fileAcuan = IOFactory::load(public_path("data_file\\".$namaAcuanFile));
            $sheetAcuan = $fileAcuan->getActiveSheet();
            $rowsAcuan = $sheetAcuan->toArray();
            $tableAcuan = $sheetAcuan->toArray();
            unset($tableAcuan[0]);


            $fileReferensi1 = IOFactory::load("data_file\\".$namaReferensiFile1);
            $sheetReferensi1 = $fileReferensi1->getActiveSheet();
            $rowsReferensi1 = $sheetReferensi1->toArray();
            $tableReferensi1 = $sheetReferensi1->toArray();
            unset($tableReferensi1[0]);
            

            $fileReferensi2 = IOFactory::load("data_file\\".$namaReferensiFile2);
            $sheetReferensi2 = $fileReferensi2->getActiveSheet();
            $rowsReferensi2 = $sheetReferensi2->toArray();
            $tableReferensi2 = $sheetReferensi2->toArray();
            unset($tableReferensi2[0]);

            $request->session()->put('lanjut6', '6');

            return view("sementara.step-five")
                ->with("rowsAcuan", $rowsAcuan)->with("tableAcuan", $tableAcuan)
                ->with("rowsReferensi1",$rowsReferensi1)->with("tableReferensi1",$tableReferensi1)
                ->with("rowsReferensi2",$rowsReferensi2)->with("tableReferensi2",$tableReferensi2)
                ->with("namaAcuanFile",$namaAcuanFile)->with("namaReferensiFile1",$namaReferensiFile1)
                ->with("namaReferensiFile2",$namaReferensiFile2);
            }

        else{ 
            $request->session()->forget('lanjut2');
            $request->session()->forget('lanjut3');
            $request->session()->forget('lanjut4');
            $request->session()->forget('lanjut5');

            return redirect('/1')->withErrors(['msg', 'The Message']);
        }

    }

    public function stepSix(Request $request){
        // if($request->session()->has('lanjut6')){
            $request->session()->forget('lanjut6');
            $namaAcuanFile = $request->session()->get('fileAcuan');
            $namaReferensiFile1 = $request->session()->get('namafileReferensi1');
            $namaReferensiFile2 = $request->session()->get('namafileReferensi2');

            // Ambil file acuan //
            $fileAcuan = IOFactory::load(public_path("data_file\\".$namaAcuanFile));
            $sheetAcuan = $fileAcuan->getActiveSheet();
            $rowsAcuan = $sheetAcuan->toArray();
            
            // Ambil file referensi //
            $fileReferensi1 = IOFactory::load("data_file\\".$namaReferensiFile1);
            $sheetReferensi1 = $fileReferensi1->getActiveSheet();
            $rowsReferensi1 = $sheetReferensi1->toArray();

            $fileReferensi2 = IOFactory::load("data_file\\".$namaReferensiFile2);
            $sheetReferensi2 = $fileReferensi2->getActiveSheet();
            $rowsReferensi2 = $sheetReferensi2->toArray();

            // Bank sama Bankplus atau Bank ke Biller
            if($request->session()->get('step')->dataAcuan === "bank" && $request->session()->get('step')->dataReferensi === "bankplus" 
            || $request->session()->get('step')->dataAcuan === "bank" && $request->session()->get('step')->dataReferensi === "biller"){
                $a[0] = array('no','reffnum','bankplus','biller');
                for($i=1; $i<count($rowsAcuan); $i++){
                    $a[$i] = array($i,substr($rowsAcuan[$i][5], 2, 20),'False','False');
                    for($j=1; $j<count($rowsReferensi1); $j++){
                        if((substr($rowsAcuan[$i][5], 2, 20)) === $rowsReferensi1[$j][1]){
                            $a[$i] = array($i,substr($rowsAcuan[$i][5], 2, 20),'True','False');
                            for($k=1; $k<count($rowsReferensi1); $k++){
                            if($rowsReferensi1[$j][9] === $rowsReferensi2[$k][12]){
                                $a[$i] = array($i,substr($rowsAcuan[$i][5], 2, 20),'True','True');
                            }
                            }
                        }

                    }
                    
                }
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->fromArray($a, null, 'A1');
                $writer = new Xlsx($spreadsheet);
                $writer->save('list.xlsx');
                echo("Rekonsiliasi telah selesai");
                return view("sementara.step-six");
            
            }

            //Bankplus sama Bank atau Bankplus ke Biller
            if($request->session()->get('step')->dataAcuan === "bankplus" && $request->session()->get('step')->dataReferensi === "bank" || $request->session()->get('step')->dataAcuan === "bankplus" && $request->session()->get('step')->dataReferensi === "biller"){

                $a[0] = array('no','reffnum','bank','biller');
                for($i=1; $i<count($rowsAcuan); $i++){
                    $a[$i] = array($i,$rowsAcuan[$i][1],'False','False');
                    for($j=1; $j<count($rowsReferensi1); $j++){
                        if($rowsAcuan[$i][1] === substr($rowsReferensi1[$j][5], 2, 20)){
                            $a[$i] = array($i,$rowsAcuan[$i][1],'True','False');
                            for($k=1; $k<count($rowsReferensi2); $k++){
                                if($rowsAcuan[$i][9] === $rowsReferensi2[$k][12]){
                                    $a[$i] = array($i,$rowsAcuan[$i][1],'True','True');
                                }

                            }

                        }
                    }
                }

                // Buat array jadi Excel.
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->fromArray($a, null, 'A1');
                $writer = new Xlsx($spreadsheet);
                $writer->save('list.xlsx');
                // echo("Rekonsiliasi telah selesai");
                return view("sementara.step-six");
            }

            // Biller ke bank atau biller ke bankplus
            elseif($request->session()->get('step')->dataAcuan === "biller" && $request->session()->get('step')->dataReferensi === "bankplus" || $request->session()->get('step')->dataAcuan === "biller" && $request->session()->get('step')->dataReferensi === "bank"){
                $a[0] = array('no','journal','bankplus','bank');
                for($i=1; $i<count($rowsAcuan); $i++){
                    $a[$i] = array($i,$rowsAcuan[$i][12],'False','False');
                    
                    for($j=1; $j<count($rowsReferensi2); $j++){
                        if($rowsAcuan[$i][12] === $rowsReferensi2[$j][9]){
                            $a[$i] = array($i,$rowsAcuan[$i][12],'True','False');
                            for($k=1; $k<count($rowsReferensi1); $k++){
                                if($rowsReferensi2[$j][1] === substr($rowsReferensi1[$k][5], 2, 20)){
                                    $a[$i] = array($i,$rowsAcuan[$i][12],'True','True');
                                }

                            }
                        }


                    }
                }
                
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->fromArray($a, null, 'A1');
                $writer = new Xlsx($spreadsheet);
                $writer->save('list.xlsx');
                return view("sementara.step-six");
            }
        
    }
    public function download(){
        return response()->download(public_path('list.xlsx'));
    }
}
