<?php

namespace Forms\FilterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormTime
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\FilterBundle\Entity\FormTimeRepository")
 */
class FormTime
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
     * @var \DateTime
     *
     * @ORM\Column(name="length", type="time")
     */
    private $length;


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
     * Set length
     *
     * @param \DateTime $length
     * @return FormTime
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return \DateTime 
     */
    public function getLength()
    {
        return $this->length;
    }
}
