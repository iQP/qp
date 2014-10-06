<?php

namespace Forms\AnswerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QcmA
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\AnswerBundle\Entity\QcmARepository")
 */
class QcmA
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
     * @ORM\Column(name="answer", type="text")
     */
    private $answer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="correct", type="boolean", nullable=true)
     */
    private $correct;

    /**
     * @ORM\ManyToMany(targetEntity="Forms\QuestionBundle\Entity\QcmQ", mappedBy="qcma", cascade={"persist"})
     */
    private $qcmq;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->qcmq = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set answer
     *
     * @param string $answer
     * @return QcmA
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set correct
     *
     * @param boolean $correct
     * @return QcmA
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return boolean 
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Add qcmq
     *
     * @param \Forms\QuestionBundle\Entity\QcmQ $qcmq
     * @return QcmA
     */
    public function addQcmq(\Forms\QuestionBundle\Entity\QcmQ $qcmq)
    {
        
        $this->qcmq[] = $qcmq;

        return $this;
    }

    /**
     * Remove qcmq
     *
     * @param \Forms\QuestionBundle\Entity\QcmQ $qcmq
     */
    public function removeQcmq(\Forms\QuestionBundle\Entity\QcmQ $qcmq)
    {
        $this->qcmq->removeElement($qcmq);
    }

    /**
     * Get qcmq
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQcmq()
    {
        return $this->qcmq;
    }
}
