<?php
	namespace Domi\Bundle\UserBundle\Form\Type;
	use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
	use Symfony\Component\Form\FormBuilderInterface;



	class RegistrationFormType extends BaseType {

		public function buildForm(FormBuilderInterface $builder, array $options) {
			parent::buildForm($builder, $options);

			$builder->add('name');
		}

		public function getName() {
			return 'domi_user_registration';
		}


	}