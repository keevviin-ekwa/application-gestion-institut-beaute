<?php

namespace App\Http\Controllers;

use App\Http\Resources\SoinResource;
use App\Http\Resources\TypeSoinResource;
use App\Models\Produit;
use App\Models\Soin;
use App\Models\TypeProduit;
use App\Models\TypeSoin;
use Illuminate\Http\Request;

class SoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $soins= SoinResource::collection(Soin::all());
        $data_soin=array_values(json_decode(json_encode($soins)));
        $typeSoin=TypeSoinResource::collection(TypeSoin::all());
        $data=array_values(json_decode(json_encode($typeSoin)));
        return view('Soins.soin',['soins'=>$data_soin,'types'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=TypeSoin::all();
        $produits=Produit::all();
        return view('Soins.soin-add',['types'=>$type,'produits'=>$produits]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     //   dd($request->all());
        $soin= new Soin();
        $soin->libelle=$request->libelle;
        $soin->description=$request->description;
        $soin->duree=$request->duree;
        $soin->cout=$request->cout;
        $soin->type_soin_id=$request->type;
        $soin->save();
        $soin->produits()->sync($request->produits);
        return redirect('admin/soins')->with('success','Soin cree avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Soin $soin)
    {
        return $soin;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $soin=Soin::find($id);
        $types=TypeSoin::all();
        $produits=Produit::all();
        return view('Soins.soin-edit',['edit'=>$soin,'types'=>$types,'produits'=>$produits]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soin $soin)
    {
        dd($soin);
        $soin->libelle= $request->libelle;
        $soin->description=$request->description;
        $soin->duree=$request->duree;
        $soin->cout=$request->cout;
        $soin->type_soin_id= $request->type;
        $soin->update();
        $soin->produits()->sync($request->produits);
        return redirect('admin/soins')->with('success','Soin Modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.*/
    public function destroy(Soin $soin)
    {
        return $soin;
    }
}
