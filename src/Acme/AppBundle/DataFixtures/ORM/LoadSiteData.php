<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadSiteData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $siteManager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->siteManager = $container->get('msi_admin.site_manager');
    }

    public function load(ObjectManager $manager)
    {
        $site = $this->siteManager->create();
        $site->setHost('dev.acme.com');
        $site->setEnabled(true);
        $site->setIsDefault(true);
        $site->setLocale('en');
        $site->setLocales(array(
            'en',
        ));
        $this->addReference('site1', $site);
        $manager->persist($site);
        // FLUSH
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
