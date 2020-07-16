<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DemandeResource;
use App\Demande;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get demandes
        $demandes = Demande::paginate(15);

        // Return collection of demandes as a resource
        return DemandeResource::collection($demandes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return DemandeResource|null
     */
    public function store(Request $request)
    {
        $demande = $request->isMethod('put') ? Demande::findOrFail($request->demande_id) : new Demande;



        $demande->bdgesmax = $request->input('bdgesmax');
        $demande->commentaire = $request->input('commentaire');
        $demande->cordonnees = $request->input('cordonnees');
        $demande->user_id = $request->input('user_id');


        $demande->save();
        return new DemandeResource($demande);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return DemandeResource
     */
    public function show($id)
    {
        // Get demande
        $demande = Demande::where('id',$id)->get();

        // Return single demande as a resource
        if($demande->count()==1)
        {
            return new DemandeResource($demande->first());
        }

        return "{data:[]}";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return DemandeResource|null
     */
    public function destroy($id)
    {
        // Get demande
        $demande = Demande::findOrFail($id);

        if ($demande->delete()) {
            return new DemandeResource($demande);
        }

        return null;
    }
}
