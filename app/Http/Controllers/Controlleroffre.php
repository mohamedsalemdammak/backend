<?php

namespace App\Http\Controllers;

use App\Models\offre;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class Controlleroffre extends Controller
{
    
    public function index()
    {try{
        $offre=offre::all();
        return response()->json(['status'=>true,'offre'=>$offre],200);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message'=>'Erreur lors de la récupération des données:'.$e->getMessage() ],200);

    }

}


  
    public function store(Request $request)
    {try{
        $request->validate([
            'offre-titre'=>'required',  
            'offre-description'=>'required',
            'offre-lieu'=>'required',
            'offre-deadline'=>'required|Date',
            'offre-interval_salaire'=>'required',
            'offre-job_description'=>'required',
        ]);
        $offre=new offre();
        $offre->titre=strip_tags($request->input('offre-titre'));
        $offre->description=strip_tags($request->input('offre-description'));
        $offre->lieu=strip_tags($request->input('offre-lieu'));
        $offre->deadline=strip_tags($request->input('offre-deadline'));
        $offre->interval_salaire=strip_tags($request->input('offre-interval_salaire'));
        $offre->job_description=strip_tags($request->input('offre-job_description'));
        $offre->save();


return response()->json(['status'=>true,'message'=>'insertuion avec succées'],200);



    }catch(QueryException $e){
        return response()->json(['status'=>false,'message'=>'Erreur lors de la l\'insertion:'.$e->getMessage() ],200);

    }

  
}

 
 
    public function update(Request $request,$id)
    {
        try{
        $request->validate([
            'offre-titre'=>'required',
            'offre-description'=>'required',
            'offre-lieu'=>'required',
            'offre-deadline'=>'required',
            'offre-interval salaire'=>['required','float'],
            'offre-jobdescription'=>'required',
        ]);
        $to_update= offre::findOrFail($id);
        $to_update->titre=strip_tags($request->input('offre-titre'));
        $to_update->description=strip_tags($request->input('offre-description'));
        $to_update->lieu=strip_tags($request->input('offre-lieu'));
        $to_update->deadline=strip_tags($request->input('offre-deadline'));
        $to_update->intervalsalaire=strip_tags($request->input('offre-interval_salaire'));
        $to_update->jobdescription=strip_tags($request->input('offre-job_description'));
$to_update->save();
    
return response()->json(['status'=>true,'message'=>'update avec succées',200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message'=>'Erreur lors de la mise à jour:'.$e->getMessage()   ],200);

    }


    }

    
    public function destroy($id)
    {try{
        $to_delete=offre::findOrFail($id);
        $to_delete->delete();
        return response()->json(['status'=>true,'message'=>'supprimer avec succées',200]);

    }catch(QueryException $e){
        return response()->json(['status'=>false,'message'=>'Erreur lors de la suppression:'.$e->getMessage() ],200);

    }
}
}