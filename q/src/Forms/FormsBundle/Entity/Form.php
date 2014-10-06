<?php

namespace Forms\FormsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Form
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FormsBundle\Entity\FormRepository")
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
     * @ORM\ManyToOne(targetEntity="Forms\FormsBundle\Entity\FormCategory")
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
     * Set formCategory
     *
     * @param \Forms\FormsBundle\Entity\FormCategory $formCategory
     * @return Form
     */
    public function setFormCategory(\Forms\FormsBundle\Entity\FormCategory $formCategory = null)
    {
        $this->formCategory = $formCategory;

        return $this;
    }

    /**
     * Get formCategory
     *
     * @return \Forms\FormsBundle\Entity\FormCategory 
     */
    public function getFormCategory()
    {
        return $this->formCategory;
    }
}
