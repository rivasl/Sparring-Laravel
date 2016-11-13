<?php
namespace Faker\Provider;

class ModelVehicle extends \Faker\Provider\Base {

  protected static $modelveh = array(
    'Pikachu',
    'Bulbasaur',
    'Cubone',
    'Charizard',
    'Marowak',
    'Gastly',
    'Alakazam',
    'Arcanine',
    'Vaporeon',
    'Flareon',
    'Venusaur',
    'Wartortle'
  );

  public function modelveh(){
    return static::randomElement(static::$modelveh);
  }
}
?>