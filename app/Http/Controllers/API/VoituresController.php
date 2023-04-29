<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\Voitures;
class VoituresController extends Controller
{
    //getVoitures
   public function getVoitures(){
    return response()->json(Voitures::all(),200);
   }
    //getVoituresById 
    public function getVoituresById ($id){
        $voitures=Voitures::find($id);
        if(is_null($voitures)){
            response()->json(['message'=>'voitures introuvable'],404);
        }
        return response()->json(
            [ 'name' => $voitures->name,
            'owner' => $voitures->owner,
            'kilometrage' => $voitures->kilometrage,
            'year' => $voitures->year,
            'phone_number' => $voitures->phone_number,
            'image' => url('/storage/images/'.$voitures->image),
            'phone_number' => $voitures->quantity,
            'category' => $voitures->category,
        ]);
       }
         //add Voitures
    public function addVoitures(Request $request){
        $voitures=Voitures::create($request->all());
       
        return response()->json($voitures,201);
       }
       //updateVoitures
       public function updateVoitures(Request $request,$id){
        $voitures=Voitures::find($id);
        if(is_null($voitures)){
            response()->json(['message'=>'produit introuvable'],404);
        }
        $voitures->update($request->all());
        return response()->json($voitres,200);
       }
           //deleteVoitures
           public function deleteVoitures(Request $request,$id){
            $voitures=Voitures::find($id);
            if(is_null($voitures)){
                response()->json(['message'=>'voitures introuvable'],404);
            }
            $voitres->delete();
            return response()->json(['message'=>'le voitures  est  supprimer'],204);
           }
}