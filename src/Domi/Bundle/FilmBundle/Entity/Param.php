<?php

namespace Domi\Bundle\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Param
 *
 * @ORM\Table(name="param")
 * @ORM\Entity
 */
class Param
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
     * @ORM\Column(name="usedin", type="string", length=32, nullable=true)
     */
    private $usedin;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=32, nullable=true)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="valeur", type="integer", nullable=true)
     */
    private $valeur;



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
     * Set usedin
     *
     * @param string $usedin
     * @return Param
     */
    public function setUsedin($usedin)
    {
        $this->usedin = $usedin;

        return $this;
    }

    /**
     * Get usedin
     *
     * @return string 
     */
    public function getUsedin()
    {
        return $this->usedin;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Param
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
     * Set valeur
     *
     * @param integer $valeur
     * @return Param
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
    }
}
