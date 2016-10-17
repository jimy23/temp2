<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Institucion;
use App\Models\Solicitude;
use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{

    use AuthenticatesAndRegistersUsers;

    public function index()
    {
        $users = User::where('active',1)->orderBy('id','ASC')->paginate(8);
        $instituciones = Institucion::lists('nombre','codigoInstitucion');
        $tipousuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        return view('dashboard.admin.users.index',compact('users','instituciones','tipousuario'));
    }

    public function viewusers()
    {
        $users = User::where('active',1)->orderBy('id','ASC')->paginate(8);
        $instituciones = Institucion::lists('nombre','codigoInstitucion');
        $tipousuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        return view('dashboard.psychologist.users.index',compact('users','instituciones','tipousuario'));
    }

    public function viewusersroot()
    {
        $users = User::where('active',1)->orderBy('id','ASC')->paginate(8);
        $instituciones = Institucion::lists('nombre','codigoInstitucion');
        $tipousuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        return view('dashboard.root.users.index',compact('users','instituciones','tipousuario'));
    }


    public function register($request)
    {
        dd($register);
    }

    public function create()
    {
        $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        $grupos = Grupo::all();
        return view('dashboard.admin.users.create',compact('tiposUsuario','Instituciones','grupos'));    
    }

    public function getGrupos(Request $request, $codigoInstitucion)
    {
        if ($request->ajax()) {
            $grupos = Grupo::grupos($codigoInstitucion);
            return response()->json($grupos);
        }
    }


    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['tipoUsuario_codigoTipoUsuario'] == 1){
            Solicitude::create([
                'id' => $data['id'],
                'nombre' => $data['name'],
                'apellido' => $data['apellido'],
                'email'=> $data['email'],
                'tipoDocumento' => $data['tipoDocumento'],
                'fechaNacimiento' => $data['fechaNacimiento'],
                'active' => 0,
                'password'=> bcrypt($data['password']),
                'genero' => $data['genero'],
                'telefono' => $data['telefono'],
                'grupo_codigoGrupo' => $data['grupo_codigoGrupo'],
                'institucion_codigoInstitucion' => $data['institucion_codigoInstitucion'],
                'tipoUsuario_codigoTipoUsuario' => $data['tipoUsuario_codigoTipoUsuario'],
            ]);
        }
        else{
            User::create([
                'id' => $data['id'],
                'nombre' => $data['name'],
                'apellido' => $data['apellido'],
                'email'=> $data['email'],
                'tipoDocumento' => $data['tipoDocumento'],
                'fechaNacimiento' => $data['fechaNacimiento'],
                'active' => 1,
                'password'=> bcrypt($data['password']),
                'genero' => $data['genero'],
                'telefono' => $data['telefono'],
                'grupo_codigoGrupo' => $data['grupo_codigoGrupo'],
                'institucion_codigoInstitucion' => $data['institucion_codigoInstitucion'],
                'tipoUsuario_codigoTipoUsuario' => $data['tipoUsuario_codigoTipoUsuario'],
            ]);
        }

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        $grupos = Grupo::lists('codigoGrupo');
        return view('dashboard.admin.users.edit',compact('user','Instituciones','tiposUsuario','grupos'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning('El usuario ' . $user->name . 'ha sido editado con exito!');
        return redirect()->route('admin.users.index');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::error('El usuario ' . $user->name . 'ha sido borrado de forma exitosa!');
        return redirect()->route('admin.users.index');
    }
}
