<?php
namespace Tms\Bundle\FaqClientBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class QuestionCategory
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection
     */
    protected $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return QuestionCategory
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
     * Set name
     *
     * @param string $name
     * @return QuestionCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set questions
     *
     * @param ArrayCollection $questions
     * @return QuestionCategory
     */
    public function setQuestions(ArrayCollection $questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
    
    /**
     * Add a new question
     *
     * @param Question $question
     * @return QuestionCategory
     */
    public function addQuestion(Question $question)
    {
        if (! $this->questions->contains($question)) {
            $this->questions->add($question);
        }

        return $this;
    }

    /**
     * Remove an existing question
     *
     * @param Question $question
     * @return QuestionCategory
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);

        return $this;
    }
}
