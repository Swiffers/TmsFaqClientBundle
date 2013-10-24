<?php
namespace Tms\Bundle\FaqClientBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 * @author Benjamin TARDY <benjamin.tardy@tessi.fr>
 */
class QuestionCategory
{
    /**
     * Category identifier
     * 
     * @var integer
     */
    protected $id;

    /**
     * Category name
     * 
     * @var string
     */
    protected $name;

    /**
     *Category slug
     * 
     * @var string
     */
    protected $slug;

    /**
     * Category questions 
     * 
     * @var ArrayCollection
     */
    protected $questions;

    /**
     * Category tags
     * 
     * @var Array
     */
    protected $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->tags      = array();
    }

    /**
     * Set id
     *
     * @param  integer $id
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
     * @param  string $name
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
     * Set slug
     *
     * @param  string $slug
     * @return QuestionCategory
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set questions
     *
     * @param  ArrayCollection $questions
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
     * @param  Question $question
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
     * @param  Question $question
     * @return QuestionCategory
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);

        return $this;
    }

    /**
     * Set tags
     *
     * @param  array $tags
     * @return QuestionCategory
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Add a new tag
     *
     * @param  string $name  Tag name
     * @param  string $value Tag value
     * @return QuestionCategory
     */
    public function addTag($name, $value)
    {
        $this->tags[$name] = $value;

        return $this;
    }

    /**
     * Remove an existing tag
     *
     * @param  sting $name Tag name
     * @return QuestionCategory
     */
    public function removeTag($name)
    {
        if (isset($this->tags[$name])) {
            unset($this->tags[$name]);
        }

        return $this;
    }
}
