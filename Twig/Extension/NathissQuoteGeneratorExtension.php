<?php

namespace Nathiss\Bundle\QuoteGeneratorBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig_SimpleFunction;
use Twig_Extension;

class NathissQuoteGeneratorExtension extends Twig_Extension
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;


    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Generates quote
     * Selects randomly quote form DB and renders twig template
     *
     * @return string
     */
    public function generateQuote()
    {
        $quote = $this->container->get('doctrine.orm.entity_manager')->getRepository('NathissQuoteGeneratorBundle:Quote')->findOneRandomly();
        if(!$quote)
            return null;
        return $this->container->get('templating')->render('NathissQuoteGeneratorBundle:Default:quote.html.twig', array('quote' => $quote));
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('generate_quote', array($this, 'generateQuote'), array('is_safe' => array('html'),))
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'nathiss_quote_generator_extension';
    }
}
