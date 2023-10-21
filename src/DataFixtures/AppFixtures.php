<?php

namespace App\DataFixtures;
use App\Factory\CommandeFactory;
use App\Factory\DetailCommandeFactory;
use App\Factory\ProduitFactory;
use App\Factory\UtilisateurFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UtilisateurFactory::createMany(2);
        ProduitFactory::createMany(2);
        CommandeFactory::createMany(2, function (){
            return [
                'utilisateur' => UtilisateurFactory::random(),
            ];
        });
        DetailCommandeFactory::createMany(2, function (){
            return [
                'commande' => CommandeFactory::random(),
                'produit' => ProduitFactory::random()
            ];
        });
    }
}