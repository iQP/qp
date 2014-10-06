<?php

namespace Forms\QuestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QcmQ
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\QuestionBundle\Entity\QcmQRepository")
 */
class QcmQ
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
     * @ORM\ManyToMany(targetEntity="Forms\AnswerBundle\Entity\QcmA", inversedBy="qcmq", cascade={"persist"})
     */
    private $qcma;

    /**
     * @ORM\ManyToMany(targetEntity="Forms\FormBundle\Entity\Form", mappedBy="textq", cascade={"persist"})
     */
    private $form;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\FilterBundle\Entity\QuestionCategory")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->qcma = new \Doctrine\Common\Collections\ArrayCollection();
        $this->form = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set question
     *
     * @param string $question
     * @return QcmQ
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
     * Add qcma
     *
     * @param \Forms\AnswerBundle\Entity\QcmA $qcma
     * @return QcmQ
     */
    public function addQcmum(\Forms\AnswerBundle\Entity\QcmA $qcma)
    {
        $qcma->addQcmq($this);
        $this->qcma[] = $qcma;

        return $this;
    }

    /**
     * Remove qcma
     *
     * @param \Forms\AnswerBundle\Entity\QcmA $qcma
     */
    public function removeQcmum(\Forms\AnswerBundle\Entity\QcmA $qcma)
    {
        $this->qcma->removeElement($qcma);
    }

    /**
     * Get qcma
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQcma()
    {
        return $this->qcma;
    }

    /**
     * Add form
     *
     * @param \Forms\FormBundle\Entity\Form $form
     * @return QcmQ
     */
    public function addForm(\Forms\FormBundle\Entity\Form $form)
    {
        $form->addQcmQ($this);
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
     * Add qcma
     *
     * @param \Forms\AnswerBundle\Entity\QcmA $qcma
     * @return QcmQ
     */
    public function addQcma(\Forms\AnswerBundle\Entity\QcmA $qcma)
    {
        $this->qcma[] = $qcma;

        return $this;
    }

    /**
     * Remove qcma
     *
     * @param \Forms\AnswerBundle\Entity\QcmA $qcma
     */
    public function removeQcma(\Forms\AnswerBundle\Entity\QcmA $qcma)
    {
        $this->qcma->removeElement($qcma);
    }

    /**
     * Set category
     *
     * @param \Forms\FilterBundle\Entity\QuestionCategory $category
     * @return QcmQ
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
