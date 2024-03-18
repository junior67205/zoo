<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AvisFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $avi1 = new Avis();
        $avi1->setNom('F');
        $avi1->setPrenom('Jonathan');
        $avi1->setCommentaire('Tres bonne experience, je pense que tout dépend du personnel. Il y a dans ce zoo un monsieur qui maîtrise son job à la perfection. Malheureusement j\'ai appris
        qu\'il songeait à prendre sa retraite...');
        $avi1->setDate(\DateTime::createFromFormat('d-m-Y H:i', '25-03-2024 20:30'));
        $avi1->setValide(true);
        $manager->persist($avi1);

        $avi2 = new Avis();
        $avi2->setNom('S');
        $avi2->setPrenom('Natacha');
        $avi2->setCommentaire('Arriver vers midi et malgré le monde il y\'a de la place pour circuler avec une poussette et 2 jeune enfants...');
        $avi2->setDate(\DateTime::createFromFormat('d-m-Y H:i', '14-07-2023 19:44'));
        $avi2->setValide(true);
        $manager->persist($avi2);

        $avi3 = new Avis();
        $avi3->setNom('G');
        $avi3->setPrenom('Patrick');
        $avi3->setCommentaire('Espace de restauration propre, lumineux, bien agencé, personnel attentif à la demande. Tarifs prestations dans la moyenne. Très bien je recommande !');
        $avi3->setDate(\DateTime::createFromFormat('d-m-Y H:i', '08-02-2020 14:08'));
        $avi3->setValide(true);
        $manager->persist($avi3);

        $manager->flush();
    }
}