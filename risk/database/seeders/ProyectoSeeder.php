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
        $dni = rand(10000000, 99999999);
        $dni = $dni."-".$letras[$dni%23];
        return $dni;
    }

    private function createAlumnosProyecto(Proyecto $proyecto, int $numeroAlumnos)
    {
        $nombres = collect(["Mario","Marta","Marcos"]);
        $edades = collect([18,19,20,21,22,23,24,25]);



     for($i = 0; $i < $numeroAlumnos; $i++){
         $proyecto->alumno()->create([
            "nombre" => $nombres->random(),
            "edad" => $edades->random(),
             "dni" => $this->getNIF()
        ]);
     }








    }
    public function run(): void
    {

        Proyecto::factory()->count(20)->create()->each(function (Proyecto $proyecto){
            $numeroIdiomas = rand(1, 3);
                $this->createAlumnosProyecto($proyecto, $numeroIdiomas);
        });
    }


}
