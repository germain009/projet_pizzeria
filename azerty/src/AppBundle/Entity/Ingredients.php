<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredients
 *
 * @ORM\Table(name="ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientsRepository")
 */
class Ingredients
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
     * @ORM\ManyToMany(targetEntity="Composer", mappedBy="ingredients")
     */
    private $compo;



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
     * @return Ingredients
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
     * Constructor
     */
    public function __construct()
    {
        $this->compo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add compo
     *
     * @param \AppBundle\Entity\Composer $compo
     *
     * @return Ingredients
     */
    public function addCompo(\AppBundle\Entity\Composer $compo)
    {
        $this->compo[] = $compo;

        return $this;
    }

    /**
     * Remove compo
     *
     * @param \AppBundle\Entity\Composer $compo
     */
    public function removeCompo(\AppBundle\Entity\Composer $compo)
    {
        $this->compo->removeElement($compo);
    }

    /**
     * Get compo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompo()
    {
        return $this->compo;
    }
}
