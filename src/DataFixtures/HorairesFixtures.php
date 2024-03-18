<?php

namespace App\DataFixtures;

use App\Entity\Horaires;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HorairesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $horairesMatin = \DateTime::createFromFormat('H:i', '08:45');
        $horairesSoirFermeture = \DateTime::createFromFormat('H:i', '18:00');

        foreach ($jours as $jour) {
            $horaire = new Horaires();
            $horaire->setJours($jour);

            if ($jour === 'Dimanche') { // Supposons que Dimanche est fermé
                $horaire->setHorairesOuverturesMatin(null);
                $horaire->setHorairesFermeturesSoir(null);
            } else {
                $horaire->setHorairesOuverturesMatin($horairesMatin);
                $horaire->setHorairesFermeturesSoir($horairesSoirFermeture);
            }

            $manager->persist($horaire);
        }

        $manager->flush();
    }
}
