<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 50) as $i) {
            $actor = new Actor();
            $actor->setLastName('Doe' . $i);
            $actor->setFirstname('Jhon' . $i);
            // define nationality
            $actor->setNationalite($this->getReference('nationalite_' . rand(1, 5)));
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            NationaliteFixture::class,
        ];
    }
}
