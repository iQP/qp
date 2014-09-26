<?php

namespace Forms\QuestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\QuestionBundle\Entity\QuestionRepository")
 */
class Question
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
     * @ORM\ManyToOne(targetEntity="Forms\FormBundle\Entity\Form", inversedBy="question")
     * @ORM\JoinColumn(nullable=false)
     */
    private $form;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\QuestionBundle\Entity\Type")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;

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
     * @return Question
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
     * Set form
     *
     * @param \Forms\FormBundle\Entity\Form $form
     * @return Question
     */
    public function setForm(\Forms\FormBundle\Entity\Form $form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \Forms\FormBundle\Entity\Form 
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set type
     *
     * @param \Forms\QuestionBundle\Entity\Type $type
     * @return Question
     */
    public function setType(\Forms\QuestionBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Forms\QuestionBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }
}
