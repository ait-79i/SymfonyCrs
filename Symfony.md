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
{ #[Assert\NotBlank]

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

Supported Field Types

The following field types are natively available in Symfony:

## Text Fields

TextType
TextareaType
EmailType
IntegerType
MoneyType
NumberType
PasswordType
PercentType
SearchType
UrlType
RangeType
TelType
ColorType

## Choice Fields

ChoiceType
EnumType
EntityType
CountryType
LanguageType
LocaleType
TimezoneType
CurrencyType

## Date and Time Fields

DateType
DateIntervalType
DateTimeType
TimeType
BirthdayType
WeekType

## Other Fields

CheckboxType
FileType
RadioType

## Symfony UX Fields

These types are part of the Symfony UX Packages

CropperType (using Cropper.js)
DropzoneType
UID Fields
UuidType
UlidType
Field Groups
CollectionType
RepeatedType
Hidden Fields
HiddenType
Buttons
ButtonType
ResetType
SubmitType
Base Fields
FormType

## creation du form

` php bin/console make:form`

# dans le controller

#[la Route()]
public function new(Reaquest $request,EentityManagerInterface::class $manager ):Response{
$instant = new Object();

    >>> <pour l'affichage du form>    
    >>>>>$form = $this->createForm(ObjectType::class, $instant);
    >>>>>return $this->render('pages/view.html.twig',['form'=>$form->createView()]) 
    >>> <Pour handle la requette: >
    >>>>> $form->handleRequest($request);
    >>>>> if($form->isSumbitted()&& $form->isValid()){
        dd($form->getData())
        $data = $form->getData();
        $manager->persist($data)
        $manager->flush()
    }
     
}

# dans la view :

{{ form(form) }}


les message d'errors



# dans le ObjectType

&& pour la valildation :
use Symfony\Component\Validator\Constraints as Assert;

->add('name', TextType::class, [
'attr' => [
'class' => 'form-control',
'minlength' => '2',
'maxlength' => '50'
],
'label' => 'Nom',
'label_attr' => [
'class' => 'form-label mt-4',
],
'constraints' => [
new Assert\NotBlank(),
new Assert\Length(['max' => 50, "min" => 2]),
],
])
