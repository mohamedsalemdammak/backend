<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class candidatcontroller extends Controller
{
    
    public function index()
    {try{
        $condidat=Candidat::all();
        return response()->json(['status'=>true,'data'=>$condidat,200]);
        
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la récupération des données : ' . $e->getMessage()],200);
 
    }}

    
   
  
    public function store(Request $request)
    {try{
        $request->validate([
            'candidat-login'=>'required',
            'candidat-password'=>'required',
            'candidat-description'=>'required',
            'candidat-date_naissance'=>'required',
            'candidat-adresse'=>'required',
            'candidat-email'=>'required',
            'candidat-telephone'=>'required',
            'candidat-nom_prenom'=>'required',
            'candidat-cv'=>'required',



        ]);
        $candidat=new Candidat();
        $candidat->login=strip_tags($request->input('candidat-login'));
        $candidat->password=strip_tags($request->input('candidat-password'));
        $candidat->description=strip_tags($request->input('candidat-description'));
        $candidat->date_naissance=strip_tags($request->input('candidat-date_naissance'));
        $candidat->adresse=strip_tags($request->input('candidat-adresse'));
        $candidat->email=strip_tags($request->input('candidat-email'));
        $candidat->telephone=strip_tags($request->input('candidat-telephone'));
        $candidat->nom_prenom=strip_tags($request->input('candidat-nom_prenom'));
        $candidat->cv=strip_tags($request->input('candidat-cv'));

$candidat->save();

return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]);




    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()],200);

    }}

  


 
 
    public function update(Request $request, $id)
    {try{
        $request->validate([
            'candidat-login'=>'required',
            'candidat-password'=>'required',
            'candidat-description'=>'required',
            'candidat-date_naissance'=>'required',
            'candidat-adresse'=>'required',
            'candidat-email'=>'required',
            'candidat-telephone'=>'required',
            'candidat-nom_prenom'=>'required',
            'candidat-cv'=>'required',
        ]);
    
        $to_update = Candidat::findOrFail($id);
        $to_update->login = $request->input('candidat-login');
        $to_update->password = $request->input('candidat-password');
        $to_update->description = $request->input('candidat-description');
        $to_update->date_naissance = $request->input('candidat-date_naissance');
        $to_update->adresse = $request->input('candidat-adresse');
        $to_update->email = $request->input('candidat-email');
        $to_update->telephone = $request->input('candidat-telephone');
        $to_update->nom_prenom = $request->input('candidat-nom_prenom');
        $to_update->cv = $request->input('candidat-cv');
    
        $to_update->save();
    
        return response()->json(['status' => true, 'message' => 'Mise à jour avec succès'], 200);
    }catch(QueryException $e){
        return response()->json(['status' => false, 'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()], 200);

    }}
    

    
    public function destroy($id)
    {try{
        $to_delete=Candidat::findOrFail($id);
        $to_delete->delete();

        return response()->json(['status'=> true,'message' => 'Supprimé avec succès'], 200);
    }catch(QueryException $e){
        return response()->json(['status'=> false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()], 200);

    }}
}
