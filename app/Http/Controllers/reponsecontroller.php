<?php

namespace App\Http\Controllers;

use App\Models\reponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class reponsecontroller extends Controller
{
  
    public function index()
    {try{
        $reponse=reponse::all();
        return response()->json(['status'=>true,'data'=>$reponse,200]);
    }catch(QueryException $e){
        return response()->json(['status'=>true,'message' => 'Erreur lors de la récupération des données : ' . $e->getMessage()],200);

    }}

 
   
    public function store(Request $request)
    {try{
        $request->validate([
            'reponse-idquestion'=>'required',
            'reponse-reponse'=>'required',
            'reponse-etat'=>'required',
           

        ]);
        $reponse=new reponse();
        $reponse->idquestion=strip_tags($request->input('reponse-idquestion'));
        $reponse->reponse=strip_tags($request->input('reponse-reponse'));
        $reponse->etat=strip_tags($request->input('reponse-etat'));
        
$reponse->save();
return response()->json(['status'=>true,'message'=>'insertuion avec succées'],200);

    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()],200);
    
    }
        
    }

   
   

   
    public function update(Request $request,  $id)
    {try{
        $request->validate([
            'reponse-idquestion'=>'required',
            'reponse-reponse'=>'required',
            'reponse-etat'=>'required',
           

        ]);
        $to_update= reponse::findOrFail($id);
        $to_update->idquestion=strip_tags($request->input('question-idquestion'));

        $to_update->reponse=strip_tags($request->input('question-reponse'));
        $to_update->etat=strip_tags($request->input('question-etat'));
        
$to_update->save();
return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]); 
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()],200); 

    }
        
    }
    public function destroy($id)
    {try{
        $to_delete=reponse::findOrFail($id);
        $to_delete->delete();
        return response()->json(['status'=>true,'message'=>'supprimer avec succées',200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()],200);

    }}
}
