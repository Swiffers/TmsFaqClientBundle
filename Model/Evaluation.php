<?php
namespace Tms\Bundle\FaqClientBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class Evaluation
{

    /**
     * Consumer identifier
     * 
     * @var int
     */
    protected $consumerId;

    /**
     * Response identifier
     * 
     * @var int
     */
    protected $responseId;

    /**
     * rating value
     * 
     * @var int
     */
    protected $value;

    /**
     * Set consumerId
     *
     * @param int $consumerId
     * @return Evaluation
     */
    public function setConsumerId($consumerId)
    {
        $this->consumerId = $consumerId;

        return $this;
    }

    /**
     * Get consumerId
     *
     * @return int
     */
    public function getConsumerId()
    {
        return $this->consumerId;
    }

    /**
     * Set responseId
     *
     * @param int $responseId
     * @return Evaluation
     */
    public function setResponseId($responseId)
    {
        $this->responseId = $responseId;

        return $this;
    }

    /**
     * Get responseId
     *
     * @return int
     */
    public function getResponseId()
    {
        return $this->responseId;
    }

    /**
     * Set value
     *
     * @param int $value
     * @return Evaluation
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return int
     */
    public function getValue()
        return $this->value;
    }
}
