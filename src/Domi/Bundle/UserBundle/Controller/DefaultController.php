<?php

	namespace Domi\Bundle\UserBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	class DefaultController extends Controller {
		public function indexAction($name) {
			return $this->render('DomiUserBundle:Default:index.html.twig', array('name' => $name));
		}


	}
