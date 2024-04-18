<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Database\QueryException;
use Spatie\LaravelIgnition\Recorders\QueryRecorder\QueryRecorder;

class questioncontroller extends Controller
{
    
    public function index()
    {try{
        $question=Question::all();
        return response()->json(['status'=>true,'data'=>$question],200);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la récupération des données : ' . $e->getMessage()],200);
  
    }}

    
  


    public function store(Request $request)
    {try{
        $request->validate([
            'question-question'=>'required',
            'question-score'=>'required',
           

        ]);
        $question=new Question();
        $question->question=strip_tags($request->input('question-question'));
        $question->score=strip_tags($request->input('question-score'));
        
$question->save();
return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]);

    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de l\'insertion : ' . $e->getMessage()],200);
    
    }}

   
     
    

  
    public function update(Request $request, $id)
    {try{
        $request->validate([
            'question-question'=>'required',
            'question-score'=>'required',
           

        ]);
        $to_update= Question::findOrFail($id);
        $to_update->question=strip_tags($request->input('question-question'));
        $to_update->score=strip_tags($request->input('question-score'));
        
$to_update->save();
return response()->json(['status'=>true,'message'=>'insertuion avec succées',200]); 
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()],200); 

    }}

    public function destroy($id)
    {try{
        $to_delete=Question::findOrFail($id);
        $to_delete->delete();
        return response()->json(['status'=>true,'message'=>'supprimer avec succées',200]);
    }catch(QueryException $e){
        return response()->json(['status'=>false,'message' => 'Erreur lors de la suppression : ' . $e->getMessage()],200);

    }}
}
