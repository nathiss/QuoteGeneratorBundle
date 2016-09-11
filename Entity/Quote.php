<?php

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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Author of the quote, not needed.
     *
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * Content of the quote, needed.
     *
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * Publication date of the quote, it'll be added automaticly.
     *
     * @var \DateTime
     *
     * @ORM\Column(name="pubDate", type="datetime")
     */
    private $pubDate;


    public function __construct()
    {
        $this->pubDate = new \DateTime();
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

