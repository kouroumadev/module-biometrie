<?php

namespace App\Http\Controllers;

use App\Mail\SendDemande;
use App\Mail\SendEmployeur;
use App\Models\Biometrie;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BiometrieController extends Controller
{
    public function BiometrieIndex()
    {
        return view('biometrie.index');
    }

    public function EmployeurInfoAjax(Request $request)
    {
        $num = $request->no_employeur;

        if ($num == '') {
            return response()->json('null', 200);
        } else {
            $data = DB::table('employeur')
                // ->table('employeur')
                ->where('no_employeur', $num)
                ->get(); //8204000010400
            if (count($data) == 0) {
                return response()->json('not exist', 200);
            } else {
                return response()->json($data, 200);
            }
        }
    }

    public function SendOtpAjax(Request $request)
    {
        $email = $request->email;
        $last = Otp::where('email', $email)
            ->latest()
            ->first();
        if ($last) {
            $otp = rand(00000, 99999);
            $update = Otp::find($last->id);
            $update->code = $otp;
            $update->save();

            //dd($last->id);
            Mail::to($email)->send(new SendEmployeur($otp));

            return response()->json('update', 200);
        } else {
            $otp = rand(00000, 99999);
            $otp_store = new Otp();
            $otp_store->code = $otp;
            $otp_store->email = $email;
            $otp_store->save();

            Mail::to($email)->send(new SendEmployeur($otp));

            return response()->json('success', 200);
        }

        // $no_employeur = $request->no_employeur;
        // if ($no_employeur == '') {
        //     return response()->json('null', 200);
        // } else {
        //     $data = DB::connection('metier')
        //         ->table('employeur')
        //         ->where('no_employeur', $no_employeur)
        //         ->get(); //8204000010400
        //     if (count($data) == 0) {
        //         return response()->json('not exist', 200);
        //     } else {
        //         $otp = rand(00000, 99999);
        //         // dd($otp);
        //         $otp_store = new Otp();
        //         $otp_store->code = $otp;
        //         $otp_store->save();

        //         Mail::to($email)->send(new SendEmployeur($otp));

        //         return response()->json('success', 200);
        //     }
        // }
    }

    public function VerifOtpAjax(Request $request)
    {
        $code = $request->otp;
        $otp_db = Otp::where('code', $code)->get();
        //dd(count($otp_db));
        if (count($otp_db) == 1) {
            $delete = DB::table('otps')
                ->where('email', $otp_db[0]->email)
                ->delete();

            return response()->json('success', 200);
        } else {
            return response()->json('not exist', 200);
        }

        // $code_db = $otp_db[0]->code;
        // if ($code == $code_db) {
        //     Otp::whereNotNull('id')->delete();

        //     return response()->json('success', 200);
        // } else {
        //     return response()->json('not exist', 200);
        // }
    }

    public function SendDemande(Request $request)
    {
        //dd($request->all());
        $no_dossier = uniqid();
        $file = $request->file('fichier')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $img = $no_dossier . '.' . $extension;
        Storage::disk('bioDoc')->put(
            $img,
            file_get_contents($request->file('fichier'))
        );

        $email = $request->email;
        $raison_sociale = $request->raison_sociale_bio;

        $biometrie = new Biometrie();
        $biometrie->no_employeur = $request->no_employeur;
        $biometrie->no_dossier = $no_dossier;
        $biometrie->email = $email;
        $biometrie->telephone = $request->telephone;
        $biometrie->adresse = $request->adresse;
        $biometrie->nombre_employe = $request->nombre_employe;
        $biometrie->fichier = $img;
        $biometrie->save();

        Mail::to($email)->send(new SendDemande($no_dossier, $raison_sociale));

        Alert::success(
            'Votre démande à bien été reçu !',
            'Un e-mail de confirmation à été envoyé.'
        );

        return redirect()->route('biometrie.index');
    }
    ///BACKEND

    public function back()
    {
        $data = DB::table('employeur')
            // ->table('employeur')
            ->where('no_employeur', '6104000050400') #8204000010400 2504000020400 6104000030400
            ->get();

        // dd($data);
        return view('biometrie.back', compact('data'));
    }

    public function backDetails(int $id)
    {
        // dd($id);
        $data = DB::table('metiemployeurer')
            // ->table('employeur')
            ->where('id', $id)
            ->get();
        // dd($data);
        return view('biometrie.details', compact('data'));
    }
}
