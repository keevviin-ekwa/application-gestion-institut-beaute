<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use http\Encoding\Stream\Enbrotli;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Emphasis;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of employe.
     */
    public function indexEmployes()
    {
        $role=Role::where('libelle','Employe')->first();

        $employe= User::where('role_id',$role->id)->get();

        return view('Utilisateurs.employe',['employes'=>$employe]);
    }

    /**
     * Display a listing of clients.
     */
    public function indexClients()
    {
        $role=Role::where('libelle','Client')->first();
        $clients= User::where('role_id',$role->id)->get();
        return view('Utilisateurs.client',['clients'=>$clients]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
        return view('Utilisateurs.employe-add',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $employe= new User();
        $employe->nom=$request->nom;
        $employe->prenom=$request->prenom;
        //$employe->address=$request->address;
        $employe->role_id=$request->role;
        $employe->telehpone=$request->tel;
        $employe->email=$request->email;
        $employe->password= bcrypt("test");
        $employe->save();
        $role=Role::find($request->role);
        if(strtoupper($role->libelle)==="EMPLOYE"){
            return redirect('admin/utilisateurs/employes')->with('success','Employe crée avec succès');
        }
        return redirect('admin/utilisateurs/clients')->with('success','Client crée avec succès');

    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('Utilisateurs.show-user',['data'=>$user]);
    }

    /**
     * Display the specified resource.
     */
    public function showClient(User $client)
    {
        return view('Utilisateurs.client-detail',['data'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user= User::find($id);
        $roles= Role::all();
        return view('Utilisateurs.user-edit',['data'=>$user,'roles'=>$roles]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
//        $validated = $request->validate([
//            'nom' => 'required|max:255',
//            'prenom' => 'nullable',
//            'address' => 'required|max:255',
//            'password' => 'required',
//        ]);
//
//        if ($validated->fails()){
//            return view('utilisateurs.client-add')
//                ->withErrors($validated)
//                ->withInput();
//        }


        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->address=$request->address;
        $user->telehpone=$request->tel;
        $user->role_id= $request->role;
        $user->update();
        $role=Role::find($request->role);
        if(strtoupper($role->libelle)==="EMPLOYE"){
            return redirect('admin/utilisateurs/employes')->with('success','Employé Modifié avec succès');
        }
        return redirect('admin/utilisateurs/clients')->with('success','Client Modifié avec succès');

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEmploye(Request $request, User $employe)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'nullable',
            'address' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validated->fails()){
            return view('utilisateurs.employe-add')
                ->withErrors($validated)
                ->withInput();
        }


        $employe->nom=$request->nom;
        $employe->prenom=$request->prenom;
        $employe->address=$request->address;
        $employe->password= bcrypt($request->password);
        $employe->update();
        return  redirect('admin/utilisateurs/employes')->with('success','Employes modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
