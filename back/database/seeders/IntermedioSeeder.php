<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IntermedioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('intermedios')->insert([
        ['fecha'=>'2025-10-18','turno'=>'MAÑANA','refrig'=>"Mini Pizzitas (cada racion de 2 piezas) + refresco de 300ml"],
        ['fecha'=>'2025-10-18','turno'=>'TARDE','refrig'=>"Postre de Oreo (cada racion de 2 piezas, tamaño mediano) + Vaso de Café"],
        ['fecha'=>'2025-10-19','turno'=>'MAÑANA','refrig'=>"Mini Pizzitas (cada racion de 2 piezas) + refresco de 300ml"],
        ['fecha'=>'2025-10-19','turno'=>'TARDE','refrig'=>"Postre de Oreo (cada racion de 2 piezas, tamaño mediano) + Vaso de Café"],
        ['fecha'=>'2025-10-20','turno'=>'MAÑANA','refrig'=>"Mini Pizzitas (cada racion de 2 piezas) + refresco de 300ml"],
        ['fecha'=>'2025-10-20','turno'=>'TARDE','refrig'=>"Postre de Oreo (cada racion de 2 piezas, tamaño mediano) + Vaso de Café"],
        ['fecha'=>'2025-10-21','turno'=>'MAÑANA','refrig'=>"Mini Pizzitas (cada racion de 2 piezas) + refresco de 300ml"],
        ['fecha'=>'2025-10-21','turno'=>'TARDE','refrig'=>"Postre de Oreo (cada racion de 2 piezas, tamaño mediano) + Vaso de Café"],
        ['fecha'=>'2025-10-22','turno'=>'MAÑANA','refrig'=>"Mini Hamburguezas (cada racion de 2 piezas, Pan, Carne especial, queso, Lechuga, tomate y cebolla caramelizada + refresco de 300ml"],
        ['fecha'=>'2025-10-22','turno'=>'TARDE','refrig'=>"Cupcakes (cada racion de 2 piezas, tamaño nornal, con relleno y decorado) + Vaso de Café"],
        ['fecha'=>'2025-10-23','turno'=>'MAÑANA','refrig'=>"Mini Sandwiich (cada racion de 2 piezas, Pan tostado, Lechuga, tomate, Filete de pollo, Jamons y Queso) + refresco de 300ml  "],
        ['fecha'=>'2025-10-23','turno'=>'TARDE','refrig'=>"Postre tres Leches (cada racion de 2 piezas, tamaño mediano) + Vaso de Café"],
        ]);

    }
}
