
	<?php
	//ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    error_reporting(1);  //1-> turn on errors; 0 -> off
	
	
	
	
	
	
	//Your exception Class, will catch anything you throw in try{} catch{} block. To trigger it u must in format=> {throw new customExceptionX('text')} & {catch (customExceptionX $e)}
	//Makes sure that script will go on after you throw the Exception in try{} catch{}.
	//Only fire if you throw the Exception in try{} catch{}. Won't help/won't fire even if fatal error happens inside the try{} catch{} 
	//Alternatively, u can not to write this your custom Exception Class and use build-in Exception in format=> {throw new Exception("text");} {catch(Exception $e)}
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
	class customExceptionX extends Exception {
      public function errorMessage() {
        //error message
        $errorMsg = '<div style="padding:1em; border:1px solid black;width:70%;">' .
		      '<h3>You have got an ERROR (message from your Custom set Exception) </h3>' .
			  '<p><b>Your Error message is below: </b></p>' .
     		  ' Error is on line ' . $this->getLine().
			  '</br> in '.$this->getFile(). 
              '</br> YOUR CUSTOM TEXT is => <b>'.$this->getMessage().'</b> </div>';
        return $errorMsg;
      }
    }
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
	//END Your exception Class
	
	
	
	
	
	
	
	
    //Your shutdown function, will run only if any Fatal Error happens(not Notice). Will run even if Error reporting is OFF, i.e if (error_reporting(0);). In this case any errors will not be displayed, except for shutdown function message.
	//If Error reporting is ON, will display all errors + shutdown function message
    //WILL NOT RUN if you throw your exception in Try Catch
    function shutdownX() {
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
	  /*
	    $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];
        //error_mail(format_error( $errno, $errstr, $errfile, $errline));
	   */
	   
        $error = error_get_last();
        if ($error['type'] === E_ERROR) {
            //fatal error has occured
		    echo "<h3>Please visit us later. Shutdown_function was activated {$error["message"]}</h3>"; //{$errstr }
        }
      }  

      register_shutdown_function( "shutdownX" );	//register you shutdown function
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
   //END Your shutdown function
	
	
	
	
	//TESTING
	echo "<br> Running...</br>";
	//echo $b; //manual cause of E-Notice (will not cause shutdown function)
	//throw new customExceptionX("without try"); //will cause Fatal Error and shutdown function
	
	//trigger_error("/Oops!", E_USER_ERROR); //manual trigger hand-made artificial Fatal Error
	//noSuchFunction(); //manual trigger Fatal Error with calling unexisted function, will cause Fatal Error and shutdown function
	
	
	
   try {
	    //noSuchFunction(); //will cause Fatal Error and shutdown function. Exception won't work
        throw new customExceptionX("Dima, I am from try catch"); //Will call Your exception, script won't stop. WON"T cause Fatal Error and shutdown function

   } catch (customExceptionX $e) {  //Error $e -> echo $e->getMessage();
        echo $e->errorMessage(); //display custom message
   }
   
   
   /*
   try {
	//noSuchFunction();
     throw new Exception("Dima, I am from DEFAULT");
   } catch (Throwable $e ) {  //Error $e -> echo $e->getMessage();
      echo $e->getMessage();
   }
   */
   
    echo "<br> Continue...</br>Meaning stript was not crashed by errors...</br>";
    ?>	
        
   </div>
	   
	 

