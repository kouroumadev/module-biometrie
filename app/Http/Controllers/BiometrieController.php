<?php

namespace App\Http\Controllers;

use App\Mail\SendDemande;
use App\Mail\SendDetails;
use App\Mail\SendEmployeur;
use App\Models\BioDone;
use App\Models\Biometrie;
use App\Models\Otp;
use Illuminate\Contracts\Session\Session;
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
        // dd('in');
        // $data = DB::table('employeur')
        //     // ->table('employeur')
        //     ->where('no_employeur', '6104000050400') #8204000010400 2504000020400 6104000030400
        //     ->get();

        // dd($data);
        $dataNonValide = Biometrie::where('statut', '0')->get();
        $dataValide = BioDone::where('state', 'yes')->get();
        $dataRejected = BioDone::where('state', 'no')->get();
        // dd($data);

        return view(
            'biometrie.back',
            compact('dataNonValide', 'dataValide', 'dataRejected')
        );
    }

    public function backDetails(int $id)
    {
        $data = BioDone::find($id);
        $sms =
            $data->state == 'yes'
                ? 'Dossier éligible pour la biométrisation'
                : 'Dossier Rejeté par la Dirga';

        return view('biometrie.details', compact('data', 'sms'));
    }
    public function download(int $id)
    {
        // dd(Biometrie::find($id));
        $bio = Biometrie::find($id);

        // Assuming the file is stored in 'storage/app/public/excel-files'
        $path = storage_path('app/public/bioDoc/' . $bio->fichier);
        $fname = 'Employés-de-' . $bio->fichier;
        // dd($fname);

        // Customize headers as needed
        $headers = [
            'Content-Type' =>
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename=example.xlsx',
        ];

        return response()->download($path, $fname, $headers);
    }
    public function backStore(Request $request)
    {
        // dd($request->all());
        $mystate = explode('/', $request->customRadio);

        $biometrie = Biometrie::find($request->biometrie_id);
        $biometrie->statut = '1';
        $biometrie->save();
        $raison_sociale = DB::table('employeur')
            ->where('no_employeur', $biometrie->no_employeur)
            ->value('raison_sociale');
        // dd($mystate[0]);
        if ($mystate[0] == 'oui') {
            $state = 'yes';
            $sms = 'Dossier Validé avec succès';
            $content =
                'La CNSS tient a vous informez que vous etes eligible pour la biometriem et vous contactera dans les jours qui suivent.';
        } else {
            $state = 'no';
            $sms = 'Dossier rejeté avec succès';
            $content =
                "La CNSS tient a vous informez que vous n'etes pas eligible pour la biometrie, pour les raison suivantes: '" .
                $request->details .
                "'";
        }

        $bio = new BioDone();
        $bio->biometrie_id = $request->biometrie_id;
        $bio->user_id = session('loginId');
        $bio->details = $request->details;
        $bio->state = $state;
        $bio->save();

        $mail_data = [
            'name' => $raison_sociale,
            'content' => $content,
            'num' => $biometrie->no_dossier,
        ];

        Mail::to($biometrie->email)->send(new SendDetails($mail_data));

        Alert::success('ELIGIBILITE', $sms);
        return redirect(route('back'));
    }
}
