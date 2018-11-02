<?php

switch($_GET['page']) {

	case "learn-creator" : {
		$mTitle = "DataBorg | Learn";
		$mKeys = "Physics,Feynman,Buissness,Electronics,Mechanics,Books";
		$mDescr = "Access to all of the users classes and documents";
	}
	break;
	case "feynman-who" : {
		$mTitle = "DataBorg | Feynman";
		$sidebar = "sidebar-feynman";
	}
	break;
	case "feynman-teach" : {
		$mTitle = "DataBorg | Feynman";
		$sidebar = "sidebar-feynman";
	}
	break;
	case "feynman-learn" : {
		$mTitle = "DataBorg | Feynman";
		$sidebar = "sidebar-feynman";
	}
	break;
	case "portfolio-resume" : {
		$mTitle = "DataBorg | Resume";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "portfolio-about" : {
		$mTitle = "DataBorg | About";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "portfolio-references" : {
		$mTitle = "DataBorg | References";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "portfolio-questions" : {
		$mTitle = "DataBorg | Questions";
		$sidebar = "sidebar-portfolio";
	}
	break;
	case "schedule" : {
		$mTitle = "DataBorg | Schedule";
		$sidebar = "sidebar-schedule";
	}
	break;
	case "extra-blog" : {
		$mTitle = "DataBorg | Blog";
		$sidebar = "sidebar-extra";
	}
	break;
	case "extra-websites" : {
		$mTitle = "DataBorg | Websites";
		$sidebar = "sidebar-extra";
	}
	break;
	case "admin-login" : {
		$mTitle = "DataBorg | Admin";
		$sidebar = "sidebar-admin";
	}
	break;
	case "admin-data" : {
		$mTitle = "DataBorg | Admin";
		$sidebar = "sidebar-admin";
	}
	break;
	case "admin-edit" : {
		$mTitle = "DataBorg | Admin";
		$sidebar = "sidebar-admin";
	}
	break;
	case "contacts" : {
		$mTitle = "DataBorg | Contact";
	}
	break;
	/* Home Page */
	default : {
		$mTitle = "DataBorg | Home";
		$mKeys = "Learning, Scheduling, Feynman, Engineering, Software, Physics";
		$mDescr = "learn and keep track of stuff and your life";
		$sidebar = "sidebar-home";
	};
	break;


}
?>