
<?php

include 'search-results-page.php';
$_SESSION['favourites'][] = $_POST['favourites'];



//Here we will have to use the database once again to display all of the songs and their info
//this file includes the search results file and is used to display all of the favorites of
//the user that were chosen.
echo "<div>";

echo " <h1>  Your Favourites </h1>";

echo "</div>";


$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$songsGateway = new SongsDB($conn);

//this chunk of code is responsible for taking away songs from the session array that the user
//wants to remove.
if (isset($_GET['favourites'])) 
{ 

  foreach ($_GET['favourites'] as $g) 
  {

      foreach ($_SESSION as $key => $value) 
      {
          foreach ($value as $key2 => $value2)
           {
            if ($value2 != null)
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
}
//this chunk of the code removes everything from the session array if the user selects the 
//remove all button
if (isset($_GET['removeAll'])) 
{
  $_SESSION = [];
}

//this chunk of the code is responsible for outputting the users favorite songs.
if (count($_SESSION) > 0)
{
echo "<form action='' method='GET'>";
echo "<table>";
echo "<tr>";

echo "<th> Song Title </th>";
echo "<th> Song Year </th>";
echo "<th> Artist </th>";
echo "<th> Genre </th>";


echo "</tr>";
}

//this chunk of the code iterates through the session array to display all of the songs in
//the favorites list.
foreach ($_SESSION as $key => $value) 
{
  
  foreach ($value as $key2 => $value2) 
  { 
    if ($value2 != null)
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

}


  if (count($_SESSION) > 0)
  {
  echo "</table>";
  
  echo "</br>";
  echo "</br>";
  

  echo "<button type='submit' name ='remove'> Remove from favorites </button>";
  echo "</form>";

  echo"<form action='' method = GET>";
  echo"<button type='submit' name ='removeAll'> Remove all </button>";
  echo"</form>";
  

  }


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
