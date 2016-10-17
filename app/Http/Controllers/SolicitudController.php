<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Solicitude;
use App\Models\User;
use Laracasts\Flash\Flash;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitude::orderBy('fechaNacimiento','ASC')->paginate(10);
        return view('dashboard.admin.solicitud.index', compact('solicitudes'));
    }

     public function indexroot()
    {
        $solicitudes = Solicitude::orderBy('fechaNacimiento','ASC')->paginate(10);
        return view('dashboard.root.solicitud.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $solicitud = Solicitude::find($id);

        User::create([
                'id' => $solicitud['id'],
                'nombre' => $solicitud['nombre'],
                'apellido' => $solicitud['apellido'],
                'email'=> $solicitud['email'],
                'tipoDocumento' => $solicitud['tipoDocumento'],
                'fechaNacimiento' => $solicitud['fechaNacimiento'],
                'active' => 1,
                'password'=> bcrypt($solicitud['password']),
                'genero' => $solicitud['genero'],
                'telefono' => $solicitud['telefono'],
                'grupo_codigoGrupo' => $solicitud['grupo_codigoGrupo'],
                'institucion_codigoInstitucion' => $solicitud['institucion_codigoInstitucion'],
                'tipoUsuario_codigoTipoUsuario' => $solicitud['tipoUsuario_codigoTipoUsuario'],
        ]);

        $solicitud->delete();
        Flash::error('La solicitud ' . $solicitud->id . 'se ha aprobado de forma exitosa!');

        return redirect()->route('admin.solicitudes.index');
    }

    public function createbyroot($id)
    {
        $solicitud = Solicitude::find($id);

        User::create([
                'id' => $solicitud['id'],
                'nombre' => $solicitud['nombre'],
                'apellido' => $solicitud['apellido'],
                'email'=> $solicitud['email'],
                'tipoDocumento' => $solicitud['tipoDocumento'],
                'fechaNacimiento' => $solicitud['fechaNacimiento'],
                'active' => 1,
                'password'=> bcrypt($solicitud['password']),
                'genero' => $solicitud['genero'],
                'telefono' => $solicitud['telefono'],
                'grupo_codigoGrupo' => $solicitud['grupo_codigoGrupo'],
                'institucion_codigoInstitucion' => $solicitud['institucion_codigoInstitucion'],
                'tipoUsuario_codigoTipoUsuario' => $solicitud['tipoUsuario_codigoTipoUsuario'],
        ]);

        $solicitud->delete();
        Flash::error('La solicitud ' . $solicitud->id . 'se ha aprobado de forma exitosa!');

        return redirect()->route('root.solicitudes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = Solicitude::find($id);
        $solicitud->delete();
        Flash::error('La solicitud ' . $user->name . 'ha sido borrada de forma exitosa!');
        return redirect()->route('admin.solicitudes.index');
    }

    public function destroybyroot($id)
    {
        $solicitud = Solicitude::find($id);
        $solicitud->delete();
        Flash::error('La solicitud ' . $user->name . 'ha sido borrada de forma exitosa!');
        return redirect()->route('root.solicitudes.indexroot');
    }
}
