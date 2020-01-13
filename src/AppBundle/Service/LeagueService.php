<?php

namespace AppBundle\Service;

use AppBundle\Repository\LeagueRepository;

/**
 * Class LeagueService
 * @package AppBundle\Service
 */
class LeagueService extends BaseEntityService
{
    /**
     * LeagueService constructor.
     * @param LeagueRepository $leagueRepository
     */
    public function __construct(LeagueRepository $leagueRepository)
    {
        parent::__construct($leagueRepository);
    }
}