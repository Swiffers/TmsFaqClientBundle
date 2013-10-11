<?php
namespace Tms\Bundle\FaqClientBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class Faq
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var array
     */
    private $displayFromRules;

    /**
     * @var integer
     */
    private $customerId;

    /**
     * @var ArrayCollection
     */
    protected $questionCategories;

    /**
     * @var ArrayCollection
     */
    protected $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionCategories = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Faq
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
     * Set title
     *
     * @param string $title
     * @return Faq
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Faq
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return string enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Faq
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set questionCategories
     *
     * @param ArrayCollection $questionCategories
     * @return Faq
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
     * Add a new questionCategory to the Faq
     *
     * @param QuestionCategory $questionCategory
     * @return Faq
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
     * @return Faq
     */
    public function removeQuestionCategory(QuestionCategory $questionCategory)
    {
        $this->questionCategories->removeElement($questionCategory);

        return $this;
    }

    /**
     * Set questions
     *
     * @param ArrayCollection $questions
     * @return Faq
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
     * Add a new question to the Faq
     *
     * @param Question $question
     * @return Faq
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
     * @return Faq
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);

        return $this;
    }
}
