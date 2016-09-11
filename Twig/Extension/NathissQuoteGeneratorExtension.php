<?php

namespace Nathiss\Bundle\QuoteGeneratorBundle\Twig\Extension;

use Doctrine\ORM\EntityManager;
use InvalidArgumentException;
use Twig_SimpleFunction;
use Twig_Enviroment;
use Twig_Extension;

/**
 * Twig extension for generating quotes.
 */
class NathissQuoteGeneratorExtension extends Twig_Extension
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;


    /**
     * Sets Entity Manager.
     */
    public function __construct(EntityManager $em = null)
    {
        $this->em = $em;
    }

    /**
     * Generates quote
     * Selects randomly quote form DB and renders twig template
     *
     * @param \Twig_Environment $twigEnvironment
     * @param array $options
     * @param string[] $providers
     *
     * @throws \InvalidArgumentExeption If template was not found
     *
     * @return string
     */
    public function generateQuote(
        Twig_Environment $twigEnvironment,
        array $options = array(),
        array $providers = array()
    ) {
#         if(!isset($options['template']))
#             throw new InvalidArgumentException('Template parameter (for NathissQuoteGeneratorBundle) can not be null.');

        $quote = $this->em->getRepository('NathissQuoteGeneratorBundle:Quote')->findOneRandomly();
        if(!$quote)
            return null;
        return $twigEnvironment->render('NathissQuoteGeneratorBundle:Default:quote.html.twig', array('quote' => $quote));
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction(
                'generate_quote',
                array($this, 'generateQuote'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true,
                )
            ),
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
