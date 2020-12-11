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
            array('name' => "Amazonas",'country_id' => 47),
            array('name' => "Antioquia",'country_id' => 47),
            array('name' => "Arauca",'country_id' => 47),
            array('name' => "Atlantico",'country_id' => 47),
            array('name' => "Bogota",'country_id' => 47),
            array('name' => "Bolivar",'country_id' => 47),
            array('name' => "Boyaca",'country_id' => 47),
            array('name' => "Caldas",'country_id' => 47),
            array('name' => "Caqueta",'country_id' => 47),
            array('name' => "Casanare",'country_id' => 47),
            array('name' => "Cauca",'country_id' => 47),
            array('name' => "Cesar",'country_id' => 47),
            array('name' => "Choco",'country_id' => 47),
            array('name' => "Cordoba",'country_id' => 47),
            array('name' => "Cundinamarca",'country_id' => 47),
            array('name' => "Guainia",'country_id' => 47),
            array('name' => "Guaviare",'country_id' => 47),
            array('name' => "Huila",'country_id' => 47),
            array('name' => "La Guajira",'country_id' => 47),
            array('name' => "Magdalena",'country_id' => 47),
            array('name' => "Meta",'country_id' => 47),
            array('name' => "Nariño",'country_id' => 47),
            array('name' => "Norte de Santander",'country_id' => 47),
            array('name' => "Putumayo",'country_id' => 47),
            array('name' => "Quindio",'country_id' => 47),
            array('name' => "Risaralda",'country_id' => 47),
            array('name' => "San Andres y Providencia",'country_id' => 47),
            array('name' => "Santander",'country_id' => 47),
            array('name' => "Sucre",'country_id' => 47),
            array('name' => "Tolima",'country_id' => 47),
            array('name' => "Valle del Cauca",'country_id' => 47),
            array('name' => "Vaupes",'country_id' => 47),
            array('name' => "Vichada",'country_id' => 47)
        );
    }
}
