<?php

namespace App\Http\Controllers;

use App\Models\Soin;
use Illuminate\Http\Request;

class SoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Soin::all();
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
        $soin= new Soin();
        $soin->save($request->all());
        return $request;
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
    public function edit(Soin $soin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soin $soin)
    {
        $soin->libelle= $request->libelle;
        $soin->description=$request->description;
        $soin->duree=$request->duree;
        $soin->cout=$request->cout;
        $soin->type_soin_id= $request->type_soin_id;
        $soin->update();
        return $soin;
    }

    /**
     * Remove the specified resource from storage.*/
    public function destroy(Soin $soin)
    {
        return $soin;
    }
}
