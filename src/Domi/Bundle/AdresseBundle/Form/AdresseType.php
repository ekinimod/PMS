<?php

	namespace Domi\Bundle\AdresseBundle\Form;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;

	class AdresseType extends AbstractType {
		/**
		 * @param FormBuilderInterface $builder
		 * @param array                $options
		 */
		public function buildForm(FormBuilderInterface $builder, array $options) {
			$builder
				->add('pointRemise')
				->add('complement')
				->add('numeroVoie')
				->add('extension')
				->add('voie',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\AdresseBundle\Entity\Voie',
					      'property' => 'libVoie',
				      ))
				->add('nomVoie')
				->add('lieuDit')
				->add('mentionDistribution')
				->add('cedex')
				->add('divisionTerritoriale')
				->add('libBureauCedex')
				->add('pays',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\AdresseBundle\Entity\Pays',
					      'property' => 'nomFrFr',
				      ));
		}

		/**
		 * @param OptionsResolverInterface $resolver
		 */
		public function setDefaultOptionsInterface(OptionsResolver $resolver) {
			$resolver->setDefaults(array(
				                       'data_class' => 'Domi\Bundle\AdresseBundle\Entity\Adresse',
			                       ));
		}

		/**
		 * @return string
		 */
		public function getName() {
			return 'domi_bundle_adressebundle_adresse';
		}
	}
