<?php

namespace AppBundle\Service;

use AppBundle\Entity\Team;
use AppBundle\Repository\TeamRepository;
use AppBundle\Exception\ResourceNotFoundException;

/**
 * Class TeamService
 * @package AppBundle\Service
 */
class TeamService extends BaseEntityService
{
    /**
     * TeamService constructor.
     * @param TeamRepository $teamRepository
     */
    public function __construct(TeamRepository $teamRepository)
    {
        parent::__construct($teamRepository);
    }

    /*public function findAllByCategoriesUser($id, $userId)
    {
        $categories = $this->entityRepository->findAllByUserCategory($userId, $id);

        if (!$categories) {
            throw new ResourceNotFoundException("Could not find blog with categoryId '{$id}' for userId '{$userId}'");
        }

        return $categories;
    }*/
}