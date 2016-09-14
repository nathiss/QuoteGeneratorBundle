<?php

namespace Nathiss\Bundle\QuoteGenerateBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nathiss\Bundle\QuoteGenerateBundle\Entity\Quote;

class LoadQuoteData implements FixturesInterface
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
            $quote->setContent($fixture['content']);
            $quote->setAuthor($fixture['author']);

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
        $path = '../../Data/quotes.json';
        $file = fopen($path, 'r') or throw new Exception('File quotes.json in Nathiss\\QuotesGeneratorBundle\\Data does not exist.');
        $content = fread($file, filesize($path));
        fclose($file);

        return json_decode($content);       
    }
}
