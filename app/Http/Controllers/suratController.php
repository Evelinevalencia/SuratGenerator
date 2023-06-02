<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat;
use Illuminate\Support\Facades\Redirect;
use App\Models\komentar;
use App\Models\User;
use Auth;
use DB;

class suratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $surat = surat::All();
        $akun = Auth::user();

        if ($akun->role == 'sekertaris') {
            return view('Nico.reviewsurat', compact('surat'));
        }
        else if ($akun->role == 'sekertaris' || $akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
            return view('Yoyo.halamanreview', compact('surat'));
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

        // mengirim data surat ke view index
        if ($akun->role == 'sekertaris') {
            return view('Nico.reviewsurat', compact('surat', 'sort', 'akun'));
        }
        else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
            return view('Yoyo.halamanreview', compact('surat', 'sort', 'akun'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id_template)
    {
        //
        return view('Nico.isisurat', ['id_template' => $id_template]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $surat = new surat();
        $surat->id_template = $request->id_template;
        $surat->nama_penerima = $request->nama_penerima;
        $surat->nama_surat = $request->nama_surat;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->email = $request->email;
        $surat->isi_surat = $request->isi_surat;
        $surat->save();
        return Redirect::to('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_surat)
    {
        //
        $akun = Auth::user();
        $surat = surat::find($id_surat);
        $ttd = DB::table('ttds')->where('ttds.id_surat', '=', $id_surat)->first();
        $komen = DB::table('komentars')->orderBy('komentars.created_at', 'desc')->join('users', 'users.id', '=', 'komentars.id_user')
            ->where('komentars.id_surat', '=', $id_surat)->get();
        
            if ($akun->role == 'sekertaris') {
                return view('Nico.viewsurat', compact('surat', 'komen', 'ttd'));
            }
            else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
                return view('Yoyo.tampilanview', compact('surat', 'komen', 'ttd'));
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_surat)
    {
        //
        $akun = Auth::user();

        $surat = surat::where('id_surat', $id_surat)->first();

        if ($akun->role == 'sekertaris') {
            $komen = DB::table('komentars')->join('users', 'users.id', '=', 'komentars.id_user')
            ->where('komentars.id_surat', '=', $id_surat)->get();
            return view('Nico.editsurat', ['surat' => $surat, 'komen' => $komen]);
        }
        else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
            return view('Yoyo.halamanreview', compact('surat'));
            
        }
        
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id_surat)
    {
        //
        $akun = Auth::user();

        

        if ($akun->role == 'sekertaris') {
            $surat = surat::find($id_surat);
            $surat->id_template = $request->id_template;
            $surat->nama_penerima = $request->nama_penerima;
            $surat->nama_surat = $request->nama_surat;
            $surat->jenis_surat = $request->jenis_surat;
            $surat->email = $request->email;
            $surat->isi_surat = $request->isi_surat;
            $surat->save();
            return Redirect::to('reviewsurat');
        }
        else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
            $id_surat = $request->idsurat;
            $surat = surat::find($id_surat);
            $surat->status_surat = $request->status;
            $surat->save();
            if ($request->status == 'diterima') {
                return Redirect::to('kirimemail/'.$id_surat);
            }
            else {
                return Redirect::to('reviewsurat');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_surat)
    {
        //
        $model = surat::find($id_surat);
        $model->delete();
        return Redirect::to('reviewsurat');
    }
}
