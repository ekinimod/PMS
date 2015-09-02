<?php

	namespace Domi\Bundle\AdresseBundle\Form;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;

	class IndividuType extends AbstractType {
		/**
		 * @param FormBuilderInterface $builder
		 * @param array                $options
		 */
		public function buildForm(FormBuilderInterface $builder, array $options) {
			$builder
				->add('nom')
				->add('prenom')
				->add('email')
				->add('adresse',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\AdresseBundle\Entity\Adresse',
					      'property' => 'complement',
				      ))
//				->add('adresse', 'collection', array(
//					'label' => 'Liste des Adresses :',
//					'type' => new AdresseType(),
////					'allow_add' => true,
//					'options' => array('data_class' => 'Domi\Bundle\AdresseBundle\Entity\Adresse'),
////					'prototype' => true,
////					'by_reference' => false,
//					))
//				->add('save', 'submit')
//				->add('reset', 'reset')
				;
		}

		/**
		 * @param OptionsResolverInterface $resolver
		 */
		public function configureOptions(OptionsResolver $resolver) {
			$resolver->setDefaults(array(
				                       'data_class' => 'Domi\Bundle\AdresseBundle\Entity\Individu',
			                       ));
		}

		/**
		 * @return string
		 */
		public function getName() {
			return 'domi_bundle_adressebundle_individu';
		}


	}
