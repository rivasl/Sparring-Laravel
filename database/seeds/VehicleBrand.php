<?php
namespace Faker\Provider;

class Brand extends \Faker\Provider\Base {

  protected static $brand = array(
    'Ford',
    'Chevrolet',
    'Wolsvagen',
    'Fiat',
    'Renault',
    'Hiunday',
    'Acura',
    'Honda',
    'Chery',
    'Toyota',
    'Jeep',
    'Mitsubishi'
  );

  public function brand(){
    return static::randomElement(static::$brand);
  }
}
?>