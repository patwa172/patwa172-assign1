<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/search-pagecss.css">

</head>

<body>
    

<header>

<!--nav bar goes here -->
    <h1>Krithik and Paras's Song Database</h1>
    <h2>Search Results</h2>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navigate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a> <!-- Need to add link to home page once its creates -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./search-page.php#">Song Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./single-song-page.php#">Song Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./search-results-page.php#">Search Results</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./view-favorites-page.php#">View Favorites</a>
        </li>
      </form>
    </div>
  </div>
</nav>
</header>

<?php


require_once 'includes/config.inc.php';
require_once 'includes/assign-1-db-classes.inc.php';
include 'includes/functions.inc.php';



try
{
   session_start();
    
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    //Need to check if user selected the proper radio button (make more conditionals)
    //If the user selects the a radio button, then they must only put in info for what they have selected.

    //Checking to see what buttons the user has selected.

    // Create a click here link with a query string, goes back to the same page, and populates the $_GET superglobal array
    // When the user clicks it, the song gets added to a session based array.
    //Change Markup so it reloads properly. Change ifs.
    
   

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

            outputData($data);
            /*
            echo"<form action = '' method='POST'>";
            echo"<table>";
            echo "<tr>";
            echo "<th> Song Title </th>";
            echo "<th> Song Year </th>";
            echo "<th> Artist </th>";
            echo "<th> Genre </th>";
            echo "</tr>";
    
            foreach($data as $d)
            {
                
                echo "<tr>";
                echo "<td><a href=single-song-page.php?n=".$d['song_id'].">".$d['title']."</a></td>";
                echo "<td>".$d['year']."</td>";
                echo "<td>".$d['artist_name']."</td>";
                echo "<td>".$d['genre_name']."</td>";
                echo "<td><input type = 'checkbox' name ='favourites[]' value = '".$d['song_id']."'></td>";
                //echo "<td> <a href=search-results-page.php?n=".$d['song_id']."> Add to favourites </a></td>" ;
                echo "</tr>";

                
            }  
            echo "</table>";
                  
            echo "<button type='submit'> Add to favourites </button>";
            echo "</form>"; 

            $checker = 1;

            echo "<h2> You added the following songs to your favourites: </h2>";

            */
        }
    
    }

    else if($userSelection == 'a')
    //User puts artist info on previous page
    {
        if(isset($_GET['artistName'])) //check if rest of the values are 0
        {

            $artistGateway = new ArtistsDB($conn);

            $data = $artistGateway->searchFromArtist($_GET['artistName']);

            outputData($data);



            /*
            echo"<form action = '' method = 'POST'>";
            echo"<table>";
            echo "<tr>";
            echo "<th> Song Title </th>";
            echo "<th> Song Year </th>";
            echo "<th> Artist </th>";
            echo "<th> Genre </th>";
            echo "</tr>";
    
            foreach($data as $d)
            {
                echo "<tr>";
                echo "<td><a href=single-song-page.php?n=".$d['song_id'].">".$d['title']."</a></td>";
                echo "<td>".$d['year']."</td>";
                echo "<td>".$d['artist_name']."</td>";
                echo "<td>".$d['genre_name']."</td>";
                echo "<td><input type = 'checkbox' name ='favourites[]' value = '".$d['song_id']."'></td>";
                //echo "<td> <a href=search-results-page.php?n=".$d['song_id']."> Add to favourites </a></td>" ;
                echo "</tr>";
                
            }  
              
            
            
            echo "</table>";
            
            echo "<button type='submit'> Add to favourites </button>";

            echo "</form>"; 

            $checker = 1;
            echo "<h2> You added the following songs to your favourites: </h2>";

            */
        }

       



    }

    else if ($userSelection == 'g')
    {
    
        //User puts genre info on previous page
        if(isset($_GET['genreName']))
        {

            $genreGateway = new GenresDB($conn);

            $data = $genreGateway->searchFromGenre($_GET['genreName']);

            outputData($data);

            /*
            echo"<form action = '' method = 'POST'>";
            echo"<table>";
            echo "<tr>";
            echo "<th> Song Title </th>";
            echo "<th> Song Year </th>";
            echo "<th> Artist </th>";
            echo "<th> Genre </th>";
            echo "</tr>";

            foreach($data as $d)
            {
               
                
                echo "<tr>";
                echo "<td><a href=single-song-page.php?n=".$d['song_id'].">".$d['title']."</a></td>";
                echo "<td>".$d['year']."</td>";
                echo "<td>".$d['artist_name']."</td>";
                echo "<td>".$d['genre_name']."</td>";
                echo "<td> <input type ='checkbox' name='favourites[]' value='".$d['song_id']."'> </td>";    
                echo "</tr>";
                           
            }  

            echo "</table>";

 

            echo "<button type='submit'> Add to favourites </button>";
            echo "</form>"; 

            
            $checker = 1;

            echo "<h2> You added the following songs to your favourites: </h2>";
    
            */
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

                outputData($data);
                
                /*
                echo"<form action = '' method='POST'>";
                echo"<table>";
                echo "<tr>";
                echo "<th> Song Title </th>";
                echo "<th> Song Year </th>";
                echo "<th> Artist </th>";
                echo "<th> Genre </th>";
                echo "</tr>";
        
                foreach($data as $d)
                {
                    
                    echo "<tr>";
                    echo "<td><a href=single-song-page.php?n=".$d['song_id'].">".$d['title']."</a></td>";
                    echo "<td>".$d['year']."</td>";
                    echo "<td>".$d['artist_name']."</td>";
                    echo "<td>".$d['genre_name']."</td>";
                    echo "<td><input type = 'checkbox' name ='favourites[]' value = '".$d['song_id']."'></td>";
                    //echo "<td> <a href=search-results-page.php?n=".$d['song_id']."> Add to favourites </a></td>" ;
                    echo "</tr>";
                    
                }  

              

               echo "</table>";
               echo "<button type='submit'> Add to favourites </button>";
               echo "</form>";  


               $checker = 1;

               echo "<h2> You added the following songs to your favourites: </h2>";
               
               */
            }
        
        }


        else if ($lessOrGreater == "greater")
        {


            if(isset($_GET['greaterThanYearValue']) && $_GET['greaterThanYearValue'] > 0)
            {

             
                $data = $songsGateway->searchFromYearGT($_GET['greaterThanYearValue']);
        

                outputData($data);

                /*

                echo"<form action = '' method='POST'>";
                echo"<table>";
                echo "<tr>";
                echo "<th> Song Title </th>";
                echo "<th> Song Year </th>";
                echo "<th> Artist </th>";
                echo "<th> Genre </th>";
                echo "</tr>";
        
                foreach($data as $d)
                {
                    
                    echo "<tr>";
                    echo "<td><a href=single-song-page.php?n=".$d['song_id'].">".$d['title']."</a></td>";
                    echo "<td>".$d['year']."</td>";
                    echo "<td>".$d['artist_name']."</td>";
                    echo "<td>".$d['genre_name']."</td>";
                    echo "<td><input type = 'checkbox' name =favourites[] value = '".$d['song_id']."'></td>";
                    //echo "<td> <a href=search-results-page.php?n=".$d['song_id']."> Add to favourites </a></td>" ;
                    echo "</tr>";
    
                
                }  
                
                
                echo "</table>";
                echo "<button type='submit'> Add to favourites </button>";
                echo "</form>"; 

                $checker = 1;


                echo "<h2> You added the following songs to your favourites: </h2>";


                */

          }

        }
    
    
    }
   

    //If user enters two years (still need to do error checking for the above as well. If user enters an invalid input)
    //If user enters an invalid input, we must then redirect the user to an error page. This will be done via the
    // header() function.s

    //At this point the $_POST superglobal array has all of the songs in the favourties section. We now have a superglobal array
    // that is populated with the users info, now we need to make a 

  $_SESSION['favourites'][] = $_POST['favourites']; //AT THIS POINT THE $_SESSION ARRAY has been populated
  


   // print_r($_SESSION);



   //OUTPUTS SONGS (FOR TESTING PURPOSES)

   // Make this a function and add at the end of each conditional

  
  
    //echo "<a href=view-favorites-page.php?item='".$string."'> Click here to view favourites </a>";

    

}

catch(Exception $e)
{
  
die($e->getMessage());
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>