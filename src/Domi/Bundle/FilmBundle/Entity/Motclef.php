<?php

namespace Domi\Bundle\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motclef
 *
 * @ORM\Table(name="motclef")
 * @ORM\Entity
 */
class Motclef
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text", nullable=true)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Motclef", inversedBy="motclef")
     * @ORM\JoinTable(name="caracterise",
     *   joinColumns={
     *     @ORM\JoinColumn(name="motclef_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     *   }
     * )
     */
    private $film;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->film = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Motclef
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add film
     *
     * @param \Domi\Bundle\FilmBundle\Entity\Motclef $film
     * @return Motclef
     */
    public function addFilm(\Domi\Bundle\FilmBundle\Entity\Motclef $film)
    {
        $this->film[] = $film;

        return $this;
    }

    /**
     * Remove film
     *
     * @param \Domi\Bundle\FilmBundle\Entity\Motclef $film
     */
    public function removeFilm(\Domi\Bundle\FilmBundle\Entity\Motclef $film)
    {
        $this->film->removeElement($film);
    }

    /**
     * Get film
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilm()
    {
        return $this->film;
    }
}
