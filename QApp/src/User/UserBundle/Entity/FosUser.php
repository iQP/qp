<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * FosUser
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="User\UserBundle\Entity\FosUserRepository")
 */
class FosUser extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="User\GroupBundle\Entity\FosGroup")
     * @ORM\JoinTable(joinColumns={@ORM\JoinColumn(
     *      name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $fosGroups;

    public function __construct()
    {
        parent::__construct();
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
     * Add fosGroups
     *
     * @param \User\GroupBundle\Entity\FosGroup $fosGroups
     * @return FosUser
     */
    public function addFosGroup(\User\GroupBundle\Entity\FosGroup $fosGroups)
    {
        $this->fosGroups[] = $fosGroups;

        return $this;
    }

    /**
     * Remove fosGroups
     *
     * @param \User\GroupBundle\Entity\FosGroup $fosGroups
     */
    public function removeFosGroup(\User\GroupBundle\Entity\FosGroup $fosGroups)
    {
        $this->fosGroups->removeElement($fosGroups);
    }

    /**
     * Get fosGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFosGroups()
    {
        return $this->fosGroups;
    }
}
