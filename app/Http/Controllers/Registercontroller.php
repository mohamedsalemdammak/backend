<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\recruteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
class Registercontroller extends Controller
{
  
    public function storecandidat(Request $request)
    {
        $input = $request->all();

        Candidat::create([
         'login' => $input['candidat-login'],
         'email' => $input['candidat-email'],
         'description' => $input['candidat-description'],
         'adresse' => $input['candidat-adresse'],
         'telephone' => $input['candidat-telephone'],
         'nom_prenom' => $input['candidat-nom_prenom'],
         'cv' => $input['candidat-cv'],


         'password' =>Hash::make($input['candidat-password'])
       ]);
 
           return response()->json(['status' => true,
                                     'message' => "Registation Success"   
         
         ]);
     }
     public function storerecruteur(Request $request)
     {
         $input = $request->all();
 
         recruteur::create([
          'login' => $input['recruteur-login'],
          'email'=>$input['recruteur-email'],
          'telephone' => $input['recruteur-telephone'],
          'password' => Hash::make($input['recruteur-password'])
        ]);
  
            return response()->json(['status' => true,
                                      'message' => "Registation Success"   
          
          ]);
      }
    }




