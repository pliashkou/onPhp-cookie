<?php
	// copy this file to 'config.inc.php' for local customization
	
	// system settings
	error_reporting(E_ALL | E_STRICT);
	setlocale(LC_CTYPE, "ru_RU.UTF8");
	setlocale(LC_TIME, "ru_RU.UTF8");
	
	if (!defined('PATH_SOURCE_DIR'))
		// defaults to user mode
		define('PATH_SOURCE_DIR', 'user'.DIRECTORY_SEPARATOR);

	// paths
	define('PATH_BASE', dirname(__FILE__).DIRECTORY_SEPARATOR);
	define('PATH_SOURCE', PATH_BASE.'src'.DIRECTORY_SEPARATOR.PATH_SOURCE_DIR);
	define('PATH_WEB', 'http://onphp.lc/');
	define('PATH_WEB_ADMIN', 'http://onphp.lc/admin');
	define('PATH_WEB_PIX', '/pix/'); // dynamic stuff
	define('PATH_WEB_IMG', '/img/'); // static stuff
    define('ONPHP_CLASS_CACHE_TYPE', 'AutoloaderNoCache');

	// shared classes
	define(
		'PATH_CLASSES',
		PATH_BASE.'src'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR
	);
	define('PATH_CONTROLLERS', PATH_SOURCE.'controllers'.DIRECTORY_SEPARATOR);
	define('PATH_TEMPLATES', PATH_SOURCE.'templates'.DIRECTORY_SEPARATOR);
	// onPHP init
	require dirname(__FILE__).'/../onphp-framework/global.inc.php.tpl';

    $autoloader->addPaths(array(
        PATH_CONTROLLERS,
        PATH_CLASSES.'Decorators',
    ));

	// everything else
	define('DEFAULT_ENCODING', 'UTF-8');
	mb_internal_encoding(DEFAULT_ENCODING);
	mb_regex_encoding(DEFAULT_ENCODING);
	
//	DBPool::me()->setDefault(
//		DB::spawn('PgSQL', 'onphp', 'onphp', 'localhost', 'onphp')->
//		setEncoding(DEFAULT_ENCODING)
//	);
	
	// magic_quotes_gpc must be off
	
	define('__LOCAL_DEBUG__', true);
	define('BUGLOVERS', 'lnx@tut.by');


	Cache::setPeer(
		PeclMemcached::create('localhost')
	);
	
	Cache::setDefaultWorker('SmartDaoWorker');
?>