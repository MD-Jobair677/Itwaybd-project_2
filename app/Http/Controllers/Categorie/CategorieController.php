<?php

namespace App\Http\Controllers\Categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{


    // add Categorie
    function index(){   
       

        return view('frontend.contant.add_categorie');
    }

    // store Categorie

    function storeCategorie(Request $request ){

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

        return back()->with('success','Categorie Added successfylly');
    }









    // show all categorie

    function showCategorie(){

        $allCategories = Categorie::paginate(10);

        return view('frontend.contant.show_all_categorie',compact('allCategories'));
    }


    // edite categorie

    function editeCategory($id){

        $Categorie = Categorie::where('id',$id)->first();

        return view('frontend.contant.edite_categorie',compact('Categorie'));
    }



    // update Categorie

    function updateCategory(  Request $request ,$id){

        $request->validate([

            'categorie_name'=>'required|max:30',
        ]);


        $Categorie = Categorie::find($id);

        $Categorie->name = $request->categorie_name;

       

        $count=Categorie::where('slug','Like','%'.str($request->categorie_name)->slug().'%')->count();

        if($count>0){
            $count++;
            $Categorie->slug = str($request->categorie_name)->slug().'_'.$count ;

           
    
        }else{
            $Categorie->slug = str($request->categorie_name)->slug();

          
        }


        $Categorie->save();

        return back()->with('success','Categorie update successfylly');





    }

    // delete categorie

    function deleteCategory($id){
        Categorie::find($id)->delete();
       
        return back();
    }









}
