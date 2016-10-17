<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class GrupoController extends Controller
{

    use AuthenticatesAndRegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::orderBy('codigoGrupo','ASC')->paginate(10);
        $instituciones = Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.admin.groups.index',compact('instituciones','grupos'));
    }

    public function viewgroups()
    {
        $grupos = Grupo::orderBy('codigoGrupo','ASC')->paginate(10);
        $instituciones = Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.psychologist.groups.index',compact('instituciones','grupos'));
    }


    public function register()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.admin.groups.create',compact('Instituciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'codigoGrupo' => ['required','unique:grupo'],
            'clasificacion' => ['required', 'max:45'],
            'jornada' => ['required', 'max: 45'],
            'grado' => ['required', 'max:11', 'min:1'],
            'institucion_codigoInstitucion' => ['required']
        ]);

        $data = $request->all();

        Grupo::create([
            'codigoGrupo' => $data['codigoGrupo'],
            'clasificacion' => $data['clasificacion'],
            'jornada' => $data['jornada'],
            'grado' => $data['grado'],
            'institucion_codigoInstitucion' => $data['institucion_codigoInstitucion'],
        ]);

        return redirect()->route('admin.groups.index');
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
        $grupo = Grupo::find($id);
        $Instituciones= Institucion::lists('nombre','codigoInstitucion');
        return view('dashboard.admin.groups.edit',compact('Instituciones','grupo'));
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
        $grupo = Grupo::find($id);
        $grupo->fill($request->all());
        $grupo->save();
        Flash::warning('El grupo ' . $grupo->codigoGrupo . ' ha sido editado con exito!');
        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        Flash::error('El grupo ' . $grupo->codigoGrupo . ' ha sido borrado de forma exitosa!');
        return redirect()->route('admin.groups.index');
    }
}
