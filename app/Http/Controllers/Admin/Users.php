<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Users extends Controller
{

    public function index()
    {
        return view('admin.users.index');
    }


    public function create()
    {
        $status = StatusUser::pluck('nombre', 'id');
        return view('admin.users.create',compact('status'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:users',
            'edad'            => 'required',
            'genero'          => 'required',
            'status_user_id'  => 'required',
        ]);

        $matri = User::all()->count();
        if($matri==""){
            $matricula= 1;
        }else{
            $matricula =  $matri + 1 ;
        }

        $user = new User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->edad=$request->edad;
        $user->genero=$request->genero;
        $user->status_user_id=$request->status_user_id;
        $user->slug=Str::slug($request->name);
        $user->matricula=date('Y').date('m').date('d'). $matricula;
        $user->password=Hash::make('123456');
        //Crea una nueva categoria
        $user->save();

        //Obtiene el id del Ususario regustrado
        $id_user = User::Where('matricula','=',$user->matricula)->first();
        $id=$id_user->id;

        //retorna y manda el parametro category
        return redirect()->route('admin.users.index')->with('info', $id);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }
}
