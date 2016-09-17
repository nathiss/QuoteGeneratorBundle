<?php

namespace Nathiss\Bundle\QuoteGeneratorBundle\Tests\Twig\Extension;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Nathiss\Bundle\QuoteGeneratorBundle\Twig\Extension\NathissQuoteGeneratorExtension;

class NathissQuoteGeneratorExtensionTest extends KernelTestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();

       $this->container = static::$kernel->getContainer();         
    }

    public function testIfTwigExtensionExist()
    {
        $te = $this->container->get('doctrine');

        $this->assertNotNull($te);
    }

    /**
     *  {@inheritDoc}
     */
    public function teanDown()
    {
        parent::tearDown();

        $this->container->close();
        $this->container = null;
    }
}
