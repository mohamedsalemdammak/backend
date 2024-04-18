<?php

namespace App\Http\Controllers;

use App\Models\certificat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class certificatcontroller extends Controller
{
   
    public function index()
    {try{
        $certificat =certificat::all();
        return response()->json(['status'=>true,'data'=>$certificat,200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la récupération des données : ' . $e->getMessage()],200);

    }}

  
 
    public function store(Request $request)
    {try{
        $request->validate([
          
             'certificat-titre'=>'required',
           
             'certificat-certficat'=>'required',
             'certificat-date_attestation'=>'required|Date',

         ]);
         $certificat=new certificat();
         $certificat->certificat=strip_tags($request->input('certificat-certificat'));
         $certificat->titre=strip_tags($request->input('certificat-titre'));
         $certificat->date_attestation=strip_tags($request->input('certificat-date_attestation')); 
         $certificat->save();
 
 return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]);
 
    }catch(QueryException $e){
        return response()->json(['status'=>false,'Erreur lors de l\'insertion : ' . $e->getMessage()],200);

    }}

   
   

    
    
    

  
    public function update(Request $request, $certificat)
    {try{
        $request->validate([
            'certificat-titre'=>'required',
           
            'certificat-certficat'=>'required',
            'certificat-date_attestation'=>'required',
        ]);
        $to_update= certificat::findOrFail($certificat);
        $to_update->certificat=strip_tags($request->input('certificat-certificat'));
         $to_update->titre=strip_tags($request->input('certificat-titre'));
       $to_update->date_attestation=strip_tags($request->input('certificat-date_attestation'));
 $to_update->save();
 
 return response()->json(['status'=>true,'message'=>'update avec succées',200]); 
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()],200); 

    }}

  
    public function destroy($id)
    {try{
        $to_delete=certificat::findOrFail($id);
        $to_delete->delete();
        return response()->json(['status'=>true,'message'=>'supprimer avec succées',200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()],200);

    }}
}
