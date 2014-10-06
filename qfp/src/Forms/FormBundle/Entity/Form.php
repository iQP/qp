<?php

namespace Forms\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Form
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FormBundle\Entity\FormRepository")
 */
class Form
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\FormBundle\Entity\FormCategory")
     */
    private $formCategory;

    /**
     * @ORM\OneToMany(targetEntity="Forms\QuestionBundle\Entity\TextQuestion", mappedBy="form")
     */
    private $textQuestion;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->textQuestion = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Form
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
     * Set formCategory
     *
     * @param \Forms\FormBundle\Entity\FormCategory $formCategory
     * @return Form
     */
    public function setFormCategory(\Forms\FormBundle\Entity\FormCategory $formCategory = null)
    {
        $this->formCategory = $formCategory;

        return $this;
    }

    /**
     * Get formCategory
     *
     * @return \Forms\FormBundle\Entity\FormCategory 
     */
    public function getFormCategory()
    {
        return $this->formCategory;
    }

    /**
     * Add textQuestion
     *
     * @param \Forms\QuestionBundle\Entity\TextQuestion $textQuestion
     * @return Form
     */
    public function addTextQuestion(\Forms\QuestionBundle\Entity\TextQuestion $textQuestion)
    {
        $textQuestion->setForm($this);
        $this->textQuestion[] = $textQuestion;

        return $this;
    }

    /**
     * Remove textQuestion
     *
     * @param \Forms\QuestionBundle\Entity\TextQuestion $textQuestion
     */
    public function removeTextQuestion(\Forms\QuestionBundle\Entity\TextQuestion $textQuestion)
    {
        $this->textQuestion->removeElement($textQuestion);
    }

    /**
     * Get textQuestion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTextQuestion()
    {
        return $this->textQuestion;
    }
}
