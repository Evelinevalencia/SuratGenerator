<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat;
use Illuminate\Support\Facades\Redirect;

class statusController extends Controller
{
    //
    public function stat(request $request){
        $surat = surat::find($request->idsurat);
        $surat->status_surat = $request->status;
        $surat->save();
        return redirect::to('reviewsurat');
    }

}
