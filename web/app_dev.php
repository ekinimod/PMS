<?php
	date_default_timezone_set('Europe/Paris');
//	umask(0002); // This will let the permissions be 0775
	//***************************

	use Symfony\Component\Debug\Debug;
	use Symfony\Component\HttpFoundation\Request;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.

	$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';
	Debug::enable();

	require_once __DIR__ . '/../app/AppKernel.php';

	$kernel = new AppKernel('dev', true);
	$kernel->loadClassCache();
	$request  = Request::createFromGlobals();
	$response = $kernel->handle($request);
	$response->send();
	$kernel->terminate($request, $response);
