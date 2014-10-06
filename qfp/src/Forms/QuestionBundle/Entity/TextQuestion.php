<?php

namespace Forms\QuestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Forms\QuestionBundle\Entity\Question as Question;

/**
 * TextQuestion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\QuestionBundle\Entity\TextQuestionRepository")
 */
class TextQuestion extends Question
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
     * @ORM\ManyToOne(targetEntity="Forms\FormBundle\Entity\Form", inversedBy="textQuestion")
     */
    private $form;

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
     * Set form
     *
     * @param \Forms\FormBundle\Entity\Form $form
     * @return TextQuestion
     */
    public function setForm(\Forms\FormBundle\Entity\Form $form = null)
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
}
