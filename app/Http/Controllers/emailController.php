<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\surat;
use App\Mail\email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use DB;

class emailController extends Controller
{
    //
    public function index($id_surat){
 
        $surat = DB::table('surats')->where('surats.id_surat', '=', $id_surat)
        ->join('ttds', 'ttds.id_surat', '=', 'surats.id_surat')
        ->first();
		Mail::to($surat->email)->send(new email($surat->nama_surat, $surat->id_surat, $surat->email, $surat->jenis_surat, $surat->created_at, $surat->nama_penerima, $surat->isi_surat, $surat->path_img, $surat->ttders));
 
		return redirect::to('reviewsurat');
 
	}
}
