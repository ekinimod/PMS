<?php

	namespace Domi\Bundle\AdresseBundle\Controller;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	use Domi\Bundle\AdresseBundle\Entity\Ville;
	use Domi\Bundle\AdresseBundle\Form\VilleType;

	/**
	 * Ville controller.
	 *
	 */
	class VilleController extends Controller {

		/**
		 * Lists all Ville entities.
		 *
		 */
		public function indexAction(Request $request, $page){
			$limit    = 10;
			$em       = $this->getDoctrine()->getManager('adresse');
			$paysRepo = $em->getRepository('DomiAdresseBundle:Ville');

			// $qb instanceof QueryBuilder
			$qb = $paysRepo->createQueryBuilder('p');
			$qb->setFirstResult($page)
			   ->setMaxResults($limit);

			$paginator  = $this->get('knp_paginator');
			$pagination = $paginator->paginate(
				$qb,
				$request->query->getInt('page', $page)/*page number*/,
				$limit/*limit per page*/
			);

			return $this->render('DomiAdresseBundle:Ville:index.html.twig',
			                     array('entities' => $pagination));
		}

		/**
		 * Creates a new Ville entity.
		 *
		 */
		public function createAction(Request $request) {
			$entity = new Ville();
			$form   = $this->createCreateForm($entity);
dump($form);die;

			$form->handleRequest($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager('adresse');
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('ville_show', array('id' => $entity->getId())));
			}

			return $this->render('DomiAdresseBundle:Ville:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
		}

		/**
		 * Creates a form to create a Ville entity.
		 *
		 * @param Ville $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createCreateForm(Ville $entity) {
			$form = $this->createForm(new VilleType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('ville_create'),
				                          'method' => 'POST',
			                          ));

			$form->add('submit', 'submit', array('label' => 'Create'));

			return $form;
		}

		/**
		 * Displays a form to create a new Ville entity.
		 *
		 */
		public function newAction() {
			$entity = new Ville();
dump($entity);die;
			$form   = $this->createCreateForm($entity);

			return $this->render('DomiAdresseBundle:Ville:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
		}

		/**
		 * Finds and displays a Ville entity.
		 *
		 */
		public function showAction($id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Ville')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Ville entity.');
			}

			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiAdresseBundle:Ville:show.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Displays a form to edit an existing Ville entity.
		 *
		 */
		public function editAction($id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Ville')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Ville entity.');
			}

			$editForm   = $this->createEditForm($entity);
			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiAdresseBundle:Ville:edit.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'edit_form'   => $editForm->createView(),
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Creates a form to edit a Ville entity.
		 *
		 * @param Ville $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createEditForm(Ville $entity) {
			$form = $this->createForm(new VilleType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('ville_update',
				                                                         array('id' => $entity->getId())),
				                          'method' => 'PUT',
			                          ));

			$form->add('submit', 'submit', array('label' => 'Update'));

			return $form;
		}

		/**
		 * Edits an existing Ville entity.
		 *
		 */
		public function updateAction(Request $request, $id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Ville')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Ville entity.');
			}

			$deleteForm = $this->createDeleteForm($id);
			$editForm   = $this->createEditForm($entity);
			$editForm->handleRequest($request);

			if ($editForm->isValid()) {
				$em->flush();

				return $this->redirect($this->generateUrl('ville_edit', array('id' => $id)));
			}

			return $this->render('DomiAdresseBundle:Ville:edit.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'edit_form'   => $editForm->createView(),
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Deletes a Ville entity.
		 *
		 */
		public function deleteAction(Request $request, $id) {
			$form = $this->createDeleteForm($id);
			$form->handleRequest($request);

			if ($form->isValid()) {
				$em     = $this->getDoctrine()->getManager('adresse');
				$entity = $em->getRepository('DomiAdresseBundle:Ville')->find($id);

				if (!$entity) {
					throw $this->createNotFoundException('Unable to find Ville entity.');
				}

				$em->remove($entity);
				$em->flush();
			}

			return $this->redirect($this->generateUrl('ville'));
		}

		/**
		 * Creates a form to delete a Ville entity by id.
		 *
		 * @param mixed $id The entity id
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm($id) {
			return $this->createFormBuilder()
			            ->setAction($this->generateUrl('ville_delete', array('id' => $id)))
			            ->setMethod('DELETE')
			            ->add('submit', 'submit', array('label' => 'Delete'))
			            ->getForm();
		}
	}
