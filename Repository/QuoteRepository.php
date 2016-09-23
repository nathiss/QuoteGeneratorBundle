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

namespace Nathiss\Bundle\QuoteGeneratorBundle\Repository;

/**
 * QuoteRepository
 */
class QuoteRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Selects Quote from DB randomly
     *
     * @return \Nathiss\Bundle\QuoteGenerateBundle\Entity\Quote
     */
    public function findOneRandomly()
    {
        $count = $this->createQueryBuilder('q')
            ->select('COUNT(q)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->createQueryBuilder('q')
            ->setFirstResult(rand(0, $count-1))
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
