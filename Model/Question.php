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
    protected $questionCategories;
    
    /**
     * @var ArrayCollection
     */
    protected $responses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionCategories = new ArrayCollection();
        $this->responses = new ArrayCollection() ;
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
     * Set responses
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

    /**
     * Set questionCategories
     *
     * @param ArrayCollection $questionCategories
     * @return Question
     */
    public function setQuestionCategories(ArrayCollection $questionCategories)
    {
        $this->questionCategories = $questionCategories;

        return $this;
    }

    /**
     * Get questionCategories
     *
     * @return ArrayCollection
     */
    public function getQuestionCategories()
    {
        return $this->questionCategories;
    }
    
    /**
     * Add a new questionCategory
     *
     * @param QuestionCategory $questionCategory
     * @return Question
     */
    public function addQuestionCategory(QuestionCategory $questionCategory)
    {
        if (! $this->questionCategories->contains($questionCategory)) {
            $this->questionCategories->add($questionCategory);
        }

        return $this;
    }

    /**
     * Remove an existing questionCategory
     *
     * @param QuestionCategory $questionCategory
     * @return Question
     */
    public function removeQuestionCategory(QuestionCategory $questionCategory)
    {
        $this->questionCategories->removeElement($questionCategory);

        return $this;
    }
}
