<?php

namespace Forms\FilterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormDomain
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FilterBundle\Entity\FormDomainRepository")
 */
class FormDomain
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
     * @ORM\OneToMany(targetEntity="Forms\FilterBundle\Entity\FormCategory", mappedBy="formDomain")
     */
    private $formCategory;


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
     * @return FormDomain
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
        $this->formCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add formCategory
     *
     * @param \Forms\FilterBundle\Entity\FormCategory $formCategory
     * @return FormDomain
     */
    public function addFormCategory(\Forms\FilterBundle\Entity\FormCategory $formCategory)
    {
        $this->formCategory[] = $formCategory;

        return $this;
    }

    /**
     * Remove formCategory
     *
     * @param \Forms\FilterBundle\Entity\FormCategory $formCategory
     */
    public function removeFormCategory(\Forms\FilterBundle\Entity\FormCategory $formCategory)
    {
        $this->formCategory->removeElement($formCategory);
    }

    /**
     * Get formCategory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormCategory()
    {
        return $this->formCategory;
    }
}
