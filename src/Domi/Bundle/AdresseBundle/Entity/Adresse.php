<?php
	/**
	 * adresse_geographique_type
	 *   cf :
	 *   http://xml.insee.fr/schema/adresse.html
	 *	https://www.amabis.com/rediger-saisir-adresse-postale/
	 * Adresse Géographique (Adresse de particulier)
	 *  7 Lignes pour une adresse
	 *       M. Valéry FRONTERE
	 *       Appartement 12 Escalier C      pointRemise
	 *       Résidence Les Tilleuls         complement
	 *       1 impasse de l Eglise          numeroVoie nomVoie
	 *       Hameau AMAREINS                lieuDit
	 *       01090 FRANCHELEINS             cpVille
	 *       FRANCE                         pays
	 *
	 *
	 * 	 * Adresse Géographique (Adresse d’entreprise)
	 *  7 Lignes pour une adresse
	 *       M. Valéry FRONTERE             Identification du destinataire : raison sociale ou dénomination commerciale
	 *       Appartement 12 Escalier C      Identité du destinataire et/ou service
	 *       Résidence Les Tilleuls         Complément d’identification du point géographique : entrée, tour, bâtiment, immeuble, résidence, zone industrielle
	 *       1 impasse de l Eglise          numeroVoie nomVoie
	 *       Hameau AMAREINS                Mentions spéciales de distribution – Boite Postale, Tri Spécial, Arrivée
	 *       01090 FRANCHELEINS             Code postal et bureau distributeur ou code cedex et bureau distributeur cedex
	 *       FRANCE                         pays
	 *
	 * Règles :
	 *       - Les informations ordonnées du nominatif – nom et raison sociale – à la localité du destinataire. Ceci est la structure même de l’adresse, chaque ligne ayant un rôle précis.
	 *       - 6 lignes maximum – supprimer les lignes blanches – et 7 pour l’international, la dernière ligne étant réservée au nom du pays de destination.
	 *       - 38 caractères maximum par ligne, espaces compris. Un espace doit figurer entre chaque mot. Le recours aux abréviations ne doit intervenir que lorsque le libellé de la voie dépasse 38 caractères. Ainsi, AVENUE DES FLEURS – 17 caractères – ne doit pas être abrégée en AV DES FLEURS, mais écrite dans son intégralité.
	 *       - pas de signe de ponctuation, ni d’italique, ni de souligné à partir de la ligne 4 « Numéro et libellé de la voie », cela peut occasionner une mauvaise reconnaissance des caractères par les lecteurs optiques utilisés pour le tri postal.
	 *       - la dernière ligne toujours en majuscules
	 *       - pavé adresse aligné à gauche. Les lecteurs optiques détectent l’adresse du destinataire par l’alignement à gauche des lignes de l’adresse. Si celle ci est centrée ou alignée à droite, elle ne sera pas détectée.

	 *
	 *
	 */
	namespace Domi\Bundle\AdresseBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * Adresse
	 *
	 * @ORM\Table(name="adresse", indexes={
	 *      @ORM\Index(name="FK_adresse_voie", columns={"voie_id"}),
	 *      @ORM\Index(name="FK_adresse_ville", columns={"ville_id"}),
	 *      @ORM\Index(name="FK_adresse_pays", columns={"pays_id"})
	 *      },
	 *      options={"comment":"Les adresses"})
	 * )
	 * @ORM\Entity
	 */
	class Adresse {
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer", nullable=false,
		 *  options={"comment":"identifiant unique Adresse"})
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="IDENTITY")
		 */
		private $id;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="point_remise", type="string", length=50, nullable=false,
		 *  options={"comment":"Le point de remise correspond à une localisation à l\'intérieur d\'un bâtiment (numéro de l\'appartement, étage, escalier, etc.)"})
		 */
		private $pointRemise = '';

		/**
		 * @var string
		 *
		 * @ORM\Column(name="complement", type="string", length=50, nullable=false,
		 *  options={"comment":"Le complément correspond à des éléments situés à l\'extérieur du bâtiment qui permettent de compléter l\'adresse (résidence, bâtiment, entrée, etc.)."})
		 */
		private $complement = '';

		/**
		 * @var integer
		 *
		 * @ORM\Column(name="numero_voie", type="integer", nullable=false, options={"comment":"numero Voie"})
		 */
		private $numeroVoie = null;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="extension", type="string", length=6, nullable=false,
		 *  options={"comment":"extension du no de voie (bis,ter,quater...)"})
		 */
		private $extension = '';

		/**
		 * @var strings
		 *
		 * @ORM\Column(name="nom_voie", type="string", length=255, nullable=false, options={"comment":"nom de la voie"})
		 */
		private $nomVoie = '';

		/**
		 * @var string
		 *
		 * @ORM\Column(name="lieu_dit", type="string", length=255, nullable=false,
		 *  options={"comment":"Lieu-dit ou service particulier de distribution (Poste restante, boite postale...)"})
		 */
		private $lieuDit = '';

		/**
		 * @var string
		 *
		 * @ORM\Column(name="mention_distribution", type="string", length=255, nullable=false,
		 *  options={"comment":"Mentions spéciales de distribution (Boite Postale, Tri Spécial, Arrivée...)"})
		 */
		private $mentionDistribution = '';

		/**
		 * @var string
		 *
		 * @ORM\Column(name="cedex", type="string", length=12, nullable=false,
		 *  options={"comment":"cedex"})
		 */
		private $cedex = '';

		/**
		 * @var string
		 *
		 * @ORM\Column(name="lib_bureau_cedex", type="string", length=255, nullable=false, options={"comment":"bureau distributeur"})
		 */
		private $libBureauCedex = '';

		/**
		 * @var string
		 *
		 * @ORM\Column(name="division_territoriale", type="string", length=5, nullable=false, options={"comment":"division Territoriale"})
		 */
		private $divisionTerritoriale = '';

		/**
		 * @var \Voie
		 *
		 * @ORM\ManyToOne(targetEntity="Voie"), options={"comment":"lien vers Type de voie"}
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="voie_id", referencedColumnName="id")
		 * })
		 */
		private $voie;

		/**
		 * @var \Ville
		 *
		 * @ORM\ManyToOne(targetEntity="Ville"),
		 *              options={"comment":"Lien vers Code postal et localité de destination"}
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
		 * })
		 */
		private $ville;

		/**
		 * @var \Pays
		 *
		 * @ORM\ManyToOne(targetEntity="Pays"), options={"comment":"lien vers Pays"}
		 * @ORM\JoinColumns({
		 *   @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
		 * })
		 */
		private $pays;

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
		public function getPointRemise() {
			return $this->pointRemise;
		}

		/**
		 * @return string
		 */
		public function getComplement() {
			return $this->complement;
		}

		/**
		 * @return int
		 */
		public function getNumeroVoie() {
			return $this->numeroVoie;
		}

		/**
		 * @return string
		 */
		public function getExtension() {
			return $this->extension;
		}

		/**
		 * @return string
		 */
		public function getNomVoie() {
			return $this->nomVoie;
		}

		/**
		 * @return string
		 */
		public function getLieuDit() {
			return $this->lieuDit;
		}

		/**
		 * @return string
		 */
		public function getMentionDistribution() {
			return $this->mentionDistribution;
		}

		/**
		 * @return string
		 */
		public function getCedex() {
			return $this->cedex;
		}

		/**
		 * @return string
		 */
		public function getLibBureauCedex() {
			return $this->libBureauCedex;
		}

		/**
		 * @return string
		 */
		public function getDivisionTerritoriale() {
			return $this->divisionTerritoriale;
		}

		/**
		 * @return \Voie
		 */
		public function getVoie() {
			return $this->voie;
		}

		/**
		 * @return \Ville
		 */
		public function getVille() {
			return $this->ville;
		}

		/**
		 * @return \Pays
		 */
		public function getPays() {
			return $this->pays;
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
		 * @param string $pointRemise
		 */
		public function setPointRemise($pointRemise) {
			$this->pointRemise = $pointRemise;
		}

		/**
		 * @param string $complement
		 */
		public function setComplement($complement) {
			$this->complement = $complement;
		}

		/**
		 * @param int $numeroVoie
		 */
		public function setNumeroVoie($numeroVoie) {
			$this->numeroVoie = $numeroVoie;
		}

		/**
		 * @param string $extension
		 */
		public function setExtension($extension) {
			$this->extension = $extension;
		}

		/**
		 * @param string $nomVoie
		 */
		public function setNomVoie($nomVoie) {
			$this->nomVoie = $nomVoie;
		}

		/**
		 * @param string $lieuDit
		 */
		public function setLieuDit($lieuDit) {
			$this->lieuDit = $lieuDit;
		}

		/**
		 * @param string $mentionDistribution
		 */
		public function setMentionDistribution($mentionDistribution) {
			$this->mentionDistribution = $mentionDistribution;
		}

		/**
		 * @param string $cedex
		 */
		public function setCedex($cedex) {
			$this->cedex = $cedex;
		}

		/**
		 * @param string $libBureauCedex
		 */
		public function setLibBureauCedex($libBureauCedex) {
			$this->libBureauCedex = $libBureauCedex;
		}

		/**
		 * @param string $divisionTerritoriale
		 */
		public function setDivisionTerritoriale($divisionTerritoriale) {
			$this->divisionTerritoriale = $divisionTerritoriale;
		}

		/**
		 * @param \Voie $voie
		 */
		public function setVoie($voie) {
			$this->voie = $voie;
		}

		/**
		 * @param \Ville $ville
		 */
		public function setVille($ville) {
			$this->ville = $ville;
		}

		/**
		 * @param \Pays $pays
		 */
		public function setPays($pays) {
			$this->pays = $pays;
		}








	}
