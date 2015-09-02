<?php

namespace Domi\Bundle\AdresseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

//@Formatter off
/**
 * Ville
 *
 * @ORM\Table(name="ville",
 *      options={"comment":"Les villes"},
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="code_commune_2", columns={"code_commune"})},
 *      indexes={
 *          @ORM\Index(name="departement", columns={"departement"}),
 *          @ORM\Index(name="nom", columns={"nom"}),
 *          @ORM\Index(name="nom_reel", columns={"nom_reel"}),
 *          @ORM\Index(name="code_postal", columns={"code_postal"}),
 *          @ORM\Index(name="longitude_latitude_deg", columns={"longitude_deg", "latitude_deg"}),
 *          @ORM\Index(name="nom_soundex", columns={"nom_soundex"}),
 *          @ORM\Index(name="nom_metaphone", columns={"nom_metaphone"}),
 *          @ORM\Index(name="population_2010", columns={"population_2010"}),
 *          @ORM\Index(name="nom_simple", columns={"nom_simple"})})
 * @ORM\Entity
 */
//@Formatter ofn
class Ville
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false,options={"comment":"identifiant unique Ville"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=3, nullable=true,options={"comment":"lien vers département"})
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true,options={"comment":"slug"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true,options={"comment":"nom"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_simple", type="string", length=45, nullable=true,options={"comment":"nom simple"})
     */
    private $nomSimple;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_reel", type="string", length=45, nullable=true,options={"comment":"nom réel"})
     */
    private $nomReel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_soundex", type="string", length=20, nullable=true,options={"comment":"code phonétique Soundex"})
     */
    private $nomSoundex;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_metaphone", type="string", length=22, nullable=true,options={"comment":"code phonétique Mtaphone"})
     */
    private $nomMetaphone;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=5, nullable=true,options={"comment":"code postal"})
     */
    private $codePostal;

    /**
     * @var integer
     *
     * @ORM\Column(name="commune", type="string", length=3, nullable=true,options={"comment":"no de commune"})
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="code_commune", type="string", length=5, nullable=true,options={"comment":"code commune"})
     */
    private $codeCommune;

    /**
     * @var integer
     *
     * @ORM\Column(name="arrondissement", type="integer", nullable=true,options={"comment":"nombre arrondissement"})
     */
    private $arrondissement;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="canton", type="integer", nullable=true,options={"comment":"lien vers No de canton"})
	 */
	private $canton;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="amdi", type="string", nullable=true,options={"comment":"amdi"})
	 */
	private $amdi;
    /**
     * @var integer
     *
     * @ORM\Column(name="population_2010", type="integer", nullable=true,options={"comment":"population recensement 2010"})
     */
    private $population2010;

    /**
     * @var integer
     *
     * @ORM\Column(name="population_1999", type="integer", nullable=true,options={"comment":"population recensement 1999"})
     */
    private $population1999;

    /**
     * @var integer
     *
     * @ORM\Column(name="population_2012", type="integer", nullable=true,options={"comment":"population recensement 2012"})
     */
    private $population2012;

    /**
     * @var integer
     *
     * @ORM\Column(name="densite_2010", type="integer", nullable=true,options={"comment":"densite recensement 2010"})
     */
    private $densite2010;

    /**
     * @var float
     *
     * @ORM\Column(name="surface", type="float", precision=10, scale=0, nullable=true,options={"comment":"surface"})
     */
    private $surface;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude_deg", type="float", precision=10, scale=0, nullable=true,options={"comment":"longitude en Degré"})
     */
    private $longitudeDeg;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude_deg", type="float", precision=10, scale=0, nullable=true,options={"comment":"latitude en Degré"})
     */
    private $latitudeDeg;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude_grd", type="string", length=9, nullable=true,options={"comment":"longitude en Grade"})
     */
    private $longitudeGrd;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude_grd", type="string", length=8, nullable=true,options={"comment":"latitude en Grade"})
     */
    private $latitudeGrd;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude_dms", type="string", length=9, nullable=true,options={"comment":"longitude en Degré Minute Seconde"})
     */
    private $longitudeDms;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude_dms", type="string", length=8, nullable=true,options={"comment":"latitude en Degré Minute Seconde"})
     */
    private $latitudeDms;

    /**
     * @var integer
     *
     * @ORM\Column(name="zmin", type="integer", nullable=true,options={"comment":"altitude minimum"})
     */
    private $zmin;

    /**
     * @var integer
     *
     * @ORM\Column(name="zmax", type="integer", nullable=true,options={"comment":"altitude maximum"})
     */
    private $zmax;

	/**
	 * **********************
	 *  Getters
	 * **********************
	 */


	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getDepartement() {
		return $this->departement;
	}

	/**
	 * @return string
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * @return string
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * @return string
	 */
	public function getNomSimple() {
		return $this->nomSimple;
	}

	/**
	 * @return string
	 */
	public function getNomReel() {
		return $this->nomReel;
	}

	/**
	 * @return string
	 */
	public function getNomSoundex() {
		return $this->nomSoundex;
	}

	/**
	 * @return string
	 */
	public function getNomMetaphone() {
		return $this->nomMetaphone;
	}

	/**
	 * @return string
	 */
	public function getCodePostal() {
		return $this->codePostal;
	}

	/**
	 * @return int
	 */
	public function getCommune() {
		return $this->commune;
	}

	/**
	 * @return string
	 */
	public function getCodeCommune() {
		return $this->codeCommune;
	}

	/**
	 * @return int
	 */
	public function getArrondissement() {
		return $this->arrondissement;
	}

	/**
	 * @return string
	 */
	public function getCanton() {
		return $this->canton;
	}

	/**
	 * @return int
	 */
	public function getAmdi() {
		return $this->amdi;
	}

	/**
	 * @return int
	 */
	public function getPopulation2010() {
		return $this->population2010;
	}

	/**
	 * @return int
	 */
	public function getPopulation1999() {
		return $this->population1999;
	}

	/**
	 * @return int
	 */
	public function getPopulation2012() {
		return $this->population2012;
	}

	/**
	 * @return int
	 */
	public function getDensite2010() {
		return $this->densite2010;
	}

	/**
	 * @return float
	 */
	public function getSurface() {
		return $this->surface;
	}

	/**
	 * @return float
	 */
	public function getLongitudeDeg() {
		return $this->longitudeDeg;
	}

	/**
	 * @return float
	 */
	public function getLatitudeDeg() {
		return $this->latitudeDeg;
	}

	/**
	 * @return string
	 */
	public function getLongitudeGrd() {
		return $this->longitudeGrd;
	}

	/**
	 * @return string
	 */
	public function getLatitudeGrd() {
		return $this->latitudeGrd;
	}

	/**
	 * @return string
	 */
	public function getLongitudeDms() {
		return $this->longitudeDms;
	}

	/**
	 * @return string
	 */
	public function getLatitudeDms() {
		return $this->latitudeDms;
	}

	/**
	 * @return int
	 */
	public function getZmin() {
		return $this->zmin;
	}

	/**
	 * @return int
	 */
	public function getZmax() {
		return $this->zmax;
	}

	/**
	 * **********************
	 *  Setters
	 * **********************
	 */

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param string $departement
	 */
	public function setDepartement($departement) {
		$this->departement = $departement;
	}

	/**
	 * @param string $slug
	 */
	public function setSlug($slug) {
		$this->slug = $slug;
	}

	/**
	 * @param string $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

	/**
	 * @param string $nomSimple
	 */
	public function setNomSimple($nomSimple) {
		$this->nomSimple = $nomSimple;
	}

	/**
	 * @param string $nomReel
	 */
	public function setNomReel($nomReel) {
		$this->nomReel = $nomReel;
	}

	/**
	 * @param string $nomSoundex
	 */
	public function setNomSoundex($nomSoundex) {
		$this->nomSoundex = $nomSoundex;
	}

	/**
	 * @param string $nomMetaphone
	 */
	public function setNomMetaphone($nomMetaphone) {
		$this->nomMetaphone = $nomMetaphone;
	}

	/**
	 * @param string $codePostal
	 */
	public function setCodePostal($codePostal) {
		$this->codePostal = $codePostal;
	}

	/**
	 * @param int $commune
	 */
	public function setCommune($commune) {
		$this->commune = $commune;
	}

	/**
	 * @param string $codeCommune
	 */
	public function setCodeCommune($codeCommune) {
		$this->codeCommune = $codeCommune;
	}

	/**
	 * @param int $arrondissement
	 */
	public function setArrondissement($arrondissement) {
		$this->arrondissement = $arrondissement;
	}

	/**
	 * @param string $canton
	 */
	public function setCanton($canton) {
		$this->canton = $canton;
	}

	/**
	 * @param int $amdi
	 */
	public function setAmdi($amdi) {
		$this->amdi = $amdi;
	}

	/**
	 * @param int $population2010
	 */
	public function setPopulation2010($population2010) {
		$this->population2010 = $population2010;
	}

	/**
	 * @param int $population1999
	 */
	public function setPopulation1999($population1999) {
		$this->population1999 = $population1999;
	}

	/**
	 * @param int $population2012
	 */
	public function setPopulation2012($population2012) {
		$this->population2012 = $population2012;
	}

	/**
	 * @param int $densite2010
	 */
	public function setDensite2010($densite2010) {
		$this->densite2010 = $densite2010;
	}

	/**
	 * @param float $surface
	 */
	public function setSurface($surface) {
		$this->surface = $surface;
	}

	/**
	 * @param float $longitudeDeg
	 */
	public function setLongitudeDeg($longitudeDeg) {
		$this->longitudeDeg = $longitudeDeg;
	}

	/**
	 * @param float $latitudeDeg
	 */
	public function setLatitudeDeg($latitudeDeg) {
		$this->latitudeDeg = $latitudeDeg;
	}

	/**
	 * @param string $longitudeGrd
	 */
	public function setLongitudeGrd($longitudeGrd) {
		$this->longitudeGrd = $longitudeGrd;
	}

	/**
	 * @param string $latitudeGrd
	 */
	public function setLatitudeGrd($latitudeGrd) {
		$this->latitudeGrd = $latitudeGrd;
	}

	/**
	 * @param string $longitudeDms
	 */
	public function setLongitudeDms($longitudeDms) {
		$this->longitudeDms = $longitudeDms;
	}

	/**
	 * @param string $latitudeDms
	 */
	public function setLatitudeDms($latitudeDms) {
		$this->latitudeDms = $latitudeDms;
	}

	/**
	 * @param int $zmin
	 */
	public function setZmin($zmin) {
		$this->zmin = $zmin;
	}

	/**
	 * @param int $zmax
	 */
	public function setZmax($zmax) {
		$this->zmax = $zmax;
	}


}
