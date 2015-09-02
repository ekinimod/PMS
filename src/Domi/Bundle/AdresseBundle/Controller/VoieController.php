<?php

	namespace Domi\Bundle\AdresseBundle\Controller;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route as RTR;

	use Domi\Bundle\AdresseBundle\Entity\Voie;
	use Domi\Bundle\AdresseBundle\Form\VoieType;

	/**
	 * Voie controller.
	 *
	 */
	class VoieController extends Controller {

		/**
		 * Lists all Voie entities.

		 *
		 */
		public function indexAction(Request $request, $page) {
			$limit    = 10;
			$em       = $this->getDoctrine()->getManager('adresse');
			$paysRepo = $em->getRepository('DomiAdresseBundle:Voie');

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

			return $this->render('DomiAdresseBundle:Voie:index.html.twig',
			                     array('entities' => $pagination));
		}

		/**
		 * Creates a new Voie entity.
		 *
		 */
		public function createAction(Request $request) {
			$entity = new Voie();
			$form   = $this->createCreateForm($entity);
			$form->handleRequest($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager('adresse');
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('voie_show', array('id' => $entity->getId())));
			}

			return $this->render('DomiAdresseBundle:Voie:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
		}

		/**
		 * Creates a form to create a Voie entity.
		 *
		 * @param Voie $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createCreateForm(Voie $entity) {
			$form = $this->createForm(new VoieType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('voie_create'),
				                          'method' => 'POST',
			                          ));

			$form->add('submit', 'submit', array('label' => 'Create'));

			return $form;
		}

		/**
		 * Displays a form to create a new Voie entity.
		 *
		 */
		public function newAction(Request $request) {
			$entity = new Voie();
			$form   = $this->createCreateForm($entity);

			return $this->render('DomiAdresseBundle:Voie:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
		}

		/**
		 * Finds and displays a Voie entity.
		 *
		 */
		public function showAction($id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Voie')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Voie entity.');
			}

			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiAdresseBundle:Voie:show.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Displays a form to edit an existing Voie entity.
		 *
		 */
		public function editAction($id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Voie')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Voie entity.');
			}

			$editForm   = $this->createEditForm($entity);
			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiAdresseBundle:Voie:edit.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'edit_form'   => $editForm->createView(),
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Creates a form to edit a Voie entity.
		 *
		 * @param Voie $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createEditForm(Voie $entity) {
			$form = $this->createForm(new VoieType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('voie_update',
				                                                         array('id' => $entity->getId())),
				                          'method' => 'PUT',
			                          ));

			$form->add('submit', 'submit', array('label' => 'Update'));

			return $form;
		}

		/**
		 * Edits an existing Voie entity.
		 *
		 */
		public function updateAction(Request $request, $id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Voie')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Voie entity.');
			}

			$deleteForm = $this->createDeleteForm($id);
			$editForm   = $this->createEditForm($entity);
			$editForm->handleRequest($request);

			if ($editForm->isValid()) {
				$em->flush();

				return $this->redirect($this->generateUrl('voie_edit', array('id' => $id)));
			}

			return $this->render('DomiAdresseBundle:Voie:edit.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'edit_form'   => $editForm->createView(),
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Deletes a Voie entity.
		 *
		 */
		public function deleteAction(Request $request, $id) {
			$form = $this->createDeleteForm($id);
			$form->handleRequest($request);

			if ($form->isValid()) {
				$em     = $this->getDoctrine()->getManager('adresse');
				$entity = $em->getRepository('DomiAdresseBundle:Voie')->find($id);

				if (!$entity) {
					throw $this->createNotFoundException('Unable to find Voie entity.');
				}

				$em->remove($entity);
				$em->flush();
			}

			return $this->redirect($this->generateUrl('voie'));
		}

		/**
		 * Creates a form to delete a Voie entity by id.
		 *
		 * @param mixed $id The entity id
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm($id) {
			return $this->createFormBuilder()
			            ->setAction($this->generateUrl('voie_delete', array('id' => $id)))
			            ->setMethod('DELETE')
			            ->add('submit', 'submit', array('label' => 'Delete'))
			            ->getForm();
		}
	}
