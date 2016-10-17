<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstitucionRequest;
use Laracasts\Flash\Flash;

class InstitucionController extends Controller
{

    use AuthenticatesAndRegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = Institucion::orderBy('codigoInstitucion','ASC')->paginate(10);
        return view('dashboard.admin.institutions.index', compact('instituciones'));
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
        return view('dashboard.admin.institutions.create');
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
            'codigoInstitucion' => ['required','unique:institucion'],
            'nombre' => ['required', 'max:45'],
            'direccion' => ['required', 'max: 45'],
            'telefono' => ['required', 'size:7'],
            'sitioWeb' => ['required', 'active_url'],
            'ciudad' => ['required', 'max:45']
        ]);

        $data = $request->all();

        Institucion::create([
            'codigoInstitucion' => $data['codigoInstitucion'],
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'sitioWeb' => $data['sitioWeb'],
            'ciudad' => $data['ciudad'],
        ]);

        return redirect()->route('admin.institutions.index');
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
        $institucion = Institucion::find($id);
        return view('dashboard.admin.institutions.edit',compact('institucion'));
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
        $institucion = Institucion::find($id);
        $institucion->fill($request->all());
        $institucion->save();
        Flash::warning('La institución ' . $institucion->name . 'ha sido editada con exito!');
        return redirect()->route('admin.institutions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institucion = Institucion::find($id);
        $institucion->delete();
        Flash::error('La institucion ' . $institucion->name . 'ha sido borrada de forma exitosa!');
        return redirect()->route('admin.institutions.index');
    }
}
