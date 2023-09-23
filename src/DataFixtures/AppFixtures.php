<?php

namespace App\DataFixtures;

use  App\Entity\Ingrediant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
  private $faker;
  public function __construct()
  {
    $this->faker = Factory::create();
  }
  public function load(ObjectManager $manager)
  {
    for ($i = 0; $i < 20; $i++) {
      $ingedient = new Ingrediant;
      $ingedient
        ->setName($this->faker->word())
        ->setPrice(\mt_rand(0, 100));
      $manager->persist($ingedient);
    }
    $manager->flush();
  }
}
