<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;

interface FilterableRepositoryInterface
{

    /**
     * @param Criteria $criteria
     *
     * @return Collection
     */
    public function findAllWithCriteria(Criteria $criteria);

    /**
     * @param Criteria $criteria
     *
     * @return int
     */
    public function count(Criteria $criteria);

}
