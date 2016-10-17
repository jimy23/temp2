<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Student
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next)
    {
         switch($this->auth->user()->tipoUsuario_codigoTipoUsuario)
        {
            case '0':
                #Root
                return redirect()->to('root.profile');
                break;

            case '1':
                #Administrador
                return redirect()->to('admin.profile');
                break;

            case '2':
                #Psicologo
                return redirect()->to('psychologist.profile');
                break;

            case '3':
                #Estudiante
                return redirect()->to('student.profile');
                break;

            default:
                return redirect()->to('auth/login');
        }
        return $next($request);
    }
}
