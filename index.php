<?php
	
	if(isset($_GET['site']))
	{
		switch ($_GET['site']) 
		{
    		case 'login':
        		include_once 'views/login.php';
        		break;
    		case 'logout':
  				include_once 'views/logout.php';
  				break;
    		case 'auswahl':
  				include_once 'views/auswahl.php';
  				break;
			case 'formular':
  				include_once 'views/formular.php';
  				break;
  			case 'formularSimpleType':
  				include_once 'views/formularSimpleType.php';
  				break;
  			case 'formularTwoSided':
  				include_once 'views/formularTwoSided.php';
  				break;
  			case 'formularTwoSidedBackEditable':
  				include_once 'views/formularTwoSidedBackEditable.php';
  				break;
  			default:
    			include_once 'views/login.php';
    			break;
		}
	}
	else
	{
		include_once 'views/login.php';
	}
?>