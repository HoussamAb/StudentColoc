<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use App\Demande;
use File;
use Auth;
use Session;

class guestController extends Controller
{

    public function home()
    {
     return view();   
    }

    public function index()
    {
        // Get annonces
        $annonces = Annonce::all();
        $demandes = Demande::all();
        
        return view('welcome',['annonces'=>$annonces,'demandes'=>$demandes]);
    }

    public function annonceShow($id)
    {
    
        $annonce = Annonce::where('id',$id)->get();

        if($annonce->count()==1)
        {
            return view('annonce',['annonce'=>$annonce->first()]);
        }
        
        return back();
    }


    public function demmandeShow($id)
    {
    
        $annonce = Demande::where('id',$id)->get();

        if($annonce->count()==1)
        {
            return view('demande',['annonce'=>$annonce->first()]);
        }
        
        return back();
    }
    
    
}
