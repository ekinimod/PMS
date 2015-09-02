<?php

	namespace Domi\Bundle\AdresseBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

//@Formatter off
	/**
	 * Voie
	 *
	 * @ORM\Table(name="voie",
	 *              options={"comment":"Les types de voies"})
	 * @ORM\Entity
	 */
//@Formatter on
	class Voie {
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer", nullable=false,
		 *              options={"comment":"identifiant unique Voie"})
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="IDENTITY")
		 */
		private $id;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="lib_voie", type="string", length=50, nullable=true,
		 *              options={"comment":"libelle voie"})
		 */
		private $libVoie;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="abreviation_voie", type="string", length=4, nullable=true,
		 *              options={"comment":"code abreviation voie"})
		 */
		private $abreviationVoie;

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
		public function getLibVoie() {
			return $this->libVoie;
		}

		/**
		 * @return string
		 */
		public function getAbreviationVoie() {
			return $this->abreviationVoie;
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
		 * @param string $libVoie
		 */
		public function setLibVoie($libVoie) {
			$this->libVoie = $libVoie;
		}

		/**
		 * @param string $abreviationVoie
		 */
		public function setAbreviationVoie($abreviationVoie) {
			$this->abreviationVoie = $abreviationVoie;
		}





	}
