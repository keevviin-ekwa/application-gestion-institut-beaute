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
        $product_data= array_values(json_decode(json_encode($products),true));
        $typeProduit=TypeProduit::all();
        $data=array_values(json_decode(json_encode($typeProduit),true));

        return view('Produits.produit',['produits'=>$product_data,'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**$validated = Validator::make ($request->all(),[

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
         **/

        $produit= new Produit();
        $produit->libelle=$request->libelle;
        $produit->description=$request->description;
        $produit->quantite=$request->quantite;
        $produit->quantiteMin=$request->quantitemin;
        $produit->prix=$request->prix;
        $produit->type_produit_id=$request->type;
        $produit->fournisseur_id=$request->fournisseur;


        $produit->save();
        return redirect('admin/produits')->with('success','produit cree avec succes');
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
    public function edit($id)
    {
        $produit= Produit::find($id);
        $typeProduit=TypeProduit::all();
        $fournisseurs= Fournisseur::all();
        return view('Produits.produit-edit',['produit'=>$produit,'types'=>$typeProduit,'fournisseurs'=>$fournisseurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $produit= Produit::find($id);
        $produit->libelle=$request->libelle;
        $produit->description=$request->description;
        $produit->quantiteMin=$request->quantitemin;
        $produit->type_produit_id= $request->type;
        $produit->prix= $request->prix;
        $produit->fournisseur_id=$request->fournisseur;
        $produit->quantite=$request->quantite;
        $produit->update();
        return redirect('admin/produits')->with('sucsess','Produit modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit=Produit::find($id);
        $produit->delete();
        return redirect('Produits.produit')->with('Danger','Produit supprimé avec succès');

    }
}
