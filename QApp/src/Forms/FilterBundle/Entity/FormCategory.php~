<?php

namespace Forms\FilterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormCategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FilterBundle\Entity\FormCategoryRepository")
 */
class FormCategory
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
     * @ORM\ManyToOne(targetEntity="Forms\FilterBundle\Entity\FormDomain", inversedBy="formCategory")
     */
    private $formDomain;


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
     * @return FormCategory
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
     * Set formDomain
     *
     * @param \Forms\FilterBundle\Entity\FormDomain $formDomain
     * @return FormCategory
     */
    public function setFormDomain(\Forms\FilterBundle\Entity\FormDomain $formDomain = null)
    {
        $this->formDomain = $formDomain;

        return $this;
    }

    /**
     * Get formDomain
     *
     * @return \Forms\FilterBundle\Entity\FormDomain 
     */
    public function getFormDomain()
    {
        return $this->formDomain;
    }
}
