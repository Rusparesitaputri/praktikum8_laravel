<?php

namespace App\Http\Controllers;
   
use Illuminate\Http\Request;

class MobilController extends Controller
{
   protected $arrayMobil = [
      [
         'namaMobil' => 'Hijet',
         'merkMobil' => 'Daihatsu',
         'cc' => '1000cc',
      ],
      ];
   function index()
   {
      //data mobil : ketika session tidak kosong maka mereturn sebelah kiri
      //jika kosong maka mereturn sebelah kanan
      $dataMobil = session()->get('dataMobilBaru') ?? $this->arrayMobil;
    return view('mobil.index', compact('dataMobil'));
   }
   
   function create()
   {
    return view('mobil.form');
   }
   function store(Request $request)
   {
      $namaMobil = $request->nama_mobil;
      $merkMobil = $request->merk_mobil;
      $cc = $request->cc;

      $dataMobilBaru = [
         'namaMobil' => $namaMobil,
         'merkMobil' => $merkMobil,
         'cc' => $cc,
      ];
      
      array_push($this->arrayMobil,$dataMobilBaru);
      return redirect()->to('/mobil')->with('dataMobilBaru', $this->arrayMobil);
   }
}