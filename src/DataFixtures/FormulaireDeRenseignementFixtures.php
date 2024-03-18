<?php

namespace App\DataFixtures;

use App\Entity\FormulaireDeRenseignement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormulaireDeRenseignementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $formulaire = new FormulaireDeRenseignement();
        $formulaire->setNom('Fabert');
        $formulaire->setPrenom('Jonathan');
        $formulaire->setTelephone('0678664554');
        $formulaire->setEmail('fabert.jonathan@gmail.com');
        $formulaire->setSujet('Demande de renseignements pour une visite avec les vétérinaires');
        $formulaire->setMessage(
            'Madame, Monsieur,
            Je me permet de vous contacter pour solliciter une visite avec les vétérinaires pour voir certain de vos animaux de plus prèt et aussi pour voir comment les vétérinaires font leurs visite pour les aniamux.
        Cordialement'
        );
        $formulaire->setValide(true);

        $manager->persist($formulaire);
        $manager->flush();
    }
}