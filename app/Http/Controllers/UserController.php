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
        return view('Utilisateurs.client');
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
        if(strtoupper($role->name)=="EMPLOYE"){
            return redirect('admin/utilisateurs/employes')->with('success','Employe crée avec succès');
        }
        return redirect('admin/utilisateurs/clients')->with('success','Employe crée avec succès');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeClient(Request $request)
    {


        $employe= new User();
        $employe->nom=$request->nom;
        $employe->prenom=$request->prenom;
        $employe->address=$request->address;
        $employe->password= bcrypt($request->password);
        $employe->save();
        return redirect('admin/utilisateurs/clients')->with('success','Client crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function showEmploye(User $employe)
    {
        return view('Utilisateurs.employe-detail',['data'=>$employe]);
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
    public function editEmploye(User $user)
    {
        return view('Utilisateurs.employe-add',['data'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editClient(User $user)
    {
        return view('Utilisateurs.client-add',['data'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateClient(Request $request, User $user)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'nullable',
            'address' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validated->fails()){
            return view('utilisateurs.client-add')
                ->withErrors($validated)
                ->withInput();
        }


        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->address=$request->address;
        $user->password= bcrypt($request->password);
        $user->update();
        return  redirect('admin/utilisateurs/clients')->with('success','client modifié avec succès');

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
