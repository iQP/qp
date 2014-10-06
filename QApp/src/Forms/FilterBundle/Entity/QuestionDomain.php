<?php

namespace Forms\FilterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionDomain
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FilterBundle\Entity\QuestionDomainRepository")
 */
class QuestionDomain
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
     * @ORM\Column(name="domain", type="string", length=255)
     */
    private $domain;

    /**
     * @ORM\OneToMany(targetEntity="Forms\FilterBundle\Entity\QuestionCategory", mappedBy="questionDomain")
     */
    private $questionCategory;


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
     * Set domain
     *
     * @param string $domain
     * @return QuestionDomain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questionCategory
     *
     * @param \Forms\FilterBundle\Entity\QuestionCategory $questionCategory
     * @return QuestionDomain
     */
    public function addQuestionCategory(\Forms\FilterBundle\Entity\QuestionCategory $questionCategory)
    {
        $this->questionCategory[] = $questionCategory;

        return $this;
    }

    /**
     * Remove questionCategory
     *
     * @param \Forms\FilterBundle\Entity\QuestionCategory $questionCategory
     */
    public function removeQuestionCategory(\Forms\FilterBundle\Entity\QuestionCategory $questionCategory)
    {
        $this->questionCategory->removeElement($questionCategory);
    }

    /**
     * Get questionCategory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestionCategory()
    {
        return $this->questionCategory;
    }
}
