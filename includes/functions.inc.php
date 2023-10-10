<?php 

require_once 'assign-1-db-classes.inc.php';

function outputData($d)
{

    echo "</br>";
    echo $d['title']. "</br>";
    echo $d['year']. "</br>";
    echo $d['artist_name']. "</br>";
    echo $d['genre_name']. "</br>";
    echo "-----------------";  


}








































//First are all of the functions that incorporate the database.
//These functions will be used in a file that we get redirected too upon
//The submission of a form.

//These functions can also take in user input. When we call
//These functions, the user input will be taken from the 
//$_GET superglobal array.

//Remember to create an output function.

/*
function getAllSongs()
{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

    $sql = "SELECT * FROM songs";

    $data = DatabaseHelper::runQuery($conn,$sql,null);

    return $data;
}


//this function takes in user input and outputs all the info for the song that they requested
// via the title
function searchSongTite($songName) 
{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

    //$sql = "SELECT * from songs where title=?";

    $sql = "SELECT songs.title, songs.year, genres.genre_name FROM songs JOIN genres ON songs.genre_id = genres.genre_id WHERE songs.title like ?"; //LEFT JOIN artists ON songs.artist_id = artists.artist_id WHERE songs.title=?";

    $data = DatabaseHelper::runQuery($conn,$sql,Array($songName));

    foreach($data as $d)
    {

        echo $d['title'];

        echo "</br>";

        echo $d['genre_name'];

        echo "</br>";

        echo $d['year'];

        //artist name (change sql statement)

    }

}


*/






?>