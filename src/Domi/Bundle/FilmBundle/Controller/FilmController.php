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
		 * Displays a form to create a new Film entity.
		 *
		 */
		public function newAction() {
			// New
			$entity        = new Film();
			$editForm      = $this->createCreateForm($entity);

			return $this->render('DomiFilmBundle:Film:form.html.twig',
			                     array(
				                     'entity'          => $entity,
				                     'edit_form'       => $editForm->createView(),
				                     'statut_creation' => true,
			                     ));
		}

		/**
		 * Displays a form to edit an existing Film entity.
		 *
		 * @param $id
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function editAction($id) {
			// Update
			$em            = $this->getDoctrine()->getManager('film');
			$entity        = $em->getRepository('DomiFilmBundle:Film')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException("Impossible de trouver le film ($id)");
			}

			$editForm   = $this->createEditForm($entity);
			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiFilmBundle:Film:form.html.twig',
			                     array(
				                     'entity'          => $entity,
				                     'edit_form'       => $editForm->createView(),
				                     'delete_form'     => $deleteForm->createView(),
				                     'statut_creation' => false,
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
			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiFilmBundle:Film:show.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'delete_form' => $deleteForm->createView(),
			                     ));
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
				$this->get('session')->getFlashBag()->add(
					'notice',
					'Le film a été crée !'
				);

				return $this->redirect($this->generateUrl('film_edit', array('id' => $entity->getId())));
			}

			return $this->render('DomiFilmBundle:Film:form.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
				                     'statut_creation' => true,
			                     ));
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
				// $this->addFlash is equivalent to $this->get('session')->getFlashBag()->add
				$this->addFlash(
					'notice',
					'Vos changements ont été enregistrés!'
				);

				// On retourne sur l'entité editée
				return $this->redirect($this->generateUrl('film_edit', array('id' => $id)));
			}

			return $this->render('DomiFilmBundle:Film:form.html.twig',
			                     array(
				                     'entity'    => $entity,
				                     'edit_form' => $editForm->createView(),
				                     'statut_creation' => false,
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
				                          'action' => $this->generateUrl('film_update',
				                                                         array('id' => $entity->getId())),
				                          'method' => 'PUT',
			                          ));

			return $form;
		}
		/**
		 * Creates a form to create a Film entity.
		 *
		 * @param Film $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createCreateForm(Film $entity) {
			$form = $this->createForm(new FilmType("Create"),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('film_create'),
				                          'method' => 'POST',
			                          ));

			return $form;
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
			            ->add('submit',
			                  'submit',
			                  array(
				                  'attr'  => array('class' => 'btn btn-default'),
				                  'label' => 'Effacer',
			                  ))
			            ->getForm();
		}


	}
