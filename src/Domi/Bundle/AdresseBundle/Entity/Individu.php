<?php

	namespace Domi\Bundle\AdresseBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
	use Symfony\Component\Validator\Constraints as Assert;

//@Formatter off
	/**
	 * Individu
	 *
	 * @ORM\Table(name="individu"),
	 *  options={"comment":"Les individus"})
	 *
	 * @ORM\Entity
	 */
//@Formatter on
	class Individu {
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer", nullable=false,
		 *                  options={"comment":"identifiant unique Individu"})
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="IDENTITY")
		 */
		private $id;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="nom", type="string", length=55, nullable=true,options={"comment":"nom"})
		 */
		private $nom;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="prenom", type="string", length=55, nullable=true,options={"comment":"prenom"})
		 */
		private $prenom;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="email", type="string", length=55, nullable=true,options={"comment":"adresse eMail"})
		 */
		private $email;

		/**
		 * @var \Doctrine\Common\Collections\Collection
		 *
		 * @Assert\Type(type="DomiAdresseBundle:Adresse")
		 * @Assert\Valid()
		 *
		 * @ORM\ManyToMany(targetEntity="Adresse")
		 * @ORM\JoinTable(name="individu_adresse",
		 *      joinColumns={@ORM\JoinColumn(name="individu_id", referencedColumnName="id")},
		 *      inverseJoinColumns={@ORM\JoinColumn(name="adresse_id", referencedColumnName="id")}
		 *      )
		 */
		private $adresse;

		/**
		 * **********************
		 *  Constructeur
		 * **********************
		 */

		public function __construct() {
			$this->adresse = new \Doctrine\Common\Collections\ArrayCollection();
		}


		/**
		 * Add adresse
		 *
		 * @param \Domi\Bundle\AdresseBundle\Entity\Adresse $adresse
		 *
		 * @return Individu
		 */
		public function addAdresse(\Domi\Bundle\AdresseBundle\Entity\Adresse $adresse = null) {
			$this->adresse[] = $adresse;

			return $this;
		}

		/**
		 * Remove adresse
		 *
		 * @param \Domi\Bundle\AdresseBundle\Entity\Adresse $adresse
		 */
		public function removeAdresse(\Domi\Bundle\AdresseBundle\Entity\Adresse $adresse) {
			$this->adresse->removeElement($adresse);
		}

		/**
		 * Get adresse
		 *
		 * @return \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
		 */
		public function getAdresse() {
			return $this->adresse;
		}
		/**
		 * @param \Doctrine\Common\Collections\Collection $adresse
		 */
		public function setAdresse($adresse) {
			$this->adresse = $adresse;
		}

		/**
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
		public function getNom() {
			return $this->nom;
		}

		/**
		 * @return string
		 */
		public function getPrenom() {
			return $this->prenom;
		}

		/**
		 * @return string
		 */
		public function getEmail() {
			return $this->email;
		}

		/**
		 *  Setters
		 */

		/**
		 * @param int $id
		 */
		public function setId($id) {
			$this->id = $id;
		}

		/**
		 * @param string $nom
		 */
		public function setNom($nom) {
			$this->nom = $nom;
		}

		/**
		 * @param string $prenom
		 */
		public function setPrenom($prenom) {
			$this->prenom = $prenom;
		}

		/**
		 * @param string $email
		 */
		public function setEmail($email) {
			$this->email = $email;
		}






	}
