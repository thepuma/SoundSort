<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'top', 'action' => 'index'));
	
	Router::connect('/all', array('controller' => 'top', 'action' => 'all'));
	Router::connect('/all/:id', array('controller' => 'top', 'action' => 'all'), array('id' => '[0-9]+'));

	Router::connect('/:genre', array('controller' => 'top', 'action' => 'genre'),
			array(
				'genre' => '(HipHop|hiphop|Dubstep|dubstep|Electronic|electronic|Dance|dance|Rock|rock|Rap|rap)',
				));
	Router::connect('/:genre/:id', array('controller' => 'top', 'action' => 'genre'),
			array(
				'genre' => '(HipHop|hiphop|Dubstep|dubstep|Electronic|electronic|Dance|dance|Rock|rock|Rap|rap)',
				'id' => '[0-9]+'
				));

	Router::connect('/comments/:id', array('controller' => 'comments', 'action' => 'index'), array('id' => '[0-9]+'));

	Router::connect('/register/confirm/:id', array('controller' => 'register', 'action' => 'activated'), array('id' => '[A-Za-z0-9-]{36}'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
