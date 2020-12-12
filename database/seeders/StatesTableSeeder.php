<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->deleteStates();
        $this->insertStates();
    }

    private function deleteStates(){
        State::query()->delete();
    }

    private function insertStates()
    {
        State::query()->insert($this->getStates());
    }

    private function getStates(): array
    {
        return array(
            array('name' => "Amazonas",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Antioquia",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Arauca",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Atlantico",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bogota",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bolivar",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Boyaca",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Caldas",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Caqueta",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Casanare",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Cauca",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Cesar",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Choco",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Cordoba",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Cundinamarca",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Guainia",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Guaviare",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Huila",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "La Guajira",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Magdalena",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Meta",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Nariño",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Norte de Santander",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Putumayo",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Quindio",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Risaralda",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "San Andres y Providencia",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Santander",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Sucre",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Tolima",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Valle del Cauca",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Vaupes",'country_id' => 47, 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Vichada",'country_id' => 47, 'created_at' => now(), 'updated_at' => now())
        );
    }
}
