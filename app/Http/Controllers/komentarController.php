<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat;
use App\Models\komentar;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class komentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_surat)
    {
        //
        $akun = Auth::user();
        $surat = surat::find($id_surat);
        $komen = DB::table('komentars')->orderBy('komentars.created_at', 'desc')->join('users', 'users.id', '=', 'komentars.id_user')
            ->where('komentars.id_surat', '=', $id_surat)->get();
        
            if ($akun->role == 'sekertaris') {
                return view('Nico.viewsurat', compact('surat', 'komen'));
            }
            else if ($akun->role == 'dekan' || $akun->role == 'rektor' || $akun->role == 'wakil rektor') {
                return view('Yoyo.promptkomentar', compact('surat', 'komen', 'akun'));
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $komen = new komentar();
        $komen->id_user = $request->iduser;
        $komen->id_surat = $request->idsurat;
        $komen->komentar = $request->komentar;
        $komen->save();
        return Redirect::to('reviewsurat/'.$request->idsurat);


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
