<?php

	namespace Domi\Bundle\AdresseBundle\Controller;

	use Domi\Bundle\AdresseBundle\Entity\Adresse;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	use Domi\Bundle\AdresseBundle\Entity\Individu;
	use Domi\Bundle\AdresseBundle\Form\IndividuType;

	/**
	 * Individu controller.
	 *
	 */
	class IndividuController extends Controller {

		/**
		 * Lists all Individu entities.
		 *
		 */
		public function indexAction(Request $request, $page) {
			$limit    = 10;
			$em       = $this->getDoctrine()->getManager('adresse');
			$paysRepo = $em->getRepository('DomiAdresseBundle:Individu');

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

			return $this->render('DomiAdresseBundle:Individu:index.html.twig',
			                     array('entities' => $pagination));
		}

		/**
		 * Creates a new Individu entity.
		 *
		 */
		public function createAction(Request $request) {
			$entity = new Individu();
			$form   = $this->createCreateForm($entity);
			$form->handleRequest($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager('adresse');
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl('individu_show', array('id' => $entity->getId())));
			}

			return $this->render('DomiAdresseBundle:Individu:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
		}

		/**
		 * Creates a form to create a Individu entity.
		 *
		 * @param Individu $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createCreateForm(Individu $entity) {
			$form = $this->createForm(new IndividuType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('individu_create'),
				                          'method' => 'POST',
			                          ));

			$form->add('submit', 'submit', array('label' => 'Create (src/Domi/Bundle/AdresseBundle/Controller/IndividuController.php:81)'));

			return $form;
		}

		/**
		 * Displays a form to create a new Individu entity.
		 *
		 * @param \Symfony\Component\HttpFoundation\Request $request
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
			public function newAction(Request $request) {
			$entity = new Individu();
				$entity->addAdresse(new Adresse());
			$form   = $this->createCreateForm($entity);
			$form->handleRequest($request);

			if ($form->isSubmitted() && $form->isValid()) {
				$em = $this->getDoctrine()->getManager('adresse');
				$em->persist($entity);
				$em->flush();

				return $this->redirect($this->generateUrl(
					'individu_show',
					array('id' => $entity->getId())
				));

			}


			return $this->render('DomiAdresseBundle:Individu:new.html.twig',
			                     array(
				                     'entity' => $entity,
				                     'form'   => $form->createView(),
			                     ));
			$form->handleRequest($request);


		}

		/**
		 * Finds and displays a Individu entity.
		 *
		 */
		public function showAction($id) {
			$em = $this->getDoctrine()->getManager('adresse');
			$entity = $em->getRepository('DomiAdresseBundle:Individu')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Individu entity.');
			}

			$deleteForm = $this->createDeleteForm($id);

			return $this->render('DomiAdresseBundle:Individu:show.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Displays a form to edit an existing Individu entity.
		 *
		 */
		public function editAction(Request $request, $id) {
			if (!$id) {
				throw $this->createNotFoundException('Pas d\'Individu trouvé = ' . $id);
			}
			$em        = $this->getDoctrine()->getManager('adresse');
			$entity    = $em->getRepository('DomiAdresseBundle:Individu')->find($id);
			$edit_form = $this->createForm(new IndividuType(), $entity);
//	dump($form);die;
			$edit_form->handleRequest($request);
			if ($edit_form->isValid()) {
				$em->flush();
				$request->getSession()->getFlashBag()->add('notice', 'Individu bien enregistréee.');

				return $this->redirect($this->generateUrl('individu'));
			}

			return $this->render('DomiAdresseBundle:Individu:form.html.twig',
			                     array(
				                     'form' => $edit_form->createView(),
			                     ));
		}

		/**
		 * Creates a form to edit a Individu entity.
		 *
		 * @param Individu $entity The entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createEditForm(Individu $entity) {
//dump($entity);die;
			$form = $this->createForm(new IndividuType(),
			                          $entity,
			                          array(
				                          'action' => $this->generateUrl('individu_update',
				                                                         array('id' => $entity->getId())),
				                          'method' => 'PUT',
			                          ));

			$form->add('submit', 'submit', array('label' => 'Update'));
//
//			return $form;


			return $this->render('DomiAdresseBundle:Individu:edit.html.twig',
			                     array(
				                     'form' => $form->createView(),
			                     ));

			return $form;
		}

		/**
		 * Edits an existing Individu entity.
		 *
		 */
		public function updateAction(Request $request, $id) {
			$em = $this->getDoctrine()->getManager('adresse');

			$entity = $em->getRepository('DomiAdresseBundle:Individu')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Individu entity.');
			}

			$deleteForm = $this->createDeleteForm($id);
			$editForm   = $this->createEditForm($entity);
			$editForm->handleRequest($request);

			if ($editForm->isValid()) {
				$em->flush();

				return $this->redirect($this->generateUrl('individu_edit', array('id' => $id)));
			}

			return $this->render('DomiAdresseBundle:Individu:edit.html.twig',
			                     array(
				                     'entity'      => $entity,
				                     'edit_form'   => $editForm->createView(),
				                     'delete_form' => $deleteForm->createView(),
			                     ));
		}

		/**
		 * Deletes a Individu entity.
		 *
		 */
		public function deleteAction(Request $request, $id) {
			$form = $this->createDeleteForm($id);
			$form->handleRequest($request);

			if ($form->isValid()) {
				$em     = $this->getDoctrine()->getManager('adresse');
				$entity = $em->getRepository('DomiAdresseBundle:Individu')->find($id);

				if (!$entity) {
					throw $this->createNotFoundException('Unable to find Individu entity.');
				}

				$em->remove($entity);
				$em->flush();
			}

			return $this->redirect($this->generateUrl('individu'));
		}

		/**
		 * Creates a form to delete a Individu entity by id.
		 *
		 * @param mixed $id The entity id
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm($id) {
			return $this->createFormBuilder()
			            ->setAction($this->generateUrl('individu_delete', array('id' => $id)))
			            ->setMethod('DELETE')
			            ->add('submit', 'submit', array('label' => 'Delete'))
			            ->getForm();
		}
	}
