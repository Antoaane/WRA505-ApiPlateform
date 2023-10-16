<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

// Fixture for User entity with hashed password
class UserFixture extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    // Inject UserPasswordHasherInterface
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    // Create 10 users with hashed password
    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 10) as $i) {
            $user = new User();
            $user->setEmail('user' . $i . '@example.com');
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                'password' . $i
            ));
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
        }

        $manager->flush();
    }
}