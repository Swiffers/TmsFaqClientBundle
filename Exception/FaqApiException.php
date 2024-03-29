<?php
namespace Tms\Bundle\FaqClientBundle\Exception;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqApiException extends \Exception
{
    /**
     * Type of error
     * @var string
     */
    protected $type;

    /**
     * FaqApiException contructor
     * all types are :
     * - network : unable to reach api
     * - data : json data are blank or malformed
     * - incomplete : there are some required fields missing
     * - unknown : unknown error
     *
     * @param string $type Type of error that occur
     */
    public function __construct($type='unknown')
    {
        $this->type = $type;

        parent::__construct($type);
    }
}
