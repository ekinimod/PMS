<?php

namespace Domi\Bundle\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervenant
 *
 * @ORM\Table(name="intervenant")
 * @ORM\Entity
 */
class Intervenant
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
     * @ORM\Column(name="nom", type="string", length=32, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=32, nullable=true)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="intervention", type="integer", nullable=true)
     */
    private $intervention;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="intervenant")
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
     * Set nom
     *
     * @param string $nom
     * @return Intervenant
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
     * Set prenom
     *
     * @param string $prenom
     * @return Intervenant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set intervention
     *
     * @param integer $intervention
     * @return Intervenant
     */
    public function setIntervention($intervention)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     *
     * @return integer 
     */
    public function getIntervention()
    {
        return $this->intervention;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Intervenant
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add film
     *
     * @param \Domi\Bundle\FilmBundle\Entity\Film $film
     * @return Intervenant
     */
    public function addFilm(\Domi\Bundle\FilmBundle\Entity\Film $film)
    {
        $this->film[] = $film;

        return $this;
    }

    /**
     * Remove film
     *
     * @param \Domi\Bundle\FilmBundle\Entity\Film $film
     */
    public function removeFilm(\Domi\Bundle\FilmBundle\Entity\Film $film)
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
