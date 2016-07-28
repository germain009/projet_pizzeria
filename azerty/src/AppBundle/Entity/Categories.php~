<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriesRepository")
 */
class Categories
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
     * @ORM\OneToMany(targetEntity="Pizza", mappedBy="category")
     */
    private $pizzas;



    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set photo
     *
     * @param string $photo
     *
     * @return Categories
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Categories
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
     * Constructor
     */
    public function __construct()
    {
        $this->pizzas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pizza
     *
     * @param \AppBundle\Entity\Pizza $pizza
     *
     * @return Categories
     */
    public function addPizza(\AppBundle\Entity\Pizza $pizza)
    {
        $this->pizzas[] = $pizza;

        return $this;
    }

    /**
     * Remove pizza
     *
     * @param \AppBundle\Entity\Pizza $pizza
     */
    public function removePizza(\AppBundle\Entity\Pizza $pizza)
    {
        $this->pizzas->removeElement($pizza);
    }

    /**
     * Get pizzas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPizzas()
    {
        return $this->pizzas;
    }
}
