<?php

namespace AppBundle\Service;

use Doctrine\Common\Collections\Criteria;
use AppBundle\Repository\BaseEntityRepository;
use AppBundle\Repository\FilterableRepositoryInterface;
use AppBundle\Service\EntityFilterableServiceInterface;

/**
 * Class BaseEntityService
 * @package AppBundle\Service
 */
class BaseEntityService implements EntityFilterableServiceInterface
{
    /** @var BaseEntityRepository|FilterableRepositoryInterface */
    protected $entityRepository;

    /**
     * RemoteDomainsService constructor.
     * @param BaseEntityRepository $entityRepository
     */
    public function __construct(BaseEntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    /**
     * @return BaseEntityRepository|FilterableRepositoryInterface
     */
    public function getEntityRepository()
    {
        return $this->entityRepository;
    }

    /**
     * @param $entity
     */
    public function persist($entity)
    {
        $this->entityRepository->persist($entity);
    }

    /**
     * @param mixed|null $entity
     */
    public function save($entity = null)
    {
        $this->entityRepository->save($entity);
    }

    /**
     * @param $entity
     */
    public function remove($entity)
    {
        $this->entityRepository->remove($entity);
    }

    /**
     * @param $fields
     * @param $limit
     * @param $offset
     * @return Criteria
     */
    public function createCriteria($fields, $limit = null, $offset = null)
    {
        $criteria = Criteria::create();
        if (!is_null($limit)) {
            $criteria->setMaxResults($limit);
        }

        if (!is_null($offset)) {
            $criteria->setFirstResult($offset);
        }

        foreach ($fields as $field => $value) {
            if (!is_null($value)) {
                $criteria->andWhere(Criteria::expr()->eq($field, $value));
            }
        }

        return $criteria;
    }

    /**
     * {@inheritDoc}
     */
    public function getAll(Criteria $criteria)
    {
        return $this->entityRepository->findAllWithCriteria($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function count(Criteria $criteria)
    {
        return $this->entityRepository->count($criteria);
    }

}