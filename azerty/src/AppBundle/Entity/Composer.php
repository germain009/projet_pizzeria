<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="composer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComposerRepository")
 */
class Composer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="compos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;



    /**
     * @ORM\ManyToOne(targetEntity="Pate")
     * @ORM\JoinColumn(name="pate_id", referencedColumnName="id")
     */
    private $pate;


    /**
     * @ORM\ManyToOne(targetEntity="Base")
     * @ORM\JoinColumn(name="base_id", referencedColumnName="id")
     */
    private $base;


    /**
     * @ORM\ManyToMany(targetEntity="Ingredients", inversedBy="compo")
     * @ORM\JoinTable(name="compo_groups")
     */
    private $ingredients;




    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Composer
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set pate
     *
     * @param \AppBundle\Entity\Pate $pate
     *
     * @return Composer
     */
    public function setPate(\AppBundle\Entity\Pate $pate = null)
    {
        $this->pate = $pate;

        return $this;
    }

    /**
     * Get pate
     *
     * @return \AppBundle\Entity\Pate
     */
    public function getPate()
    {
        return $this->pate;
    }

    /**
     * Set base
     *
     * @param \AppBundle\Entity\Base $base
     *
     * @return Composer
     */
    public function setBase(\AppBundle\Entity\Base $base = null)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * Get base
     *
     * @return \AppBundle\Entity\Base
     */
    public function getBase()
    {
        return $this->base;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\Ingredients $ingredient
     *
     * @return Composer
     */
    public function addIngredient(\AppBundle\Entity\Ingredients $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\Ingredients $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\Ingredients $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Composer
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
