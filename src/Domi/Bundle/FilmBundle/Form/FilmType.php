<?php

	namespace Domi\Bundle\FilmBundle\Form;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Form\FormEvent;
	use Symfony\Component\Form\FormEvents;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class FilmType extends AbstractType {
		/**
		 * @param FormBuilderInterface $builder
		 * @param array                $options
		 */
		public function buildForm(FormBuilderInterface $builder, array $options) {
			$builder
				->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'))
				->add('libelle')
				->add('titre')
				->add('duree',
				      'time',
				      array(
					      'input'  => 'datetime',
					      'widget' => 'choice',
				      ))
				->add('codec')
				->add('fichier')
				->add('image')
				->add('description')
				->add('gravee',
				      'choice',
				      array(
					      'choices'  => array('0' => 'Non', '1' => 'Oui'),
					      'label'    => 'Gravé ?',
					      'required' => false,
					      'expanded' => true,
					      'multiple' => false,
				      ))
				->add('langue',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\FilmBundle\Entity\Langue',
					      'property' => 'libelle',
				      ))
				->add('genre',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\FilmBundle\Entity\Genre',
					      'property' => 'libelle',
				      ))
				->add('notefilm',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\FilmBundle\Entity\Notefilm',
					      'property' => 'libelle',
				      ))
				->add('notevideo',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\FilmBundle\Entity\Notevideo',
					      'property' => 'libelle',
				      ))
				->add('spectateur',
				      'entity',
				      array(
					      'class'    => 'Domi\Bundle\FilmBundle\Entity\Spectateur',
					      'property' => 'libelle',
				      ))
//				->add('intervenant',
//				      'entity',
//				      array(
//					      'class'    => 'Domi\Bundle\FilmBundle\Entity\Intervenant',
//					      'property' => 'nom',
//				      ))

			;
		}

		public function onPreSetData(FormEvent $event) {
			$film = $event->getData();
			$form = $event->getForm();

			// vérifie si l'objet Film est "nouveau"
			// Si aucune donnée n'est passée au formulaire, la donnée est "null".
			// Ce doit être considéré comme un nouveau "Film"
			if (!$film || null === $film->getId()) {
				$form->add('btn_create',
				           'submit',
				           array(
					           'attr'  => array('class' => 'btn btn-default'),
					           'label' => 'Créer',
				           ));
			} else {
				$form->add('btn_update',
				           'submit',
				           array(
					           'attr'  => array('class' => 'btn btn-default'),
					           'label' => 'Enregistrer',
				           ));
			}

		}

		/**
		 * @param OptionsResolverInterface $resolver
		 */
		public function setDefaultOptions(OptionsResolverInterface $resolver) {
			$resolver->setDefaults(array(
				                       'data_class' => 'Domi\Bundle\FilmBundle\Entity\Film',
			                       ));
		}

		/**
		 * @return string
		 */
		public function getName() {
			return 'domi_bundle_filmbundle_film';
		}
	}
