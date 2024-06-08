<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();

        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This film about Batman');
        $movie->setImagePath('https://upload.wikimedia.org/wikipedia/en/1/1c/The_Dark_Knight_%282008_film%29.jpg');
        $movie->addActor($this->getReference('actor1'));
        $movie->addActor($this->getReference('actor2'));
        $movie->addActor($this->getReference('actor3'));

        $manager->persist($movie);

        $movie2 = new Movie();

        $movie2->setTitle('The Avangers');
        $movie2->setReleaseYear(2019);
        $movie2->setDescription('This film about final of Avengers');
        $movie2->setImagePath('https://m.media-amazon.com/images/I/71Sb4AfzGTL._AC_UF1000,1000_QL80_.jpg');
        $movie2->addActor($this->getReference('actor4'));
        $movie2->addActor($this->getReference('actor5'));
        $movie2->addActor($this->getReference('actor6'));

        $manager->persist($movie2);

        $manager->flush(); // гарантирует что будет асинхронность
    }
}
