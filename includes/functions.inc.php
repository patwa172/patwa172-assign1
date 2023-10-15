<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/search-pagecss.css">

</head>

<?php 
require_once 'assign-1-db-classes.inc.php';

function outputData($data)
{
    echo "<form action = '' method='POST' >";
            echo"<table>";
            echo "<tr>";
            echo "<th class='heading'> Song Title </th>";
            echo "<th> Song Year </th>";
            echo "<th> Artist </th>";
            echo "<th> Genre </th>";
            echo "</tr>";
    
            foreach($data as $d)
            {
                

                echo "<tr>";
                echo "<td><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></td>";
                echo "<td>".$d['year']."</td>";
                echo "<td>".$d['artist_name']."</td>";
                echo "<td>".$d['genre_name']."</td>";
                echo "<td><input type = 'checkbox' name ='favourites[]' value = '".$d['song_id']."'></td>";
            
                echo "</tr>";


                
            }

            echo "</table>";
                  
            echo "<button type='submit'> Add to favourites </button>";
            echo "</form>"; 


            echo "<h2> You added the following songs to your favourites: </h2>";

            echo "<a href=view-favorites-page.php> Click here to view favourites </a>";

    
}


function outputData2($d)
{


    echo "<tr>";
    echo "<td><a href=single-song-page.php?songId=".$d['song_id'].">".$d['title']."</a></td>";
    echo "<td>".$d['year']."</td>";
    echo "<td>".$d['artist_name']."</td>";
    echo "<td>".$d['genre_name']."</td>";
    echo "<td><input type = 'checkbox' name ='items[]' value = '".$d['song_id']."'></td>";
   
    echo "</tr>";


}

?>

