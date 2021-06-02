<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkir;
use App\Models\KategoriKendaraan;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkirs = Parkir::with(['kendaraan'])->get();
        return view('parkir.index', compact('parkirs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parkir = Parkir::all();
        $kendaraan = KategoriKendaraan::Orderby('nama')->pluck('nama','id');
        return view('parkir.create', compact('parkir' ,'kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $parkir = Parkir::create([
            'nota'              => $request->nota,
            'petugas'           => $request->petugas,
            'type_kendaraan'    => $request->kendaraan,
            'waktu_masuk'       => $request->waktu,
        ]);
        return redirect()->route('parkir.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nota)
    {
        $parkir = Parkir::where('nota', $nota)->first();
        return view('parkir.show', compact('parkir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nota)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nota)
    {
        $parkir = Parkir::where('nota', $nota)->first();
        $parkir->update([
            'waktu_keluar'  => \Carbon\Carbon::now()
        ]);
        return redirect()->route('parkir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
