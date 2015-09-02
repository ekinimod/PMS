<?php

	namespace Domi\Bundle\FilmBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	//@Formatter off
	/**
	 * Film
	 *
	 * @ORM\Table(  name="film",
	 *              indexes={
	 *                          @ORM\Index(name="notevideo_fk", columns={"notevideo_id"}),
	 *                          @ORM\Index(name="notefilm_fk", columns={"notefilm_id"}),
	 *                          @ORM\Index(name="genre_fk",columns={"genre_id"}),
	 *                          @ORM\Index(name="langue_fk",columns={"langue_id"}),
	 *                          @ORM\Index(name="FK_films_public", columns={"spectateur_id"})
	 *                      },
	 *                      options={"comment":"Les Films"})
	 *          )
	 * @ORM\Entity
	 * @ORM\HasLifecycleCallbacks
	 */
	//@Formatter off
	class Film {
		/**
		 * @ORM\PostPersist
		 */
		public function to_Do_au_prePersist () {
			// @TODO Ajouter traitement Timestamp sur entité
			if(!$this->getCreeLe())
			{
				$this->creeLe = new \DateTime();
			}
			if(!$this->getCreePar())
			{
				$this->creePar = "MOI";
			}
		}

		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer", nullable=false,options={"comment":"identifiant unique"}))
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="IDENTITY")
		 */
		private $id;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="libelle", type="string", length=64, nullable=true,options={"comment":"libelle "}))
		 */
		private $libelle;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="titre", type="string", length=64, nullable=true,options={"comment":"titre "})))
		 */
		private $titre;

		/**
		 * @var \DateTime
		 *
		 * @ORM\Column(name="duree", type="time", nullable=true,options={"comment":"duree "})))
		 */
		private $duree;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="codec", type="string", length=32, nullable=true,options={"comment":"codec "})))
		 */
		private $codec;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="fichier", type="string", length=32, nullable=true,options={"comment":"fichier "})))
		 */
		private $fichier;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="image", type="string", length=255, nullable=true,options={"comment":"image "})))
		 */
		private $image;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="description", type="text", nullable=true,options={"comment":"description "})))
		 */
		private $description;

		/**
		 * @var integer
		 *
		 * @ORM\Column(name="gravee", type="integer", nullable=true,options={"comment":"Gravé O/N"})))
		 */
		private $gravee;


		/**
		 * @var integer
		 *
		 * @ORM\Column(name="cree_par", type="string", length=50, nullable=false,options={"comment":"Crée par"})))
		 */
		private $creePar;
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="cree_le", type="datetime", nullable=false,options={"comment":"Crée le"})))
		 */
		private $creeLe;
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="modif_par", type="string", length=50, nullable=true,options={"comment":"Modifié par"})))
		 */
		private $modifPar;
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="modif_le", type="datetime", nullable=true,options={"comment":"Modifié le"})))
		 */
		private $modifLe;

		/**
		 * @var \Langue
		 *
		 * @ORM\ManyToOne(targetEntity="Langue")
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="langue_id", referencedColumnName="id")
		 * })
		 */
		private $langue;

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
		 * @var \Notefilm
		 *
		 * @ORM\ManyToOne(targetEntity="Notefilm")
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="notefilm_id", referencedColumnName="id")
		 * })
		 */
		private $notefilm;

		/**
		 * @var \Notevideo
		 *
		 * @ORM\ManyToOne(targetEntity="Notevideo")
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="notevideo_id", referencedColumnName="id")
		 * })
		 */
		private $notevideo;

		/**
		 * @var \Spectateur
		 *
		 * @ORM\ManyToOne(targetEntity="Spectateur")
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="spectateur_id", referencedColumnName="id")
		 * })
		 */
		private $spectateur;

		/**
		 * @var \Doctrine\Common\Collections\Collection
		 *
		 * @ORM\ManyToMany(targetEntity="Intervenant", inversedBy="film")
		 * @ORM\JoinTable(name="jouedans",
		 *   joinColumns={
		 *     @ORM\JoinColumn(name="film_id", referencedColumnName="id")
		 *   },
		 *   inverseJoinColumns={
		 *     @ORM\JoinColumn(name="intervenant_id", referencedColumnName="id")
		 *   }
		 * )
		 */
		private $intervenant;

		/**
		 * Constructor
		 */
		public function __construct() {
			$this->intervenant = new \Doctrine\Common\Collections\ArrayCollection();
		}


		/**
		 * Get id
		 *
		 * @return integer
		 */
		public function getId() {
			return $this->id;
		}

		/**
		 * Set libelle
		 *
		 * @param string $libelle
		 *
		 * @return Film
		 */
		public function setLibelle($libelle) {
			$this->libelle = $libelle;

			return $this;
		}

		/**
		 * Get libelle
		 *
		 * @return string
		 */
		public function getLibelle() {
			return $this->libelle;
		}

		/**
		 * Set titre
		 *
		 * @param string $titre
		 *
		 * @return Film
		 */
		public function setTitre($titre) {
			$this->titre = $titre;

			return $this;
		}

		/**
		 * Get titre
		 *
		 * @return string
		 */
		public function getTitre() {
			return $this->titre;
		}

		/**
		 * Set duree
		 *
		 * @param \DateTime $duree
		 *
		 * @return Film
		 */
		public function setDuree($duree) {
			$this->duree = $duree;

			return $this;
		}

		/**
		 * Get duree
		 *
		 * @return \DateTime
		 */
		public function getDuree() {
			return $this->duree;
		}

		/**
		 * Set codec
		 *
		 * @param string $codec
		 *
		 * @return Film
		 */
		public function setCodec($codec) {
			$this->codec = $codec;

			return $this;
		}

		/**
		 * Get codec
		 *
		 * @return string
		 */
		public function getCodec() {
			return $this->codec;
		}

		/**
		 * Set fichier
		 *
		 * @param string $fichier
		 *
		 * @return Film
		 */
		public function setFichier($fichier) {
			$this->fichier = $fichier;

			return $this;
		}

		/**
		 * Get fichier
		 *
		 * @return string
		 */
		public function getFichier() {
			return $this->fichier;
		}

		/**
		 * Set image
		 *
		 * @param string $image
		 *
		 * @return Film
		 */
		public function setImage($image) {
			$this->image = $image;

			return $this;
		}

		/**
		 * Get image
		 *
		 * @return string
		 */
		public function getImage() {
			return $this->image;
		}

		/**
		 * Set description
		 *
		 * @param string $description
		 *
		 * @return Film
		 */
		public function setDescription($description) {
			$this->description = $description;

			return $this;
		}

		/**
		 * Get description
		 *
		 * @return string
		 */
		public function getDescription() {
			return $this->description;
		}

		/**
		 * Set gravee
		 *
		 * @param integer $gravee
		 *
		 * @return Film
		 */
		public function setGravee($gravee) {
			$this->gravee = $gravee;

			return $this;
		}

		/**
		 * Get gravee
		 *
		 * @return integer
		 */
		public function getGravee() {
			return $this->gravee;
		}

		/**
		 * @return int
		 */
		public function getCreePar() {
			return $this->creePar;
		}

		/**
		 * @return int
		 */
		public function getCreeLe() {
			return $this->creeLe;
		}

		/**
		 * @return int
		 */
		public function getModifPar() {
			return $this->modifPar;
		}

		/**
		 * @return int
		 */
		public function getModifLe() {
			return $this->modifLe;
		}

		/**
		 * @param int $creePar
		 */
		public function setCreePar($creePar) {
			$this->creePar = $creePar;
		}

		/**
		 * @param int $creeLe
		 */
		public function setCreeLe($creeLe) {
			$this->creeLe = $creeLe;
		}

		/**
		 * @param int $modifPar
		 */
		public function setModifPar($modifPar) {
			$this->modifPar = $modifPar;
		}

		/**
		 * @param int $modifLe
		 */
		public function setModifLe($modifLe) {
			$this->modifLe = $modifLe;
		}

		/**
		 * Set langue
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Langue $langue
		 *
		 * @return Film
		 */
		public function setLangue(\Domi\Bundle\FilmBundle\Entity\Langue $langue = null) {
			$this->langue = $langue;

			return $this;
		}

		/**
		 * Get langue
		 *
		 * @return \Domi\Bundle\FilmBundle\Entity\Langue
		 */
		public function getLangue() {
			return $this->langue;
		}

		/**
		 * Set genre
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Genre $genre
		 *
		 * @return Film
		 */
		public function setGenre(\Domi\Bundle\FilmBundle\Entity\Genre $genre = null) {
			$this->genre = $genre;

			return $this;
		}

		/**
		 * Get genre
		 *
		 * @return \Domi\Bundle\FilmBundle\Entity\Genre
		 */
		public function getGenre() {
			return $this->genre;
		}

		/**
		 * Set notefilm
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Notefilm $notefilm
		 *
		 * @return Film
		 */
		public function setNotefilm(\Domi\Bundle\FilmBundle\Entity\Notefilm $notefilm = null) {
			$this->notefilm = $notefilm;

			return $this;
		}

		/**
		 * Get notefilm
		 *
		 * @return \Domi\Bundle\FilmBundle\Entity\Notefilm
		 */
		public function getNotefilm() {
			return $this->notefilm;
		}

		/**
		 * Set notevideo
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Notevideo $notevideo
		 *
		 * @return Film
		 */
		public function setNotevideo(\Domi\Bundle\FilmBundle\Entity\Notevideo $notevideo = null) {
			$this->notevideo = $notevideo;

			return $this;
		}

		/**
		 * Get notevideo
		 *
		 * @return \Domi\Bundle\FilmBundle\Entity\Notevideo
		 */
		public function getNotevideo() {
			return $this->notevideo;
		}

		/**
		 * Set spectateur
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Spectateur $spectateur
		 *
		 * @return Film
		 */
		public function setSpectateur(\Domi\Bundle\FilmBundle\Entity\Spectateur $spectateur = null) {
			$this->spectateur = $spectateur;

			return $this;
		}

		/**
		 * Get spectateur
		 *
		 * @return \Domi\Bundle\FilmBundle\Entity\Spectateur
		 */
		public function getSpectateur() {
			return $this->spectateur;
		}

		/**
		 * Add intervenant
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Intervenant $intervenant
		 *
		 * @return Film
		 */
		public function addIntervenant(\Domi\Bundle\FilmBundle\Entity\Intervenant $intervenant) {
			$this->intervenant[] = $intervenant;

			return $this;
		}

		/**
		 * Remove intervenant
		 *
		 * @param \Domi\Bundle\FilmBundle\Entity\Intervenant $intervenant
		 */
		public function removeIntervenant(\Domi\Bundle\FilmBundle\Entity\Intervenant $intervenant) {
			$this->intervenant->removeElement($intervenant);
		}

		/**
		 * Get intervenant
		 *
		 * @return \Doctrine\Common\Collections\Collection
		 */
		public function getIntervenant() {
			return $this->intervenant;
		}
	}
