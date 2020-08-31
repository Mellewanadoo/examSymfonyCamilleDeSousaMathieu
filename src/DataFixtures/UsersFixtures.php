<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UsersFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('prenom');
        $user->setLastname('nom');
        $user->setEmail('admin@progres.fr');
        $user->setRoles(['ADMIN']);
        $password = $this->encoder->encodePassword($user, 'admin123');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setFirstname('prenom');
        $user->setLastname('nom');
        $user->setEmail('journaliste@progres.fr');
        $user->setRoles(['ADMIN']);
        $password = $this->encoder->encodePassword($user, 'journaliste');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}

?>