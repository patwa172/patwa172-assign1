
<?php

include 'search-results-page.php';



//print_r($_SESSION);

//Here we will have to use the database once again to display all of the songs and their info

echo "<div>";

echo " <h1>  Your Favourites </h1>";

echo "</div>";


$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$songsGateway = new SongsDB($conn);


if (isset($_GET['favourites'])) 
{ 

  foreach ($_GET['favourites'] as $g) 
  {

      foreach ($_SESSION as $key => $value) 
      {
          foreach ($value as $key2 => $value2)
           {
              foreach ($value2 as $k3 => $v3) 
              {
               
                  if ($v3 == $g) 
                  {
                      unset($_SESSION['favourites'][$key2][$k3]);
             
                  }
              }
           }
      }
  }
}

if (isset($_GET['removeAll'])) 
{
  $_SESSION = [];
}



// Generate the form with updated data



echo "<form action='' method='GET'>";
echo "<table>";
echo "<tr>";
echo "<th> Song Title </th>";
echo "<th> Song Year </th>";
echo "<th> Artist </th>";
echo "<th> Genre </th>";
echo "</tr>";

foreach ($_SESSION as $key => $value) 
{
  
  foreach ($value as $key2 => $value2) 
  {
      foreach ($value2 as $k3 => $v3) 
      {
          // Look up information from your data source using the song ID (assuming it returns an array)
          $data = $songsGateway->searchFromSongId($v3);

          foreach ($data as $d)
          {
              echo "<tr>";
              echo "<td><a href='single-song-page.php?songId=" . $d['song_id'] . "'>" . $d['title'] . "</a></td>";
              echo "<td>" . $d['year'] . "</td>";
              echo "<td>" . $d['artist_name'] . "</td>";
              echo "<td>" . $d['genre_name'] . "</td>";
              echo "<td><input type='checkbox' name='favourites[]' value='" . $d['song_id'] . "'></td>";
              echo "</tr>";
              
          }
      }

  }

}


  
  echo "</table>";
  echo "<button type='submit'> Remove from favorites </button>";
  echo "</form>";

  echo"<form action='' method = GET>";
  echo"<button type='submit' name ='removeAll'> Remove all </button>";
  echo"</form>";






?>

<!-- DO NOT NEED THIS SINCE WE INCLUDE THE PREVIOUS LINKED FILE
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/search-pagecss.css">

</head>

<body>
    
<header>

nav bar goes here
    <h1>Krithik and Paras's Song Database</h1>
    <h2>Song Search</h2>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navigate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a> Need to add link to home page once its creates 
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./search-page.php#">Song Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./single-song-page.php#">Song Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./search-results-page.php#">Search Results</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./view-favorites-page.php#">View Favorites</a>
        </li>
      </form>
    </div>
  </div>
</nav>
</header>
 -->
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

