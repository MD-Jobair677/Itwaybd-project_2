<?php

namespace App\Http\Controllers\Api;

use App\Console\Commands\Category;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
        // store Categorie

        public function store(Request $request)
        {
            $request->validate([
    
                'categorie_name'=>'required|max:30',
            ]);
    
    
            $Categorie = new Categorie;
    
            $Categorie->name = $request->categorie_name;
    
           
    
            $count=Categorie::where('slug','Like','%'.str($request->categorie_name)->slug().'%')->count();
    
            if($count>0){
                $count++;
                $Categorie->slug = str($request->categorie_name)->slug().'_'.$count ;
    
               
        
            }else{
                $Categorie->slug = str($request->categorie_name)->slug();
    
              
            }
    
    
            $Categorie->save();
    
            return response()->json([
                'status'=>'success',
                'data' => $Categorie,
            ],201);


          






        }


}
