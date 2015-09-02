<?php

namespace Domi\Bundle\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genre", indexes={@ORM\Index(name="genrepere_fk", columns={"genre_id"})})
 * @ORM\Entity
 */
class Genre
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
     * @ORM\Column(name="libelle", type="string", length=32, nullable=true)
     */
    private $libelle;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     * })
     */
    private $genre;



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
     * @return Genre
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
     * Set genre
     *
     * @param \Domi\Bundle\FilmBundle\Entity\Genre $genre
     * @return Genre
     */
    public function setGenre(\Domi\Bundle\FilmBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \Domi\Bundle\FilmBundle\Entity\Genre 
     */
    public function getGenre()
    {
        return $this->genre;
    }
}
