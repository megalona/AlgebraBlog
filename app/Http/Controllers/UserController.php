<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     //prikazi sve usere i prebaci ioh na user index
    public function index()
    {
       $users = User::all();

       return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //prikazi formu za stvaranje novog usera
    public function create()
    {
       return view('users.create');
    }

  

     //spremi novokreiranog usera u bazu
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:191|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed'


        ]);
       $user = new User();
       $user->name = $request['name'];
       $user->email = $request['email'];
       $user->password = bcrypt($request['password']);
       $user->save();

       return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name je uspješno kreiran.");
    }

    //prikazi podatke o jednom useru
    public function show($id)
    {
       $user = User:: find($id);

       return view('users.show', compact('user'));
    }


        //prikazi formu za uređivanje usera
    public function edit($id)
    {
        $user = User:: find($id);

        return view('users.edit', compact('user'));
    }

  //spremi uređenog usera u bazu
  public function update(Request $request, $id)
  {
      // DZ - dohvatiti usera, validirati podatke iz forme, spremiti u bazu, vratiti flash poruku
      $request->validate([
          'name' => 'required|string|max:191|min:2',
          'email' => 'required|email|max:191|unique:users,email,'.$id //ignorriraj email sa id-jem tim
      ]);
      $user = User::find($id);
      $user->name = $request['name'];
      $user->email = $request['email'];

      if ($request['password']) {
         
          $request->validate([
              'password' => 'min:3'
          ]);

          $user->password = bcrypt($request['password']);
      }
      
      $user->save();
      return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name uspješno ažuriran.");
  
    }

  //obriši usera
    public function destroy($id)
    {
        $user = User:: find($id);
        $user->delete();

        return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name je uspješno obrisan");

    }
}
