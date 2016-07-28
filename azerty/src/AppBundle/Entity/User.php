<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\OneToMany(targetEntity="Composer", mappedBy="user")
     */
    private $compos;





    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add compo
     *
     * @param \AppBundle\Entity\Composer $compo
     *
     * @return User
     */
    public function addCompo(\AppBundle\Entity\Composer $compo)
    {
        $this->compos[] = $compo;

        return $this;
    }

    /**
     * Remove compo
     *
     * @param \AppBundle\Entity\Composer $compo
     */
    public function removeCompo(\AppBundle\Entity\Composer $compo)
    {
        $this->compos->removeElement($compo);
    }

    /**
     * Get compos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompos()
    {
        return $this->compos;
    }
}
