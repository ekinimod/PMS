<?php

	namespace Domi\Bundle\AdresseBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

//@Formatter off
	/**
	 * Pays
	 *
	 * @ORM\Table(  name="pays",
	 *              options={"comment":"Les pays"},
	 *              uniqueConstraints={
	 *                      @ORM\UniqueConstraint(name="alpha2", columns={"alpha2"}),
	 *                      @ORM\UniqueConstraint(name="alpha3", columns={"alpha3"}),
	 *                      @ORM\UniqueConstraint(name="code_unique", columns={"code"}),
	 *                      @ORM\UniqueConstraint(name="nom_fr_unique", columns={"nom_fr_fr"})})
	 * @ORM\Entity
	 */
//@Formatter on
	class Pays {
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer", nullable=false,options={"comment":"identifiant unique Pays"})
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="IDENTITY")
		 */
		private $id;

		/**
		 * @var integer
		 *
		 * @ORM\Column(name="code", type="integer", nullable=false,options={"comment":"code iso du pays"})
		 */
		private $code;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="alpha2", type="string", length=2, nullable=false,options={"comment":"digramme"})
		 */
		private $alpha2;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="alpha3", type="string", length=3, nullable=false,options={"comment":"trigramme"})
		 */
		private $alpha3;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="nom_en_gb", type="string", length=45, nullable=true,options={"comment":"nom Anglais"})
		 */
		private $nomEnGb;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="nom_fr_fr", type="string", length=45, nullable=false,options={"comment":"nom francais"})
		 */
		private $nomFrFr;

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
		 * @return int
		 */
		public function getCode() {
			return $this->code;
		}

		/**
		 * @return string
		 */
		public function getAlpha2() {
			return $this->alpha2;
		}

		/**
		 * @return string
		 */
		public function getAlpha3() {
			return $this->alpha3;
		}

		/**
		 * @return string
		 */
		public function getNomEnGb() {
			return $this->nomEnGb;
		}

		/**
		 * @return string
		 */
		public function getNomFrFr() {
			return $this->nomFrFr;
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
		 * @param int $code
		 */
		public function setCode($code) {
			$this->code = $code;
		}

		/**
		 * @param string $alpha2
		 */
		public function setAlpha2($alpha2) {
			$this->alpha2 = $alpha2;
		}

		/**
		 * @param string $alpha3
		 */
		public function setAlpha3($alpha3) {
			$this->alpha3 = $alpha3;
		}

		/**
		 * @param string $nomEnGb
		 */
		public function setNomEnGb($nomEnGb) {
			$this->nomEnGb = $nomEnGb;
		}

		/**
		 * @param string $nomFrFr
		 */
		public function setNomFrFr($nomFrFr) {
			$this->nomFrFr = $nomFrFr;
		}

				}
