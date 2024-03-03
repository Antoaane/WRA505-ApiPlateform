<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MovieFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 100) as $i) {
            $movie = new Movie();
            $movie->setTitle('film' . $i);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration(rand(80, 180));
            $movie->setDescription('descritpion' . $i);
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
            $movie->addActor($this->getReference('actor_' . rand(1, 9)));
            $this->addReference('movie_' . $i, $movie);
            foreach (range(1, rand(2, 6)) as $j) {
                $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            }
            $manager->persist($movie);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ActorFixture::class,
        ];
    }
}
