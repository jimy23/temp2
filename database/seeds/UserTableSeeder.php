<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #DB::table('usuario')->truncate();
        factory(App\Models\Usuario::class)->create([
            'nombre' => 'root',
            'email' => 'root@ptti.com',
            'contrasena' => bcrypt('root'),
            'activo' => 1,
            'tipoUsuario_codigoTipoUsuario' => 0
        ]);
        factory(App\Models\Usuario::class, 49)->create();
    }
}
