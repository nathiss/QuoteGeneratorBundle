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

namespace Nathiss\Bundle\QuoteGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quote
 *
 * @ORM\Table(name="nathiss_quote")
 * @ORM\Entity(repositoryClass="Nathiss\Bundle\QuoteGeneratorBundle\Repository\QuoteRepository")
 */
class Quote
{
    /**
     * Id of the quote.
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Author of the quote, can be null.
     *
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * Content of the quote, can not be null.
     *
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * Publication date, it's set in __construct() method.
     *
     * @var \DateTime
     *
     * @ORM\Column(name="pubDate", type="datetime")
     */
    private $pubDate;


    /**
     * Sets pubDate attribute.
     */
    public function __construct()
    {
        $this->pubDate = new \DateTime();
    }

    /**
     * Renders objects as string.
     *
     * Returns content of the quote.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->content;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Quote
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Quote
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return Quote
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Get pubDate
     *
     * @return \DateTime
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }
}

