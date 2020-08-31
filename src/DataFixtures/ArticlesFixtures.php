<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class ArticlesFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setTitre('Camille decroche enfin une bonne note');
        $article->setPhoto('asset/images/uploades/20.jpg');
        $article->setChamp('Pour une fois Camille n\'a pas detruit son code et obtient une vraie bonne note!' );

        $manager->persist($article);
        $manager->flush();
        $article = new Article();
        $article->setTitre('Camille decroche enfin une bonne note');
        $article->setPhoto('asset/images/uploades/20.jpg');
        $article->setChamp('Pour une fois Camille n\'a pas detruit son code et obtient une vraie bonne note!' );


        $manager->persist($article);
        $manager->flush();
    }
}

