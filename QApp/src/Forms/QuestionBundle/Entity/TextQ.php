<?php

namespace Forms\QuestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextQ
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\QuestionBundle\Entity\TextQRepository")
 */
class TextQ
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
     * @ORM\Column(name="question", type="text")
     */
    private $question;

    /**
     * @ORM\ManyToMany(targetEntity="Forms\FormBundle\Entity\Form", mappedBy="textq", cascade={"persist"})
     */
    private $form;

    /**
     * @ORM\OneToOne(targetEntity="Forms\AnswerBundle\Entity\TextA", cascade={"persist"})
     */
    private $textA;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\FilterBundle\Entity\QuestionCategory")
     */
    private $category;


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
     * Set question
     *
     * @param string $question
     * @return TextQ
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->form = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add form
     *
     * @param \Forms\FormBundle\Entity\Form $form
     * @return TextQ
     */
    public function addForm(\Forms\FormBundle\Entity\Form $form)
    {
        $form->addTextQ($this);
        $this->form[] = $form;

        return $this;
    }

    /**
     * Remove form
     *
     * @param \Forms\FormBundle\Entity\Form $form
     */
    public function removeForm(\Forms\FormBundle\Entity\Form $form)
    {
        $this->form->removeElement($form);
    }

    /**
     * Get form
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set textA
     *
     * @param \Forms\AnswerBundle\Entity\TextA $textA
     * @return TextQ
     */
    public function setTextA(\Forms\AnswerBundle\Entity\TextA $textA = null)
    {
        $this->textA = $textA;

        return $this;
    }

    /**
     * Get textA
     *
     * @return \Forms\AnswerBundle\Entity\TextA 
     */
    public function getTextA()
    {
        return $this->textA;
    }

    /**
     * Set category
     *
     * @param \Forms\FilterBundle\Entity\QuestionCategory $category
     * @return TextQ
     */
    public function setCategory(\Forms\FilterBundle\Entity\QuestionCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Forms\FilterBundle\Entity\QuestionCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
