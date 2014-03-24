<?php 
// src/Acme/StoreBundle/DataFixtures/ORM/LoadUserData.php
// see: http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html

namespace Acme\StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\StoreBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $users = $this->getUsersArray();

        foreach ($users as $key => $value) {
            $user = new User();
            $user->setUsername($value['username']);
            $user->setEmail($value['email']);
            $user->setPassword('123456');
            $manager->persist($user);
        }

        $manager->flush();
    }


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }


    protected function getUsersArray() 
    {
        return array(
            array('username' => 'seanastin',     'email' => 'seanastin@acme.com',     'name' => 'Sean Astin'),
            array('username' => 'davidaston',    'email' => 'davidaston@acme.com',    'name' => 'David Aston'),
            array('username' => 'seanbean',      'email' => 'seanbean@acme.com',      'name' => 'Sean Bean'),
            array('username' => 'cateblanchett', 'email' => 'cateblanchett@acme.com', 'name' => 'Cate Blanchett'),
            array('username' => 'orlandobloom',  'email' => 'orlandobloom@acme.com',  'name' => 'Orlando Bloom'),
        );
    }

}