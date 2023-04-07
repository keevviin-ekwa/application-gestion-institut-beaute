<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Validator;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseurs=Fournisseur::all();
        return view('Fournisseurs.fournisseur');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fournisseurs.fournisseur-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = Validator::make ($request->all(),[
            'nom' => 'required|max:255',
            'email' => 'required|email|unique:fournisseurs',
            //'adresse' => 'required|max:255',
            'tel'=>'required|int'
        ]);

        if ($validated->fails()){
            return view('Fournisseurs.fournisseur-add')
                ->withErrors($validated)
                ->withInput();
        }

        $fournisseur= new Fournisseur();
        $fournisseur->nom=$request->nom;
        $fournisseur->tel=$request->tel;
        //$fournisseur->adresse=$request->adresse;
        $fournisseur->email=$request->email;
        $fournisseur->save();
        return redirect('admin/fournisseurs')->with('success','Fournisseur cree avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }
}
