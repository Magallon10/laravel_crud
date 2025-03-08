<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function getNIF():string{
        $letras ="TRWAGMYFPDXBNJZSQVHLCKE";
        $dni = $this->faker->numberBetween("10000000", "99999999");
        $dni = $dni."-".$letras[$dni%23];
        return $dni;
    }

    public function run(): void
    {
        $nombres = []

        Proyecto::factory()->count(20)->create()->each(function (Proyecto $proyecto){
            $alumno = new Alumno();
            $alumno->proyecto_id->$proyecto->id;
        });
    }

    /*
     * ->each(function (Proyecto $proyecto){
            $alumno = new Alumno();
            $alumno->nombre->faker->name();
            $alumno->dni->$this->getNIF();
            $alumno->email->faker->unique()->safeEmail();
            $alumno->f_nac->faker->date();
            $alumno->proyecto_id->$proyecto->id;
            $alumno->save();

        })
     */

}
