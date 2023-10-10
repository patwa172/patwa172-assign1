<?php
require_once 'includes/config.inc.php';
require_once 'includes/assign-1-db-classes.inc.php';
include 'includes/functions.inc.php';

try
{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    //Need to check if user selected the proper radio button (make more conditionals)
    //If the user selects the a radio button, then they must only put in info for what they have selected.

    //Checking to see what buttons the user has selected.
    
    if(isset(($_GET['lessOrGreater'][0])))
    {
        $lessOrGreater = $_GET['lessOrGreater'][0];
    }



   // echo $lessOrGreater;

    
    if(isset($_GET['type'][0]))
    {
        $userSelection = $_GET['type'][0];

    }

   // echo $userSelection;

    $songsGateway = new SongsDB($conn);

   

    if($userSelection == 't')
    {
    //User puts title info on previous page

    if(isset($_GET['titleName'])) //Check for greater than 0 for accuracy
    {


        $data = $songsGateway->searchFromTitle($_GET['titleName']);

        foreach($data as $d)
        {

           outputData($d);
        


        }
    }
    }

    else if($userSelection == 'a')
    //User puts artist info on previous page
    {
    if(isset($_GET['artistName'])) //check if rest of the values are 0
    {

        $artistGateway = new ArtistsDB($conn);

        $data = $artistGateway->searchFromArtist($_GET['artistName']);

       

        foreach($data as $d)
        {

            outputData($d);        


        }

    }
    }

    else if ($userSelection == 'g')
    {
    //User puts genre info on previous page
    if(isset($_GET['genreName']))
    {

        $genreGateway = new GenresDB($conn);

        $data = $genreGateway->searchFromGenre($_GET['genreName']);


        foreach($data as $d)
        {

            outputData($d);        


        }

    }
    }

    //Tricky part, if user selects year

    //itterate through the $_GET superglobal array

    //SOMETHING IS WRONG HERE

    else if($userSelection == 'y')
    {
    
        if($lessOrGreater == "less")
        {
            if(isset($_GET['lessThanYearValue']) && $_GET['lessThanYearValue'] > 0 )
            {

                $data = $songsGateway->searchFromYearLT($_GET['lessThanYearValue']);
        
                foreach($data as $d)
                {
            
                    outputData($d);      
   
                }
        

            }
        
        }


        else if ($lessOrGreater == "greater")
        {


            if(isset($_GET['greaterThanYearValue']) && $_GET['greaterThanYearValue'] > 0)
            {


                $data = $songsGateway->searchFromYearGT($_GET['greaterThanYearValue']);
        
                foreach($data as $d)
                {

                //Need to fix this, displaying all years. Might need to
                //Check the processing functions in the SongsDB class.

                outputData($d);       
                }  

            }

        }
    
    
    }

    //If user enters two years (still need to do error checking for the above as well. If user enters an invalid input)
    //If user enters an invalid input, we must then redirect the user to an error page. This will be done via the
    // header() function.s

    

}

catch(Exception $e)
{

die($e->getMessage());

}



?>