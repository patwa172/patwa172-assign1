<?php
require_once 'includes/config.inc.php';
require_once 'includes/assign-1-db-classes.inc.php';
include('./includes/functions.inc.php');
?>
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
    <h2>Song Information</h2>

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
          <a class="nav-link active" href="./single-song-page.php#">Song Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./search-results-page.php#">Search Results</a>
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

//include ('./includes/functions.inc.php');


?>


<?php
/*
require_once 'includes/config.inc.php';
require_once 'includes/assign-1-db-classes.inc.php';
include('/includes/functions.inc.php');

include '/Applications/XAMPP/xamppfiles/htdocs/patwa172-assign1/patwa172-assign1/includes/functions.inc.php';
*/

$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$songsGateway = new SongsDB($conn);

if(isset($_GET["songId"]))
{

$data = $songsGateway->songInfo($_GET['songId']);



foreach ($data as $d)
{

  echo "<div id='songInfo'>";
  echo "<h1>".$d['title']."</h1>";
  echo "<h5>By: ".$d['artist_name']."</h5>";
  echo "<h5>Artist Type: ".$d['artist_type']."</h5>";
  echo "<h5>Genre: ".$d['genre_name']."</h5>";
  echo "<h5>Year: ".$d['year']."</h5>";
  echo "<h5>Song Duration: ".$d['duration']." seconds </h5>";
  echo "</div>";
  //Create a table here in which all of the info goes

  //if it doesnt work extract all values from $data array and create table outside of loop


  $danceability = $d['danceability'];
  $bpm = $d['bpm'];
  $energy = $d['energy'];
  $loudness = $d['loudness'];
  $liveness = $d['liveness'];
  $valence = $d['valence'];
  $duration = $d['duration'];
  $acousticness = $d['acousticness'];
  $speechiness = $d['speechiness'];
  $popularity = $d['popularity'];

}

echo"</br>";

echo "<h2> Song Analytics </h2>";


echo"</br>";


echo"<table>";
echo "<tr>";
echo "<th> Danceability </th>";
echo "<th> BPM </th>";
echo "<th> Energy </th>";
echo "<th> Loudness </th>";
echo "<th> Liveness </th>";
echo "<th> Valence </th>";
echo "<th> Duration </th>";
echo "<th> Acousticness </th>";
echo "<th> Speechiness </th>";
echo "<th> Popularity </th>";
echo "</tr>";


    

    echo "<tr>";
    echo "<td>".$danceability."</td>";
    echo "<td>".$bpm ."</td>";
    echo "<td>".$energy ."</td>";
    echo "<td>".$loudness."</td>";
    echo "<td>".$liveness ."</td>";
    echo "<td>".$valence ."</td>";
    echo "<td>".$duration ."</td>";
    echo "<td>".$acousticness ."</td>";
    echo "<td>".$speechiness ."</td>";
    echo "<td>".$popularity ."</td>";
   
    echo "</tr>";


    


echo "</table>";


}








?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>