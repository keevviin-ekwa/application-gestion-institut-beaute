<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produit::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit= new Produit();
        $produit->save($request->all());
        return $produit;
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return $produit;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $produit->libelle=$request->libelle;
        $produit->desciprtion=$request->description;
        $produit->quantiteMin=$request->quantiteMin;
        $produit->type_produit_id= $request->type_prduit_id;
        $produit->prix= $request->prix;
        $produit->quantite=$request->quantite;
        $produit->update();
        return $produit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

    }
}
