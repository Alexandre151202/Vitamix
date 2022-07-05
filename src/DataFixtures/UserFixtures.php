<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();

        //User

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setfullName($faker->name())
                ->setEmail($faker->email());

            $hashPassword = $this->hasher->hashPassword(
                $user,
                'password'
            );

            $user->setPassword($hashPassword);



            $manager->persist($user);
       }


//        Contact

        for ($i = 0; $i < 5; $i++){

            $contact = new Contact();
            $contact->setfullName($faker->name('male'|'female'));
            $contact->setEmail($faker->email());
            $contact->setSubject($i);
            $contact->setMessage($faker->text(50));

            $manager->persist($contact);
        }


        $manager->flush();
    }
}

