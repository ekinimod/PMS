<?php

	namespace AppBundle\Controller;

	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	class DefaultController extends Controller {
		/**
		 * @Route("/app/example", name="homepage")
		 */

		public function indexAction() {
			$contenu="";
			return $this->render('default/index.html.twig', array('contenu' => $contenu));
		}


		/**
		 * @param $name
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function aboutAction() {
			return $this->render('default/about.html.twig',
			                     array('titre'     => 'A Propos du site',
			                           'soustitre' => ' Pellentesque habitant morbi tristique senectus '));
		}
	}
