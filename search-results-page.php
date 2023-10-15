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
    <h1>Krithik and Paraspreet's Song Database</h1>
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
          <a class="nav-link" href="./search-page.php">Song Search</a>
        </li>
        <li class="nav-item">
                  <a class="nav-link" href='./single-song-page.php?message=error'>Song Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='./search-results-page.php?output=all'>Search Results</a>
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


  session_start();
    
  $userSelection = 1;

    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    
    if ($_GET['output'])
    {

      $songsGateway = new SongsDB($conn);

        $data = $songsGateway->getAll();

        outputData($data);
        
    }
  
    if(isset($_GET['val']))
    {

      if(($_GET['val']) == 1)
      {

        $genresGateway = new GenresDB($conn);

        $data = $genresGateway->getTopGenres();

        //print_r($data);

        echo "<h1> Genres </h1>";

        foreach ($data as $d)
        {

          echo "<div>";
          echo "<h1>". $d['genre_name'] ."</h1>";
          echo "<h5> Song count: ". $d['song_count'] ."</h5>";
          echo "</div>";
         


        }
      
      }

      else if(($_GET['val']) == 2)
      {

       
        $artistsGateway = new ArtistsDB($conn);

        $data = $artistsGateway->getTopArtists();


        
        echo "<h1> Artists </h1>";

        foreach ($data as $d)
        {

          echo "<div>";
          echo "<h1>". $d['artist_name'] ."</h1>";
          echo "<h5> Song count: ". $d['song_count'] ."</h5>";
          echo "</div>";
        

        }
        

        
      }

      else if(($_GET['val']) == 3)
      {
        
        $x=0;

        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->mostPopular();

        
        echo "<h1> Songs </h1>";

        foreach ($data as $d)
        {

          echo "<h1><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         // echo "<h5> Popularity score:".$d['popularity']."</h5>";
        
        }



      }
      else if(($_GET['val']) == 4)
      {
        
        $x=0;


        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->oneHitWonders();

        //print_r($data);


        echo "<h1> Songs </h1>";

        foreach ($data as $d)
        {

          echo "<h1><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
       
        
        }


      }
      else if(($_GET['val']) == 5)
      {

        $x=0;

        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->acousticSong();

        echo "<h1> Songs </h1>";

        foreach ($data as $d)
        {

          echo "<h1><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
    
        
        }

    

      }
    
      else if(($_GET['val']) == 6)
      {
        $x=0;

        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->clubMusic();

        echo "<h1> Songs </h1>";

        foreach ($data as $d)
        {

          echo "<h1><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         
        }

        
      }
      else if(($_GET['val']) == 7)
      {
        $x=0;

        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->runningMusic();

      

        echo "<h1> Songs </h1>";

        foreach ($data as $d)
        {

          echo "<h1><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></h1>";
          echo "<h5> Artist name: ". $d['artist_name'] ."</h5>";
         
        }

      }

      else if(($_GET['val']) == 8)
      {
        
        $x=0;
        $songsGateway = new SongsDB($conn);

        $data = $songsGateway->studyingMusic();

        echo "<h1> Songs </h1>";

        foreach ($data as $d)
        {

          echo "<h1><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></h1>";
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

    if($userSelection == 't' )
    {
        //User puts title info on previous page

        if(isset($_GET['titleName']) && $_GET['titleName'] != '') //Check for greater than 0 for accuracy
        {

            $data = $songsGateway->searchFromTitle($_GET['titleName']);

            outputData($data);
           
        }
        else
        {
          
          echo "<h1>You did not enter a song name. Please go back and try again.</h1>";
          echo "<h3><p><a href = 'search-page.php'>Click here </a>to go back.</p></h3>";
        }
        $_SESSION['favourites'][] = $_POST['favourites'];
   
   
   
      }

    else if($userSelection == 'a')
        //User puts artist info on previous page
    {

      
        if(isset($_GET['artistName']) && ($_GET['artistName'] !='')) //check if rest of the values are 0
        {

            $artistGateway = new ArtistsDB($conn);

            $data = $artistGateway->searchFromArtist($_GET['artistName']);

            outputData($data);

        }
        else
        {

          echo "<h1>You did not select an Artist. Please go back and try again.</h1>";
          echo "<h3><p><a href = 'search-page.php'>Click here </a>to go back.</p></h3>";

        }


        $_SESSION['favourites'][] = $_POST['favourites'];
       



    }

    else if ($userSelection == 'g')
    {
     
        //User puts genre info on previous page
        
        if(isset($_GET['genreName']) && $_GET['genreName'] != '') 
        {

            $genreGateway = new GenresDB($conn);

            $data = $genreGateway->searchFromGenre($_GET['genreName']);

            outputData($data);

           
        }
        else
        {

          echo "<h1>You did not select a Genre. Please go back and try again.</h1>";
          echo "<h3><p><a href = 'search-page.php'>Click here </a>to go back.</p></h3>";

        }
        $_SESSION['favourites'][] = $_POST['favourites'];
    }

    // user selects year info in pervious page

    else if($userSelection == 'y')
    { 
    
        if($lessOrGreater == "less")
        {

            if(isset($_GET['lessThanYearValue']) && $_GET['lessThanYearValue'] >= 2017 && $_GET['lessThanYearValue'] <= 1000 )
            {
                $data = $songsGateway->searchFromYearLT($_GET['lessThanYearValue']);

                outputData($data);
                
                
            }

            else
            {
              echo "<h1>You did not select a valid Year. Please go back and try again.</h1>";
              echo "<h3><p><a href = 'search-page.php'>Click here </a>to go back.</p></h3>";

            }
            $_SESSION['favourites'][] = $_POST['favourites'];
        
        
        
        
          }


        else if ($lessOrGreater == "greater")
        {
          

            if(isset($_GET['greaterThanYearValue']) && $_GET['greaterThanYearValue'] >= 0 && $_GET['greaterThanYearValue'] <= 2018)
            {

             
                $data = $songsGateway->searchFromYearGT($_GET['greaterThanYearValue']);
        

                outputData($data);

                
           }
           else
           {
           
            echo "<h1>You did not select a valid Year. Please go back and try again.</h1>";
            echo "<h3><p><a href = 'search-page.php'>Click here </a>to go back.</p></h3>";

           }
          $_SESSION['favourites'][] = $_POST['favourites'];
        }
        
    
    }

   

    //$_SESSION = [];



?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
