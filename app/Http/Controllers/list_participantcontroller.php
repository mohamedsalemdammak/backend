<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;

use App\Models\list_participant;
use Illuminate\Http\Request;

class list_participantcontroller extends Controller
{
    
    public function index()
    {
        try{
            $listparticipant=list_participant::all();
            return response()->json(['status'=>true,'data'=>$listparticipant],200);
        }catch(QueryException $e){
            return response()->json(['status'=>false,'message'=>'Erreur lors de la récupération des données:'.$e->getMessage() ],200);
    
        }
    }

 
    public function store(Request $request)
    {
        try{
            $request->validate([
                'listparticipant-idoffre'=>'required',
                'listparticipant-idcandidat'=>'required',
                'listparticipant-etat'=>'required',
               
    
            ]);
            $listparticipant=new list_participant();
            $listparticipant->idoffre=strip_tags($request->input('listparticipant-idoffre'));
            $listparticipant->idcandidat=strip_tags($request->input('listparticipant-idcandidat'));
            $listparticipant->etat=strip_tags($request->input('listparticipant-etat'));
            
    $listparticipant->save();
    return response()->json(['status'=>true,'message'=>'insertuion avec succées'],200);
    
        }catch(QueryException $e){
            return response()->json(['status'=>false,'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()],200);
        
        }
    }



   

    public function update(Request $request,  $id)
    {
        try{
            $request->validate([
                'listparticipant-idoffre'=>'required',
                'listparticipant-idcandidat'=>'required',
                'listparticipant-etat'=>'required',
               
    
            ]);
            $to_update= list_participant::findOrFail($id);
            $to_update->idoffre=strip_tags($request->input('listparticipant-idoffre'));
    
            $to_update->idcandidat=strip_tags($request->input('listparticipant-idcandidat'));
            $to_update->etat=strip_tags($request->input('listparticipant-etat'));
            
    $to_update->save();
    return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]); 
        }catch(QueryException $e){
            return response()->json(['status'=>false,'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()],200); 
    
        }
    }

   
    public function destroy($id)
    {try{
        $to_delete=list_participant::findOrFail($id);
        $to_delete->delete();
        return response()->json(['status'=>true,'message'=>'supprimer avec succées',200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()],200);

    }}
}
