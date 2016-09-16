<?php

namespace Nathiss\Bundle\QuoteGeneratorBundle\Tests\Entity;

use Nathiss\Bundle\QuoteGeneratorBundle\Entity\Quote;

class QuoteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests all methods in Quote class.
     */
    public function testMethods()
    {
        $quote_author   = "Lorem ipsum";
        $quote_content  = "Rem omnis nostrum aperiam soluta mollitia a dolor.";
        $quote_date     = new \DateTime();

        $quote = new Quote();
        $quote->setAuthor($quote_author);
        $quote->setContent($quote_content);
        $quote->setPubDate($quote_date);

        $this->assertEquals($quote_author, $quote->getAuthor());
        $this->assertEquals($quote_content, $quote->getContent());
        $this->assertEquals($quote_date, $quote->getPubDate());
    }    
}
