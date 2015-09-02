<?php

	namespace Domi\Bundle\DocuBundle\Controller;

	use Domi\Bundle\DocuBundle\Entity\Document;
	use Domi\Bundle\DocuBundle\Form\DocuForm;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;

	/**
	 * Class DefaultController
	 *
	 * @package Domi\Bundle\DocuBundle\Controller
	 */
	class DefaultController extends Controller {

		/**
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function listeDocuAction() {
			$em      = $this->getDoctrine()->getManager();
			$lstDocu = $em->getRepository('DomiDocuBundle:Document', 'default')->findAll();
			if (!$lstDocu) {
				throw $this->createNotFoundException(
					'Aucun Document trouvé !'
				);
			}

			return $this->render('DomiDocuBundle:Default:listeDocu.html.twig', array('listeDocu' => $lstDocu));
		}

		/**
		 * @param $id
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function detailDocuAction($id) {
			$em     = $this->getDoctrine()->getManager();
			$leDocu = $em->getRepository('DomiDocuBundle:Document', 'default')->find($id);
			if (!$leDocu) {
				throw $this->createNotFoundException(
					'Aucun Document trouvé !'
				);
			}

			return $this->render('DomiDocuBundle:Default:detailDocu.html.twig', array('leDocu' => $leDocu));
		}

		public function editDocuAction($id, Request $request) {
			if (!$id) {
				throw $this->createNotFoundException('Pas de document trouvé = ' . $id);
			}

			$em     = $this->getDoctrine()->getManager();
			$leDocu = $em->getRepository('DomiDocuBundle:Document', 'default')->find($id);
			$form   = $this->createForm(new DocuForm(), $leDocu);

			$form->handleRequest($request);
			if ($form->isValid()) {
				$em->flush();
				$request->getSession()->getFlashBag()->add('notice', 'Document bien enregistrée.');

				return $this->redirect($this->generateUrl('liste_all_docu'));
			}

			return $this->render('DomiDocuBundle:Default:formDocu.html.twig',
			                     array(
				                     'form' => $form->createView(),
			                     ));
		}

		public function newDocuAction(Request $request) {
			$newDocu = new Document();
			$form    = $this->createForm(new DocuForm(), $newDocu);
			$form->handleRequest($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($newDocu);
				$em->flush();

				return $this->redirect($this->generateUrl('liste_docu'));
			}

			return $this->render('DomiDocuBundle:Default:formDocu.html.twig',
			                     array(
				                     'form' => $form->createView(),
			                     ));

		}


	}
