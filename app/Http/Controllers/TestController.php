<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test.index');
    }

    public function proses(Request $request)
    {
        $input = $request->all();
        // return $input['test'][0]['nim'];
        $no = 0;
        foreach($input['test'] as $detail) {
            $nilaiAkhir = ((0.2 * $detail['nilaiHadir']) + (0.4 * $detail['nilaiMidtest']) + (0.4 * $detail['nilaiUas']));
            // return $nilaiAkhir;

            $input['test'][$no++]['nilaiAkhir'] = $nilaiAkhir; 
       
            if($nilaiAkhir >= 61) {
                $status[] = 'Lulus';
            } else {
                $status[] = 'Tidak Lulus';
            }
        }

        $lulus = count(array_keys($status, "Lulus"));   
        $tidakLulus = count(array_keys($status, "Tidak Lulus"));

        $hasil = $input['test'];
        // return $hasil;
        $jumlahSiswa = count($hasil);
        return view('test.jawab', compact('hasil', 'jumlahSiswa', 'lulus', 'tidakLulus'));
    }
}
