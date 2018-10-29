<?php

switch($_GET['page']) {

	case "learn-creator" : {
		$mTitle = " | Learn";
		$mKeys = "Physics,Feynman,Buissness,Electronics,Mechanics,Books";
		$mDescr = "Access to all of the users classes and documents";
	}
	break;
	case "feynman-who" : {
		$mTitle = " | Feynman";
		$sidebar = "sidebar-feynman";
	}
	break;
	case "feynman-teach" : {
		$mTitle = " | Feynman";
		$sidebar = "sidebar-feynman";
	}
	break;
	case "feynman-learn" : {
		$mTitle = " | Feynman";
		$sidebar = "sidebar-feynman";
	}
	break;
	case "portfolio-resume" : {
		$mTitle = " | Resume";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "portfolio-about" : {
		$mTitle = " | About";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "portfolio-references" : {
		$mTitle = " | References";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "portfolio-questions" : {
		$mTitle = " | Questions";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "schedule" : {
		$mTitle = " | Schedule";
		$sidebar = "sidebar-schedule";
	}
	break;
	case "extra-blog" : {
		$mTitle = " | Blog";
		$sidebar = "sidebar-extra";
	}
	break;
	case "extra-websites" : {
		$mTitle = " | Websites";
		$sidebar = "sidebar-extra";
	}
	break;
	case "admin-login" : {
		$mTitle = " | Admin";
		$sidebar = "sidebar-admin";
	}
	break;
	case "admin-data" : {
		$mTitle = " | Admin";
		$sidebar = "sidebar-admin";
	}
	break;
	case "admin-edit" : {
		$mTitle = " | Admin";
		$sidebar = "sidebar-admin";
	}
	break;
	case "contacts" : {
		$mTitle = " | Contact";
	}
	break;
	/* Home Page */
	default : {
		$mTitle = " | Home";
		$mKeys = "Learning, Scheduling, Feynman, Engineering, Software, Physics";
		$mDescr = "learn and keep track of stuff and your life";
		$sidebar = "sidebar-home";
	};
	break;


}
?>