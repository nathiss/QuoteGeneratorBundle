<?php

/**
 * This is a part of NathissQuoteGeneratorBundle.
 *
 * NathissQuoteGeneratorBundle is Symfony 2|3 bundle for generating quotes, which are randomly selected from database.
 * For the full copyright and license information, please view the LICENSE file that was distributed with the source code.
 *
 * @package nathiss/quote-generator-bundle
 * @author Kamil Rusin <kamil.jakub.rusin@gmail.com>
 */

namespace Nathiss\Bundle\QuoteGeneratorBundle\Twig\Extension;

use Nathiss\Bundle\QuoteGeneratorBundle\Exception\QuoteDoesNotExistException;
use Symfony\Component\DependencyInjection\ContainerInterface;
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
     * Service container.
     *
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;


    /**
     * Sets Container
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Generates quote
     * Selects randomly quote form DB and renders twig template.
     *
     * @throws \Nathiss\Bundle\QuoteGeneratorBundle\Exception\QuoteDoesNotExist
     *
     * @return string
     */
    public function generateQuote()
    {
        $quote = $this->getQuote();

        return $this->get('templating')->render(
            $this->getTemplate(),
            array('quote' => $quote)
        );
    }

    /**
     * Returns quote from database
     *
     * @return \Nathiss\Bundle\QuoteGeneratorBundle\Entity\Quote
     */
    private function getQuote()
    {
        $quote = $this->container->get('doctrine.orm.entity_manager')->getRepository('NathissQuoteGeneratorBundle:Quote')->findOneRandomly();
        if(!$quote)
            throw new QuoteDoesNotExistException('No quote exists in database!');
        return $quote;
    }

    /**
     * Returns service from container.
     *
     * @param string $service
     *
     * @return mixed
     */
    private function get($service)
    {
        return $this->container->get($service);
    }

    /**
     * Returns template's parameter.
     *
     * @return string
     */
    private function getTemplate()
    {
        return $this->container->getParameter('nathiss_quote_generator.template');
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
