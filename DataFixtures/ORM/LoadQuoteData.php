<?php

namespace Nathiss\Bundle\QuoteGenerateBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nathiss\Bundle\QuoteGeneratorBundle\Entity\Quote;

class LoadQuoteData implements FixtureInterface
{
    /**
     * {@inheritDoc}
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
