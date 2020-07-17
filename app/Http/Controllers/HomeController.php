<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use App\Demande;
use File;
use Auth;
use Session;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        // Get annonces
        $annonces = Annonce::where('user_id',Auth::user()->id)->get();
        $demandes = Demande::where('user_id',Auth::user()->id)->get();

        return view('home',['annonces'=>$annonces,'demandes'=>$demandes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AnnonceResource|null
     */

    public function demmandeStore(Request $request)
    {
        $demande = $request->isMethod('put') ? Demande::findOrFail($request->demande_id) : new Demande;



        $demande->bdgesmax = $request->input('bdgesmax');
        $demande->commentaire = $request->input('commentaire');
        $demande->cordonnees = $request->input('cordonnees');
        $demande->user_id = Auth::user()->id;


        $demande->save();
        $request->session()->flash('Success', "Ajout Avec Success");
        return back();

    }

    public function annonceStore(Request $request)
    {

        $annonce = $request->isMethod('put') ? Annonce::find(Request("id")) : new Annonce;


        $annonce->capacity = $request->input('capacity');
        $annonce->address = $request->input('address');
        $annonce->details = $request->input('details');

        if($request->hasFile('images1'))
        {

            if(File::exists(public_path("importedImages"). '\\' .$annonce->images1))
            {
                File::delete(public_path("importedImages"). '\\' .$annonce->images1);
            }
            $originalName = $request->images1->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $i = 1;
            $slug = $imageName = time().session_id().\Str::random(10);
            $logo = $slug .'.'.$extension;
            while (File::exists(public_path("importedImages").'\\' . $logo)){
                $slug = $slug. '_' . $i++ ;
                $logo = $slug.'.' . $extension;
            }
            $lien = "assets/img/formations/";
            $request->images1->move(public_path("importedImages").'\\',$logo);
            $annonce->images1=$logo;
        }


        if($request->hasFile('images2'))
        {

            if($request->images2!='' && File::exists(public_path("importedImages"). '\\' .$annonce->images2))
            {
                File::delete(public_path("importedImages"). '\\' .$annonce->images2);
            }
            $originalName = $request->images2->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $i = 1;
            $slug = $imageName = time().session_id().\Str::random(10);
            $logo = $slug .'.'.$extension;
            while (File::exists(public_path("importedImages").'\\' . $logo)){
                $slug = $slug. '_' . $i++ ;
                $logo = $slug.'.' . $extension;
            }
            $lien = "assets/img/formations/";
            $request->images2->move(public_path("importedImages").'\\',$logo);
            $annonce->images2=$logo;
        }

        if($request->hasFile('images3'))
        {
            if($request->images3!='' && File::exists(public_path("importedImages"). '\\' .$annonce->images3))
            {
                File::delete(public_path("importedImages"). '\\' .$annonce->images3);
            }
            $originalName = $request->images3->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $i = 1;
            $slug = $imageName = time().session_id().\Str::random(10);
            $logo = $slug .'.'.$extension;
            while (File::exists(public_path("importedImages").'\\' . $logo)){
                $slug = $slug. '_' . $i++ ;
                $logo = $slug.'.' . $extension;
            }
            $lien = "assets/img/formations/";
            $request->images3->move(public_path("importedImages").'\\',$logo);
            $annonce->images3=$logo;
        }




        $annonce->position = $request->input('Latitude').','.$request->input('Longtitude');
        $annonce->prix = $request->input('prix');
        $annonce->rate = "0";
        $annonce->stat = "";
        $annonce->superfice = $request->input('superfice');
        $annonce->user_id = Auth::user()->id;

        $annonce->save();
        $request->session()->flash('Success', "Ajout Avec Success");
        return back();

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return AnnonceResource|null
     */
    public function annonceDestroy($id)
    {
        // Get annonce
        $annonce = Annonce::find($id);
        if(Auth::user()->id != $annonce->user_id)
        {
            Session::session()->flash('Failure', "Suppression n'as pas bien passé");
            return back();
        }
        if ($annonce->delete()) {
            Session::flash('Success', "Suppression Avec Success");
            return back();
        }
        Session::session()->flash('Failure', "Suppression n'as pas bien passé");
        return back();

    }
    public function demmandeDestroy($id)
    {
        // Get annonce
        $annonce = Demande::find($id);
        if(Auth::user()->id != $annonce->user_id)
        {
            Session::session()->flash('Failure', "Suppression n'as pas bien passé");
            return back();
        }
        if ($annonce->delete()) {
            Session::flash('Success', "Suppression Avec Success");
            return back();
        }
        Session::session()->flash('Failure', "Suppression n'as pas bien passé");
        return back();

    }


    protected function profilShow(Request $request)
    {
        return view('profile');
    }

    protected function profilSave(Request $request)
    {

        $user= User::where('id',Auth::user()->id)->get();



        $user=$user->first();
        $user->telephone=$request->telephone;
        $user->username=$request->username;
        $user->name=$request->name;
        $user->save();
        return back();





    }
}
