
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
            if ($value2 != null){
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
    if ($value2 != null){

    
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

}


  
  echo "</table>";
  echo "<button type='submit'> Remove from favorites </button>";
  echo "</form>";

  echo"<form action='' method = GET>";
  echo"<button type='submit' name ='removeAll'> Remove all </button>";
  echo"</form>";






?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

