<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Acme\AppBundle\Entity\Menu;

class LoadMenuData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $dic;
    protected $menuManager;

    public function setContainer(ContainerInterface $dic = null)
    {
        $this->dic = $dic;
        $this->menuManager = $this->dic->get('msi_admin.menu_root_manager');
    }

    public function load(ObjectManager $manager)
    {
        // ADMIN MENU
        // root
        $root = $this->menuManager->create();
        $manager->persist($root);
        $manager->flush();

        // FLUSH
        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}
