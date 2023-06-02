<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat;
use DB;
use Auth;
use app\http\controllers\suratController;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $surat = surat::All()->orderBy('created_at', 'desc');
        $akun = Auth::user();
        $diterima = surat::query()->select('surat')->where('status_surat', '=', 'diterima')->count();
        $ditolak = surat::query()->select('surat')->where('status_surat', '=', 'ditolak')->count();
        $tunggu = surat::query()->select('surat')->where('status_surat', '=', 'menunggu approval')->count();        
        if ($akun->role == 'sekertaris') {
            return view('Nico.homepage', compact('surat', 'akun', 'diterima', 'ditolak', 'tunggu'));
        }
        else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
            return view('Yoyo.homepage', compact('surat', 'akun', 'diterima', 'ditolak', 'tunggu'));
        }
    }

    public function filter(Request $request){
        if($request->sort != Null){
            $sort = $request->sort;
        }
        else {
            $sort = 'desc';
        }
        $filter = $request->filter;
 
        // mengambil data dari table surat sesuai pencarian data
        $surat = surat::query()->orderBy('created_at', $sort)
        ->where('status_surat', 'LIKE', "%{$filter}%")
        ->orwhere('nama_surat', 'LIKE', "%{$filter}%")
            ->orWhere('nama_penerima', 'LIKE', "%{$filter}%")
            ->orWhere('created_at', 'LIKE', "%{$filter}%")
            ->orWhere('jenis_surat', 'LIKE', "%{$filter}%")
        ->get();
        $akun = Auth::user();
    $diterima = surat::query()->select('surat')->where('status_surat', '=', 'diterima')->count();
    $ditolak = surat::query()->select('surat')->where('status_surat', '=', 'ditolak')->count();
    $tunggu = surat::query()->select('surat')->where('status_surat', '=', 'menunggu approval')->count();        

        // mengirim data surat ke view index
        if ($akun->role == 'sekertaris') {
            return view('Nico.homepage', compact('surat', 'sort', 'akun', 'diterima', 'ditolak', 'tunggu'));
        }
        else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
            return view('Yoyo.homepage', compact('surat', 'sort', 'akun', 'diterima', 'ditolak', 'tunggu'));
        }
    }
 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
