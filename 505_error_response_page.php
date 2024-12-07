<?php
//this is the code to enter into other projects to bring up this error page:
	//catch(PDOException $e)
	//{
	//	$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	//	error_log($e->getMessage()); //Delivers a developer defined error message to the PHP log file at 		    c:\xampp\php\logs\php_error_log
	//	error_log($e->getLine());
	//	error_log(var_dump(debug_backtrace()));

		//Clean up any variables or connections that have been left hanging by this error.		

	//	header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
	//}
?>
<html>

<head>
	<title>Sorry, there has been an error.</title>
</head>



<body>

	<h1>We're sorry. Our system is having issues.  Please try again later.</h1>
    
    <p>Return to <a href="#">home page</a>.</p>


</body>
</html>
