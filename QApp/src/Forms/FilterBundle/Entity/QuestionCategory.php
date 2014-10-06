<?php

namespace Forms\FilterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionCategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FilterBundle\Entity\QuestionCategoryRepository")
 */
class QuestionCategory
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
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Forms\FilterBundle\Entity\QuestionDomain", inversedBy="questionCategory")
     */
    private $questionDomain;


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
     * Set category
     *
     * @param string $category
     * @return QuestionCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set questionDomain
     *
     * @param \Forms\FilterBundle\Entity\QuestionDomain $questionDomain
     * @return QuestionCategory
     */
    public function setQuestionDomain(\Forms\FilterBundle\Entity\QuestionDomain $questionDomain = null)
    {
        $this->questionDomain = $questionDomain;

        return $this;
    }

    /**
     * Get questionDomain
     *
     * @return \Forms\FilterBundle\Entity\QuestionDomain 
     */
    public function getQuestionDomain()
    {
        return $this->questionDomain;
    }
}
