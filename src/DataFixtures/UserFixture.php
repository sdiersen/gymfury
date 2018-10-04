<?php

namespace App\DataFixtures;

use App\Entity\FuryUser;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
   private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_users', function($i) {
            $user = new FuryUser();
            $user->setEmail(sprintf('gymfury%d@gymfury.test', $i));
            $user->setFirstname($this->faker->firstName);
            $user->setPassword($this->passwordEncoder->encodePassword(
               $user,
               'engage'
            ));

            return $user;
        });

        $this->createMany(3, 'admin_users', function($i) {
            $user = new FuryUser();
            $user->setEmail(sprintf('admin%d@gymfury.test', $i));
            $user->setFirstname($this->faker->firstName);
            $user->setRoles(['ROLE_ADMIN']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'engage'
            ));

            return $user;
        });
        $manager->flush();
    }
}
