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

namespace Nathiss\Bundle\QuoteGeneratorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nathiss\Bundle\QuoteGeneratorBundle\Entity\Quote;

/**
 * Class LoadQuoteData
 *
 * Loads quote's fixtures and pushes them to database.
 */
class LoadQuoteData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $fixtures = $this->loadQuoteFixtures();

        foreach($fixtures as $fixture)
        {
            $quote = new Quote();
            $quote->setContent($fixture->content);
            $quote->setAuthor($fixture->author);

            $manager->persist($quote);
            $manager->flush();
        }
    }

    /**
     * Loads fixtures from Data/quotes.json file and returns it as array
     *
     * @return array
     */
    public function loadQuoteFixtures()
    {
        $path = __DIR__.'/../../Data/quotes.json';
        $file = fopen($path, 'r');
        $content = fread($file, filesize($path));
        fclose($file);

        return json_decode($content);
    }
}
