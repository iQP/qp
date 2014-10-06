<?php

namespace Forms\AnswerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextA
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forms\AnswerBundle\Entity\TextARepository")
 */
class TextA
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
     * @ORM\Column(name="texta", type="string", length=255, nullable=true)
     */
    private $texta;


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
     * Set texta
     *
     * @param string $texta
     * @return TextA
     */
    public function setTexta($texta)
    {
        $this->texta = $texta;

        return $this;
    }

    /**
     * Get texta
     *
     * @return string 
     */
    public function getTexta()
    {
        return $this->texta;
    }
}
