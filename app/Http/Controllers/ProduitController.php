<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\TypeProduit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{



    public function create()
    {
        $typeProduit=TypeProduit::all();
        $fournisseurs= Fournisseur::all();
        return view('Produits.produit-add',['types'=>$typeProduit,'fournisseurs'=>$fournisseurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $products=Produit::all();
        $typeProduit=TypeProduit::all();

        return view('produit',['produits'=>$products,'type'=>$typeProduit]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make ($request->all(),[
            'libelle' => 'required|max:255',
            'description' => 'nullable|email|unique:fournisseurs',
            'image' => 'required|max:255',
            'quantite'=>'required|integer',
            'quantiteMin'=>'required|integer',
            'type'=>'required|int',
            'fournisseur'
        ]);

        if ($validated->fails()){
            return view('Fournisseurs.fournisseur-add')
                ->withErrors($validated)
                ->withInput();
        }

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
