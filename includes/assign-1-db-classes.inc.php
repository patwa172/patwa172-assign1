<?php


//Database helper class

class DatabaseHelper 
{
    /*  Returns a connection object to a database  */
public static function createConnection ($values=array()) 
{
$connString = $values[0];
$user = $values[1];
$password = $values[2];
$pdo = new PDO($connString,$user,$password); 
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 

return $pdo;

}

public static function runQuery($connection, $sql, $parameters)
{ 

$statement = null;
    // if there are parameters then do a prepared statement
if (isset($parameters)) 
{
      // Ensure parameters are in an array
if (!is_array($parameters)) 
{
$parameters = array($parameters); 
}
      // Use a prepared statement if parameters
$statement = $connection->prepare($sql); $executedOk = $statement->execute($parameters); 
if (! $executedOk) throw new PDOException;

} 

else 
{
      // Execute a normal query
$statement = $connection->query($sql);
if (!$statement) throw new PDOException; 

}
return $statement;


}

}




//The folloing are databases for each of the tables.
class SongsDB
{


    private static $baseSQL = "SELECT DISTINCT song_id, title, year, artists.artist_name as artist_name, genres.genre_name as genre_name FROM songs INNER JOIN artists on songs.artist_id = artists.artist_id INNER JOIN genres ON  songs.genre_id = genres.genre_id";
    
    private static $baseSQL2 ="SELECT DISTINCT year FROM songs";

    private static $baseSQL3 =  "SELECT DISTINCT bpm, energy, danceability, liveness, valence, acousticness, speechiness, popularity, duration, loudness, song_id, title, year, artists.artist_name as artist_name, genres.genre_name as genre_name FROM songs INNER JOIN artists on songs.artist_id = artists.artist_id INNER JOIN genres ON  songs.genre_id = genres.genre_id";


    private static $baseSQL4 = "SELECT title, songs.artist_id, artists.artist_name From songs INNER JOIN artists ON artists.artist_id = songs.artist_id";
    


    //$baseSQL = 'SELECT * FROM songs Order by title';

    public function __construct($connection)
    {

        $this->pdo = $connection;

    }


    public function songInfo($userInput)
    {

        $sql = self::$baseSQL3. " WHERE song_id LIKE ?";

        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($userInput));

        return $statement->fetchAll();


    }

    
    public function getAll() //can make it so that this function takes in parameters of an sql statement 
    {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll();

    }

    //This is where we write all of our functions

    public function searchFromSongId($userInput)
    {

        $sql = self::$baseSQL. " WHERE song_id LIKE ?";

        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($userInput));

        return $statement->fetchAll();


    }


    public function searchFromTitle($userInput)
    {

        $sql = self::$baseSQL. " WHERE songs.title LIKE ?";

        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($userInput));

        return $statement->fetchAll();

    }

    public function getAllYears()
    {

        $sql = self::$baseSQL2;

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();
    }


    public function searchFromYearLT($userInput)
    {

        $sql =self::$baseSQL. " WHERE year < ?";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,array($userInput));

        return $statement->fetchAll();


    }

    public function searchFromYearGT($userInput)
    {

        $sql =self::$baseSQL. " WHERE year > ?";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,array($userInput));

        return $statement->fetchAll();


    }

    public function searchFromYears($userInput1, $userInput2)
    {

        $sql =self::$baseSQL. " WHERE year BETWEEN ? AND ?";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,array($userInput,$userInput2));

        return $statement->fetchAll();


    }

    public function searchTopGenres() 
    {
        $sql =self::$baseSQL. " WHERE year < ?";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,array($userInput));

        return $statement->fetchAll();
    }


    public function mostPopular()
    {

        $sql = self::$baseSQL." ORDER BY popularity DESC LIMIT 10";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();

    }

    public function oneHitWonders()
    {

        $sql = self::$baseSQL4." GROUP BY songs.artist_id HAVING count(songs.artist_id) = 1 LIMIT 10";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();

    }


    public function acousticSong()
    {

        $sql = self::$baseSQL3." WHERE acousticness >= 40 ORDER BY duration DESC LIMIT 10";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();

    }

    public function clubMusic()
    {

        $sql = self::$baseSQL3." WHERE danceability > 80 ORDER BY ((danceability*1.6) + (energy*1.4)) DESC LIMIT 10";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();

        
    }

    public function runningMusic()
    {

        $sql = self::$baseSQL3." WHERE bpm BETWEEN 120 AND 125 ORDER BY ((valence*1.6) + (energy*1.3)) DESC LIMIT 10";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();

        
    }

    public function studyingMusic()
    {

        $sql = self::$baseSQL3." WHERE bpm BETWEEN 100 AND 115 AND speechiness BETWEEN 1 AND 20 ORDER BY ((acousticness*0.8) + (100-speechiness) + (100 - valence)) DESC LIMIT 10";

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();

        
    }


}



class ArtistsDB
{

    public function __construct($connection)
    {

        $this->pdo = $connection;

    }

    private static $baseSQL = "SELECT DISTINCT artist_name From artists";

    private static $baseSQL2 =  "SELECT DISTINCT song_id, title, year, artists.artist_name as artist_name, genres.genre_name as genre_name FROM songs INNER JOIN artists on songs.artist_id = artists.artist_id INNER JOIN genres ON  songs.genre_id = genres.genre_id";
    
    private static $baseSQL3 = "SELECT artists.artist_name, COUNT(songs.song_id) as song_count FROM artists INNER JOIN songs ON songs.artist_id = artists.artist_id GROUP BY artist_name ORDER BY song_count DESC LIMIT 10";
   

    public function getAllArtists()
    {
        $sql = self::$baseSQL;
        
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 

        return $statement->fetchAll();



    }


    public function searchFromArtist($userInput)
    {

        $sql = self::$baseSQL2. " WHERE artists.artist_name LIKE ?";

        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($userInput));

        return $statement->fetchAll();

    }

    public function getTopArtists()
    {


        $sql = self::$baseSQL3;

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();   

    }


}



class GenresDB
{

    //Constructor for genres class

    public function __construct($connection)
    {
        $this->pdo = $connection;
    }

    private static $baseSQL = "SELECT DISTINCT genre_name from genres";

    private static $baseSQL2 = "SELECT DISTINCT song_id, title, year, artists.artist_name as artist_name, genres.genre_name as genre_name FROM songs INNER JOIN artists on songs.artist_id = artists.artist_id INNER JOIN genres ON  songs.genre_id = genres.genre_id";
    
    private static $baseSQL3 = "SELECT genres.genre_name, COUNT(songs.song_id) as song_count FROM songs INNER JOIN genres ON songs.genre_id = genres.genre_id GROUP BY genre_name ORDER BY song_count DESC LIMIT 10";
    
    public function getAllGenres()
    {

        $sql = self::$baseSQL;

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();


    }

    public function searchFromGenre($userInput)
    {

        $sql = self::$baseSQL2. " WHERE genres.genre_name LIKE ?"; 

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,array($userInput));

        return $statement->fetchAll();   

    }

    public function getTopGenres()
    {


        $sql = self::$baseSQL3;

        $statement = DatabaseHelper::runQuery($this->pdo,$sql,null);

        return $statement->fetchAll();   



    }


}


?> 