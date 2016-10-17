<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TipoUsuario;
use App\Models\Institucion;
use Laracasts\Flash\Flash;
use Illuminate\Contracts\Auth\Guard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch(\Auth::user()->tipoUsuario_codigoTipoUsuario)
        {
            case '0':
                #Root
                $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
                $Instituciones= Institucion::lists('nombre','codigoInstitucion');
                return view('dashboard.root.desktop.profile',compact('tiposUsuario','Instituciones')); 
                break;

            case '1':
                #Administrador
                $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
                $Instituciones= Institucion::lists('nombre','codigoInstitucion');
                return view('dashboard.admin.desktop.profile',compact('tiposUsuario','Instituciones'));
                break;

            case '2':
                #Psicologo
                $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
                $Instituciones= Institucion::lists('nombre','codigoInstitucion');
                return view('dashboard.psychologist.desktop.profile',compact('tiposUsuario','Instituciones')); 
                break;

            case '3':
                #Estudiante
                $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
                $Instituciones= Institucion::lists('nombre','codigoInstitucion');
                return view('dashboard.student.desktop.profile',compact('tiposUsuario','Instituciones')); 
                break;

            default:
                return redirect('auth/login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function profileadmin()
    {
        $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.admin.desktop.profile',compact('tiposUsuario','Instituciones')); 
    }

    public function adminupdateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning('El usuario ' . $user->name . 'ha sido editado con exito!');
        return redirect()->route('admin.profile');
    }

    public function profileroot()
    {
        $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.root.desktop.profile',compact('tiposUsuario','Instituciones')); 
    }

    public function rootupdateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning('El usuario ' . $user->name . 'ha sido editado con exito!');
        return redirect()->route('root.profile');
    }

    public function profilepsychologist()
    {
        $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.psychologist.desktop.profile',compact('tiposUsuario','Instituciones')); 
    }

    public function psychologistupdateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning('El usuario ' . $user->name . 'ha sido editado con exito!');
        return redirect()->route('psychologist.profile');
    }

    public function profilestudent()
    {
        $tiposUsuario = TipoUsuario::lists('nombre','codigoTipoUsuario');
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.student.desktop.profile',compact('tiposUsuario','Instituciones')); 
    }

    public function studentupdateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning('El usuario ' . $user->name . 'ha sido editado con exito!');
        return redirect()->route('student.profile');
    }
}
