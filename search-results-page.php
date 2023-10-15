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
          <a class="nav-link " aria-current="page" href="./home-page.php#">Home</a> <!-- Need to add link to home page once its creates -->
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
        <li class="nav-item">
          <a class="nav-link" href="./about-us-page.php#">About Us</a>
        </li>
      </form>
    </div>
  </div>
</nav>
</header>

<?php


include 'includes/config.inc.php';
include 'includes/assign-1-db-classes.inc.php';
include 'includes/functions.inc.php';

header("Access-Control-Allow-Origin: https://example.com");


   session_start();
    
  $userSelection = 1;

    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    
  
    if(isset($_GET['val']))
    {

      if(($_GET['val']) == 1)
      {

        $genresGateway = new GenresDB($conn);

        $data = $genresGateway->getTopGenres();


        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['genre_name'] ."</h1>";
          echo "<h5>". $d['song_count'] ."</h5>";
         


        }
      
      }

      else if(($_GET['val']) == 2)
      {

        $artistsGateway = new ArtistsDB($conn);

        $data = $artistsGateway->getTopArtists();


        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['artist_name'] ."</h1>";
          echo "<h5> Song count: ". $d['song_count'] ."</h5>";
        

        }
        

        
      }

      else if(($_GET['val']) == 3)
      {
        


        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->mostPopular();

        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['title'] ."</h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";
        
        }



      }
      else if(($_GET['val']) == 4)
      {
        


        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->oneHitWonders();

        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['title'] ."</h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";
        
        }


      }
      else if(($_GET['val']) == 5)
      {


        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->acousticSong();

        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['title'] ."</h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";
        
        }

    

      }
    
      else if(($_GET['val']) == 6)
      {

        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->clubMusic();

        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['title'] ."</h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";f
        }

        
      }
      else if(($_GET['val']) == 7)
      {

        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->runningMusic();

        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['title'] ."</h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";f
        }

      }

      else if(($_GET['val']) == 8)
      {
        
        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->studyingMusic();

        //print_r($data);

        foreach ($data as $d)
        {

          echo "<h1>". $d['title'] ."</h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";f
        }




      }
    
    }




    //From song search page

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
           
        }
        $_SESSION['favourites'][] = $_POST['favourites'];
    }

    else if($userSelection == 'a')
    //User puts artist info on previous page
    {
        if(isset($_GET['artistName'])) //check if rest of the values are 0
        {

            $artistGateway = new ArtistsDB($conn);

            $data = $artistGateway->searchFromArtist($_GET['artistName']);

            outputData($data);

        }
        $_SESSION['favourites'][] = $_POST['favourites'];
       



    }

    else if ($userSelection == 'g')
    {
    
        //User puts genre info on previous page
        if(isset($_GET['genreName']))
        {

            $genreGateway = new GenresDB($conn);

            $data = $genreGateway->searchFromGenre($_GET['genreName']);

            outputData($data);

           
        }
        $_SESSION['favourites'][] = $_POST['favourites'];
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
                
                
            }
            $_SESSION['favourites'][] = $_POST['favourites'];
        }


        else if ($lessOrGreater == "greater")
        {


            if(isset($_GET['greaterThanYearValue']) && $_GET['greaterThanYearValue'] > 0)
            {

             
                $data = $songsGateway->searchFromYearGT($_GET['greaterThanYearValue']);
        

                outputData($data);

                
          }
          $_SESSION['favourites'][] = $_POST['favourites'];
        }
    
    
    }
   

    //If user enters two years (still need to do error checking for the above as well. If user enters an invalid input)
    //If user enters an invalid input, we must then redirect the user to an error page. This will be done via the
    // header() function.s

    //At this point the $_POST superglobal array has all of the songs in the favourties section. We now have a superglobal array
    // that is populated with the users info, now we need to make a 

    //$_SESSION['favourites'][] = $_POST['favourites']; //AT THIS POINT THE $_SESSION ARRAY has been populated
  
    //print_r($_SESSION);

    //$_POST = [];

    //$_SESSION = [];





?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<footer class="testfoot">
  COMP 3512 - Web 2
  <br>
  <a href="https://github.com/patwa172/patwa172-assign1.git">Github</a>
  <br>
  &copy; Krithik Jaisankar & Paraspreet Atwal 2023
</footer>