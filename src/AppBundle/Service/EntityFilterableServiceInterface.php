<?php

namespace AppBundle\Service;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;

/**
 * FilterableServiceInterface
 */
interface EntityFilterableServiceInterface
{
    /**
     * @param $fields
     * @param $limit
     * @param $offset
     * @return Criteria
     */
    public function createCriteria($fields, $limit = null, $offset = null);

    /**
     * @param Criteria $criteria
     *
     * @return Collection
     */
    public function getAll(Criteria $criteria);

    /**
     * @param Criteria $criteria
     *
     * @return int
     */
    public function count(Criteria $criteria);

}

