<?php

namespace App\DataFixtures;

use App\Entity\Nationalite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NationaliteFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un tableau de nationalités fictives
        $nationalites = ['Française', 'Américaine', 'Britannique', 'Canadienne', 'Australienne'];

        foreach ($nationalites as $i => $nomNationalite) {
            $nationalite = new Nationalite();
            $nationalite->setNationalite($nomNationalite);

            $manager->persist($nationalite);

            // Ajouter une référence pour être utilisée dans d'autres fixtures
            $this->addReference('nationalite_' . ($i + 1), $nationalite);
        }

        $manager->flush();
    }
}
