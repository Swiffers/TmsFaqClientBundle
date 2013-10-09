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
}
