<?php

namespace App\Http\Controllers;

use App\Models\recruteur;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class recruteurcontroller extends Controller
{
    
    public function index()
    {try{
       
        $recruteur=recruteur::all();
        return response()->json(['status'=>true,'data'=>$recruteur,200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'data'=>$recruteur,200]);

    }}

    
 

  
    public function store(Request $request)
    {try{
        $request->validate([
            'recruteur-login'=>'required',
            'recruteur-telephone'=>'required',
            'recruteur-email'=>'required',
            'recruteur-password'=>'required',
          


        ]);
        $recruteur=new recruteur();
        $recruteur->login=strip_tags($request->input('recruteur-login'));
        $recruteur->telephone=strip_tags($request->input('recruteur-telephone'));
        $recruteur->email=strip_tags($request->input('recruteur-email'));
        $recruteur->password=strip_tags($request->input('recruteur-password'));
       
$recruteur->save();

return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]);



    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()],200);

    }}

  


 

    public function update(Request $request,$recruteur)
    {try{
        $request->validate([
            'recruteur-login'=>'required',
            'recruteur-telephone'=>'required',
            'recruteur-email'=>'required',
            'recruteur-password'=>'required',

        ]);
        $to_update= recruteur::findOrFail($recruteur);
        $to_update->login=strip_tags($request->input('recruteur-login'));
        $to_update->telephone=strip_tags($request->input('recruteur-telephone'));
        $to_update->email=strip_tags($request->input('recruteur-email'));
        $to_update->password=strip_tags($request->input('recruteur-password'));
$to_update->save();
return response()->json(['status'=>true,'message'=>'update avec succées',200]);


    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()],200);

    }}

    
    public function destroy($id)
    {try{
        $to_delete=recruteur::findOrFail($id);
        $to_delete->delete();
        return response()->json(['status'=>true,'message'=>'supprimer avec succées'],200);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()],200);

    }}
}
