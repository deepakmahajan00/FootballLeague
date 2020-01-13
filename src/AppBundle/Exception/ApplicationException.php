<?php

namespace AppBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Application Exception
 */
abstract class ApplicationException extends \Exception
{
    /**
     * {@inheritDoc}
     */
    public function __construct($message, $code = Response::HTTP_INTERNAL_SERVER_ERROR, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
