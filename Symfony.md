## twig

## database

php bin/console doctrine:database:create ==> d:d:c

php bin/console make:entity

php bin/console make:migration

php bin/console doctrine:migrations:migrate =?> envoyer vers database

## La validation

[validation link](https://symfony.com/doc/current/validation.html#validator-constraint-targets)

syntax :
`
// src/Entity/Author.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Author
{ 
    #[Assert\NotBlank]
    
    protected string $firstName;
}
`

## les fixtures

installation : == composer require --dev orm-fixtures ==

install fakerphp : composer require --dev fakerphp/faker

new folder :cd DataFixtures/AppFixtures

`<?php

namespace App\DataFixtures;

use App\Entity\Symftable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
private $faker;

    public function __construct()
    {
        $this->faker = Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 50; $i++) {
            $table = new Symftable;
            $table
                ->setName($this->faker->word())
                ->setAge(mt_rand(0, 100));
            $manager->persist($table);
        }

        $manager->flush();
    }

}
`
