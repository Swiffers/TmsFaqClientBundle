<?php
namespace Tms\Bundle\FaqClientBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class Question
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var ArrayCollection
     */
    protected $responses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Question
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Question
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set questions
     *
     * @param ArrayCollection $responses
     * @return Question
     */
    public function setResponses(ArrayCollection $responses)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return ArrayCollection
     */
    public function getResponses()
    {
        return $this->responses;
    }
    
    /**
     * Add a new response
     *
     * @param Response $response
     * @return Question
     */
    public function addResponse(Response $response)
    {
        if (! $this->responses->contains($response)) {
            $this->responses->add($response);
        }

        return $this;
    }

    /**
     * Remove an existing response
     *
     * @param Response $response
     * @return Question
     */
    public function removeResponse(Response $response)
    {
        $this->responses->removeElement($response);

        return $this;
    }
}
