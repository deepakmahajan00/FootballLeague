<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\Criteria;

/**
 * LeagueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LeagueRepository extends BaseEntityRepository implements FilterableRepositoryInterface
{
  /**
   * {@inheritDoc}
   * @throws \Doctrine\ORM\Query\QueryException
   */
  public function findAllWithCriteria(Criteria $criteria)
  {
    return $this->createQueryBuilder('b')
      ->select('b')
      ->addCriteria($criteria)
      ->getQuery()
      ->getResult();
  }

  /**
   * {@inheritDoc}
   * @throws \Doctrine\ORM\Query\QueryException
   */
  public function count(Criteria $criteria)
  {
    $countCriteria = clone $criteria;
    $countCriteria->setMaxResults(null)->setFirstResult(null);

    return (int) $this->createQueryBuilder('b')
      ->select('count(b)')
      ->addCriteria($countCriteria)
      ->getQuery()
      ->getSingleScalarResult();
  }
}