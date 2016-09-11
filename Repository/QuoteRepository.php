<?php

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
