<?php
	session_start(); 
	ob_start();
	// Login user name and password
	// Users: array('Username' => 'Password', 'Username2' => 'Password2', ...)
	// Generate secure password hash - https://tinyfilemanager.github.io/docs/pwd.html
	// private key and session name to store to the session
	if ( !defined( 'PFMT_SESSION_ID')) {
		define('PFMT_SESSION_ID', 'PerFiMater');
	}
	$auth_users = array(
		'user' => '$2y$10$BOqKJomDfAE75Q1sXEp7GO1IMl4DBYr.m4v/OHiSErYLd5rx.JQ/m', //12345
	);
	$_SESSION[PFMT_SESSION_ID]['users'] = $auth_users;

	$directories = array(
		'callebe' => 'callebe',
	);
	$_SESSION[PFMT_SESSION_ID]['directories'] = $directories;


	// Resource Request
	if (isset($_SESSION[PFMT_SESSION_ID]['logged'], $auth_users[$_SESSION[PFMT_SESSION_ID]['logged']])) {
		if(isset($_GET['Resource'])){
			// $file = 'people.txt';
			// $person = "GET ".$_GET['Resource']." \n";
			// file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
			switch($_GET['Resource']){
				case "fileManagerPlugin" :
					define('FM_EMBED', true);
					define('FM_SELF_URL', '/?Resource=fileManagerPlugin&');
					define('FM_ROOT_URL', '/?Resource=fileManagerPlugin&');
					include("../php/filemanager.php");
					break;

				case "fileManager" :
					include("../html/filemanager.html");
					break;

				case "terminal" :
					include("../html/terminal.html");
					break;

				case "logout":
					unset($_SESSION[PFMT_SESSION_ID]['logged']);
					session_destroy();
					include("../html/homePage.html");
					break;

				default :
			}
		}
		else{
			include("../html/terminal.html");
		}
	}

	//Authentication Reques 
	elseif (isset($_POST['pfmt_user'], $_POST['pfmt_password'])) {
		// Logging In
		sleep(1);
		if (isset($auth_users[$_POST['pfmt_user']]) && isset($_POST['pfmt_password']) && password_verify($_POST['pfmt_password'], $auth_users[$_POST['pfmt_user']])) {
			$authError=0;
			$_SESSION[PFMT_SESSION_ID]['logged'] = $_POST['pfmt_user'];
			$_SESSION[FM_SESSION_ID]['logged'] = $_POST['pfmt_user'];
			include("../html/terminal.html");
			exit;
		}
		else {
			$authError=1;
			unset($_SESSION[PFMT_SESSION_ID]['logged']);
			include("../html/homePage.html");
		}
	}
	else {
		// Logout
		$authError=0;
		unset($_SESSION[PFMT_SESSION_ID]['logged']);
		include("../html/homePage.html");
		exit;
	}
	exit;
?>

