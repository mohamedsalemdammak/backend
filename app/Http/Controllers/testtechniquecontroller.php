<?php

namespace App\Http\Controllers;

use App\Models\testtechnique;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class testtechniqueController extends Controller
{
    
    public function index()
    {try{
        $test=testtechnique::all();
        return response()->json(['status'=>true,'data'=>$test,200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la récupération des données : ' . $e->getMessage()],200);

    }}

    

  
    public function store(Request $request)
    {try{
        $request->validate([
           'testtechnique-score'=>'required',  
           
        ]);
        $test=new testtechnique();
        $test->score=strip_tags($request->input('testtechnique-score'));
      
        $test->save();

return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]);



    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()],200);

    }}

  
 
    
    public function update(Request $request,$id)
    {  try{   $request->validate([
        'testtechnique-score'=>'required', 
       ]);
       $to_update= testtechnique::findOrFail($id);
       $to_update->score=strip_tags($request->input('testtechnique-score'));
$to_update->save();

return response()->json(['status'=>true,'message'=>'Mise à jour avec succées',200]);



   }catch(QueryException $e){
    return response()->json(['status'=>false,'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()],200);

   }
    }
    
    public function destroy($id)
    {try{
        $to_delete=testtechnique::findOrFail($id);
        $to_delete->delete();

        return response()->json(['status'=>true,'message'=>'supprimer avec succées',200]);

    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()],200);

    }}
}
