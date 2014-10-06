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
     * @ORM\ManyToOne(targetEntity="Forms\FilterBundle\Entity\FormCategory")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Forms\QuestionBundle\Entity\TextQ", inversedBy="form", cascade={"persist"})
     */
    private $textq;

    /**
     * @ORM\ManyToMany(targetEntity="Forms\QuestionBundle\Entity\QcmQ", inversedBy="form", cascade={"persist"})
     */
    private $qcmq;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\FilterBundle\Entity\FormTime", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $length;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->textq = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add textq
     *
     * @param \Forms\QuestionBundle\Entity\TextQ $textq
     * @return Form
     */
    public function addTextq(\Forms\QuestionBundle\Entity\TextQ $textq)
    {
        $this->textq[] = $textq;

        return $this;
    }

    /**
     * Remove textq
     *
     * @param \Forms\QuestionBundle\Entity\TextQ $textq
     */
    public function removeTextq(\Forms\QuestionBundle\Entity\TextQ $textq)
    {
        $this->textq->removeElement($textq);
    }

    /**
     * Get textq
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTextq()
    {
        return $this->textq;
    }

    /**
     * Add qcmq
     *
     * @param \Forms\QuestionBundle\Entity\QcmQ $qcmq
     * @return Form
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

    /**
     * Set category
     *
     * @param \Forms\FilterBundle\Entity\FormCategory $category
     * @return Form
     */
    public function setCategory(\Forms\FilterBundle\Entity\FormCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Forms\FilterBundle\Entity\FormCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set length
     *
     * @param \Forms\FilterBundle\Entity\FormTime $length
     * @return Form
     */
    public function setLength(\Forms\FilterBundle\Entity\FormTime $length = null)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return \Forms\FilterBundle\Entity\FormTime 
     */
    public function getLength()
    {
        return $this->length;
    }
}
