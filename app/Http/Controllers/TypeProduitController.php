<?php

namespace App\Http\Controllers;

use App\Models\TypeProduit;
use Illuminate\Http\Request;

class TypeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TypeProduit::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function indexView()
    {
       // $typeProduits=TypeProduit::all();

        return view('typeproduit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $typeProduit= new TypeProduit();
        $typeProduit->libelle= $request->libelle;
        $typeProduit->save();
        return $typeProduit;
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeProduit $typeProduit)
    {
        return $typeProduit;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeProduit $typeProduit)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeProduit $typeProduit)
    {

        $typeProduit->libelle = $request->libelle;
        $typeProduit->update();
        return $typeProduit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeProduit $typeProduit)
    {
        $typeProduit->delete();
    }
}
