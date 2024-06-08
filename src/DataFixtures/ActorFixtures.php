<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor1 = new Actor();
        $actor2 = new Actor();
        $actor3 = new Actor();

        $actor4 = new Actor();
        $actor5 = new Actor();
        $actor6 = new Actor();

        $actor1->setName('Кристиан Бейл');
        $actor2->setName('Хит Леджер');
        $actor3->setName('Гари Олдман');

        $actor4->setName('Скарлет Йохансон');
        $actor5->setName('Джереми Леннер');
        $actor6->setName('Марк Руффалр');

        $manager->persist($actor1);
        $manager->persist($actor2);
        $manager->persist($actor3);
        $manager->persist($actor4);
        $manager->persist($actor5);
        $manager->persist($actor6);

        $manager->flush();

        $this->addReference('actor1',$actor1);
        $this->addReference('actor2',$actor2);
        $this->addReference('actor3',$actor3);

        $this->addReference('actor4',$actor4);
        $this->addReference('actor5',$actor5);
        $this->addReference('actor6',$actor6);


    }
}
