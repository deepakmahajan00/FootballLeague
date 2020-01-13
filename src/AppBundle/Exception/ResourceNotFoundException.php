<?php

namespace AppBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Resource Not Found Exception
 */
final class ResourceNotFoundException extends ApplicationException
{

    /**
     * {@inheritDoc}
     */
    public function __construct($message, $code = Response::HTTP_NOT_FOUND)
    {
        parent::__construct($message, $code);
    }

}
