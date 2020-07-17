<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\AnnonceResource;
use App\Annonce;
use File;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     /*
    public function index()
    {
        // Get annonces
        $annonces = Annonce::paginate(15);

        // Return collection of annonces as a resource
        return AnnonceResource::collection($annonces);
    }*/
    public function  index(){
        $annonces = Annonce::all();
        return "{data:$annonces}";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AnnonceResource|null
     */
    public function store(Request $request)
    {

        $annonce = $request->isMethod('put') ? Annonce::find(Request("id")) : new Annonce;
        $annonce->capacity = $request->input('capacity');
        $annonce->address = $request->input('address');
        $annonce->details = $request->input('details');
        $annonce->title = $request->input('title');
        $annonce->images1 = $request->input('images1');
        $annonce->images2 = $request->input('images2');
        $annonce->images3 = $request->input('images3');

        /* if($request->has('images1'))
         {
             if(File::exists(public_path("importedImages"). '\\' .$annonce->images1))
             {
                 File::delete(public_path("importedImages"). '\\' .$annonce->images1);
             }
             $image = $request->images1;  // your base64 encoded
             $image = str_replace('data:image/png;base64,', '', $image);
             $image = str_replace(' ', '+', $image);
             $imageName = time().session_id().\Str::random(10).'.'.'png';
             File::put(public_path("importedImages"). '\\' . $imageName, base64_decode($image));
             $annonce->images1=$imageName;

            $annonce->$request->images1;
        }*/

        /* if($request->has('images2'))
         {
             if($request->images2!='' && File::exists(public_path("importedImages"). '\\' .$annonce->images2))
             {
                 File::delete(public_path("importedImages"). '\\' .$annonce->images2);
             }
             $image = $request->images2;  // your base64 encoded
             $image = str_replace('data:image/png;base64,', '', $image);
             $image = str_replace(' ', '+', $image);
             $imageName = time().session_id().\Str::random(10).'.'.'png';
             File::put(public_path("importedImages"). '\\' . $imageName, base64_decode($image));
             $annonce->images2=$imageName;

            $annonce->$request->images2;

        }*/

        /*if($request->has('images3'))
        {
            if($request->images3!='' && File::exists(public_path("importedImages"). '\\' .$annonce->images3))
            {
                File::delete(public_path("importedImages"). '\\' .$annonce->images3);
            }
            $image = $request->images3;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time().session_id().\Str::random(10).'.'.'png';
            File::put(public_path("importedImages"). '\\' . $imageName, base64_decode($image));
            $annonce->images3=$imageName;
            $annonce->$request->images3;
        }*/




        $annonce->position = $request->input('position');
        $annonce->prix = $request->input('prix');
        $annonce->rate = $request->input('rate');
        $annonce->stat = $request->input('stat');
        $annonce->superfice = $request->input('superfice');
        $annonce->user_id = $request->input('user_id');

        $annonce->save();
            return new AnnonceResource($annonce);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return AnnonceResource
     */
    public function show($id)
    {
        // Get annonce
        $annonce = Annonce::where('id',$id)->get();

        if($annonce->count()==1)
        {
            return new AnnonceResource($annonce->first());
        }

        return "{data:[]}";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return AnnonceResource|null
     */
    public function destroy($id)
    {
        // Get annonce
        $annonce = Annonce::findOrFail($id);

        if ($annonce->delete()) {
            return new AnnonceResource($annonce);
        }

        return null;
    }
}
