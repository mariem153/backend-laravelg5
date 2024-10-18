<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $scategories=Scategorie::with("categorie")->get();
        return response()->json($scategories);

        }catch(\Exception $e){
            return response()->json(["message"=> $e->getMessage()]);
        //throw $th; 
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $scategorie = new Scategorie(["nomscategorie"=>$request->input("nomscategories"),
            "imagescategorie"=>$request->input("imagescategorie"),
            "categorieID"=>$request->input("categorieID"),
        ]);
        $scategorie->save();
        return response()->json(["message"=> ""]);
        }catch (\Exception $e){
            return response()->json(["message"=> $e->getMessage()]);
            //throw$th; 
    }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $scatergorie=Scategorie::with("categorie")->findOrFail($id); 
            return response()->json($scatergorie);
        }catch (\Exception $e){
            return response()->json([$e->getMessage()]);
            //throw$th; 
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $scatergorie = Scategorie::findOrFail($id);
            $scatergorie->update($request->all());
            return response()->json($scatergorie);

        }catch (\Exception $e){
            return response()->json([$e->getMessage()]);
        //
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $scatergorie = Scategorie::findOrFail($id);
            $scatergorie->delete();
            return response()->json("scategorie supprimer avec succees");


        }catch (\Exception $e){
            return response()->json([$e->getMessage()]);
    }
    }
}
