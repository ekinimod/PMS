<?php

	namespace Domi\Bundle\FilmBundle\Controller;

	use Domi\Bundle\FilmBundle\Entity\Film;
	use Domi\Bundle\FilmBundle\Form\FilmType;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;

	/**
	 * Film controller.
	 *
	 */
	class FilmController extends Controller {

		/**
		 * Lists all Film entities.
		 *
		 */
		public function indexAction(Request $request, $page) {
			$limit    = 10;
			$em       = $this->getDoctrine()->getManager('film');
			$entities = $em->getRepository('DomiFilmBundle:Film');


			// $qb instanceof QueryBuilder
			$qb = $entities->createQueryBuilder('f');
			$qb->setFirstResult($page)
			   ->setMaxResults($limit);

			$paginator  = $this->get('knp_paginator');
			$pagination = $paginator->paginate(
				$qb,
				$request->query->getInt('page', $page)/*page number*/,
				$limit/*limit per page*/
			);

			return $this->render('DomiFilmBundle:Film:index.html.twig',
			                     array('entities' => $pagination));

		}

		/**
		 * Creates a new Film entity.
		 *
		 */
		public function createAction(Request $request) {
			$entity = new Film();
			$form   = $this->createCreateForm($entity);
			// Lancement du Formulaire
			$form->handleRequest($request);
			// Validation puis Serialisation du Formulaire
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager('film');
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('film_show', array('id' => $entity->getId())));
			}

			return $this->render('DomiFilmBundle:Film:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
		}

		/**
		 * Creates a form to create a Film entity.
		 *
		 * @param Film $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createCreateForm(Film $entity) {
			$form = $this->createForm(new FilmType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('film_create'),
				                          'method' => 'POST',
			                          ));

			return $form;
		}

		/**
		 * Displays a form to create a new Film entity.
		 *
		 */
		public function newOrUpdateAction($id) {
			$em = $this->getDoctrine()->getManager('film');
			if (!$id) {
				// New
				$entity     = new Film();
				$form       = $this->createCreateForm($entity);
				$retourForm = $this->createRetourListeForm();
				$deleteForm = $this->createDeleteForm($id);

				return $this->render('DomiFilmBundle:Film:form.html.twig',
				                     array(
					                     'entity'      => $entity,
					                     'data'        => $form->createView(),
					                     'delete_form' => $deleteForm->createView(),
					                     'retour_form' => $retourForm->createView(),
				                     ));
			} else {
				// Update
				$entity = $em->getRepository('DomiFilmBundle:Film')->find($id);

			}

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Film entity.');
			}

			$formulaire = $this->createEditForm($entity);
			$retourForm = $this->createRetourListeForm();
			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiFilmBundle:Film:form.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'data'        => $formulaire->createView(),
				                     'delete_form' => $deleteForm->createView(),
				                     'retour_form' => $retourForm->createView(),
			                     ));


		}

		/**
		 * Finds and displays a Film entity.
		 *
		 */
		public function showAction($id) {
			$em     = $this->getDoctrine()->getManager('film');
			$entity = $em->getRepository('DomiFilmBundle:Film')->find($id);
			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Film entity.');
			}
			$retourForm = $this->createRetourListeForm();
			$deleteForm = $this->createDeleteForm($id);


			return $this->render('DomiFilmBundle:Film:show.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'delete_form' => $deleteForm->createView(),
				                     'retour_form' => $retourForm->createView(),
			                     ));
		}

		/**
		 * Creates a form to edit a Film entity.
		 *
		 * @param Film $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createEditForm(Film $entity) {
			$form = $this->createForm(new FilmType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('film_new_or_update',
				                                                         array('id' => $entity->getId())),
				                          'method' => 'PUT',
			                          ));

			return $form;
		}

		/**
		 * Edits an existing Film entity.
		 *
		 */
		public function updateAction(Request $request, $id) {
			$em     = $this->getDoctrine()->getManager('film');
			$entity = $em->getRepository('DomiFilmBundle:Film')->find($id);
			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Film entity.');
			}
			$editForm = $this->createEditForm($entity);
			// Lancement du Formulaire
			$editForm->handleRequest($request);
			// Validation puis Serialisation du Formulaire
			if ($editForm->isValid()) {
				$em->flush();

				// On retourne sur l'entité edité
				return $this->redirect($this->generateUrl('film_new_or_update', array('id' => $id)));
			}

			return $this->render('DomiFilmBundle:Film:edit.html.twig',
			                     array(
				                     'entity'    => $entity,
				                     'edit_form' => $editForm->createView(),
			                     ));
		}

		/**
		 * Deletes a Film entity.
		 *
		 */
		public function deleteAction(Request $request, $id) {
			$form = $this->createDeleteForm($id);
			$form->handleRequest($request);
			// Validation puis Serialisation du Formulaire
			if ($form->isValid()) {
				$em     = $this->getDoctrine()->getManager('film');
				$entity = $em->getRepository('DomiFilmBundle:Film')->find($id);

				if (!$entity) {
					throw $this->createNotFoundException('Unable to find Film entity.');
				}

				$em->remove($entity);
				$em->flush();
			}

			return $this->redirect($this->generateUrl('film'));
		}

		/**
		 * Creates a form to delete a Film entity by id.
		 *
		 * @param mixed $id The entity id
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm($id) {
			return $this->createFormBuilder()
			            ->setAction($this->generateUrl('film_delete', array('id' => $id)))
			            ->setMethod('DELETE')
//			            ->add('submit', 'submit', array('label' => 'Effacer'))
                        ->add('submit',
                              'submit',
                              array(
	                              'attr'  => array('class' => 'btn btn-default'),
	                              'label' => 'Effacer',
                              ))
			            ->getForm();
		}

		/**
		 * Creates a form to Return To List of Film.
		 *
		 * @param mixed $id The entity id
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createRetourListeForm() {
			return $this->createFormBuilder()
			            ->setAction($this->generateUrl('film'))
			            ->setMethod('POST')
//			            ->add('btn_retour', 'submit', array('label' => 'Retour liste'))
                        ->add('btn_retour',
                              'submit',
                              array(
	                              'attr'  => array('class' => 'btn btn-default'),
	                              'label' => 'Retour liste',
                              ))
			            ->getForm();


		}

	}
