<?php

require_once 'includes/config.inc.php';
require_once 'includes/assign-1-db-classes.inc.php';
include 'includes/functions.inc.php';

?>


<!DOCTYPE html>

<head>



</head>


<body>


<header>

<!--nav bar goes here -->

</header>


<main>


<!-- the form that the user will interact with -->

<form action = "./search-results-page.php" method = "GET">


<!-- Title section -->


<input type ='radio' name = 'type[]' value = 't'> 
Title
<input type = "text" name = 'titleName'>

</br>

<!-- Artist section -->

<input type ='radio' name = 'type[]' value = 'a'> 
Artist


<select name = 'artistName'>

<option></option>


<?php

$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$artistsGateway = new ArtistsDB($conn);

$data = $artistsGateway->getAllArtists();

//Need a way to make the data array unique.

foreach($data as $d)
{

    echo "<option value ='";
    echo $d['artist_name']."'>";
    echo $d['artist_name']."</option>";

 
} 

?>
  

</select>


</br>

<!-- genre section -->

<input type ='radio' name = 'type[]' value = 'g'> 
Genre

<select name = 'genreName'>

<option></option>


<?php


$genresGateway = new GenresDB($conn);

$data = $genresGateway->getAllGenres();


foreach($data as $d)
{

    echo "<option value ='";
    echo $d['genre_name']."'>";
    echo $d['genre_name']."</option>";
} 


?>

</select>

</br>


<!-- year section -->

<input type ='radio' name = 'type[]' value = 'y'> 
Year

<input type ='radio' name = 'lessOrGreater[]' value = 'less'> 
Less
<input type = 'text' name = 'lessThanYearValue'>

<input type ='radio' name = 'lessOrGreater[]' value = 'greater'> 
Greater
<input type = 'text' name = 'greaterThanYearValue'>

</br>

<input type = 'submit'>

</form>


</main>



</body>


</html>