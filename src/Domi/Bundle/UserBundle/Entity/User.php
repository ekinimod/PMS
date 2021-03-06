<?php

	namespace Domi\Bundle\UserBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
	use FOS\UserBundle\Model\User as BaseUser;
	use Symfony\Component\Validator\Constraints as Assert;

	/**
	 * @ORM\Entity
	 * @ORM\Table(name="user")
	 */
	class User extends BaseUser {

		/**
		 * @ORM\Id
		 * @ORM\Column(type="integer")
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		protected $id;

		/**
		 * @ORM\Column(type="string", length=255)
		 *
		 * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
		 * @Assert\Length(
		 *     min=3,
		 *     max=255,
		 *     minMessage="The name is too short.",
		 *     maxMessage="The name is too long.",
		 *     groups={"Registration", "Profile"}
		 * )
		 */
		protected $name;

		public function __construct() {
			parent::__construct();
// your own logic
		}

		/**
		 * @return mixed
		 */
		public function getName() {
			return $this->name;
		}

		/**
		 * @param mixed $name
		 */
		public function setName($name) {
			$this->name = $name;
		}


	}