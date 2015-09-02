<?php

	namespace Domi\Bundle\UserBundle;

	use Symfony\Component\HttpKernel\Bundle\Bundle;

	class DomiUserBundle extends Bundle {

		public function getParent() {
			return 'FOSUserBundle';
		}
	}
