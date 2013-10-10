<?php
namespace Tms\Bundle\FaqClientBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class ConsumerSearch
{
    /**
     * Is response useful to the consumer
     * 
     * @var boolean
     */
    protected $answerFound;

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
     * Search query string
     * 
     * @var string
     */
    protected $searchQuery;


    /**
     * Set answerFound
     *
     * @param boolean $answerFound
     * @return ConsumerSearch
     */
    public function setAnswerFound($answerFound)
    {
        $this->answerFound = $answerFound ? true : false;

        return $this;
    }

    /**
     * To array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            "answerFound"   => $this->getAnswerFound(),
            "response_id"   => $this->getResponseId(),
            "query"         => $this->getSearchQuery(),
            "user_id"       => $this->getConsumerId()
        );
    }

    /**
     * Get answerFound
     *
     * @return boolean
     */
    public function getAnswerFound()
    {
        return $this->answerFound ? true : false;
    }

    /**
     * Set consumerId
     *
     * @param int $consumerId
     * @return ConsumerSearch
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
     * @return ConsumerSearch
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
     * Set searchQuery
     *
     * @param string $searchQuery
     * @return ConsumerSearch
     */
    public function setSearchQuery($searchQuery)
    {
        $this->searchQuery = $searchQuery;

        return $this;
    }

    /**
     * Get searchQuery
     *
     * @return string
     */
    public function getSearchQuery()
    {
        return $this->searchQuery;
    }
}
