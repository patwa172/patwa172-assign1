<?php 

require_once 'assign-1-db-classes.inc.php';

function outputData($data)
{
    echo "<form action = '' method='POST' >";
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


            echo "<h2> You added the following songs to your favourites: </h2>";

            echo "<a href=view-favorites-page.php?item='".$string."'> Click here to view favourites </a>";

    
}




?>