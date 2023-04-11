<?php

namespace App\Http\Controllers;

use App\Models\TypeSoin;
use Illuminate\Http\Request;

class TypeSoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TypeSoin::all();
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
        $validated = $request->validate([
            'libelle' => 'required|max:255',

        ]);


        $typeSoin= new TypeSoin();
        $typeSoin->libelle= $request->libelle;
        $typeSoin->save();
        return redirect('admin/soins')->with('success-type','Type de soin crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeSoin $typeSoin)
    {
        return $typeSoin;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeSoin $typeSoin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeSoin $typeSoin)
    {
        $typeSoin->libelle= $request->libelle;
        $typeSoin->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeSoin $typeSoin)
    {
        $typeSoin->delete();
    }
}
