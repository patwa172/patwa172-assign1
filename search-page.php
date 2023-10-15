<?php
require_once 'includes/config.inc.php';
require_once 'includes/assign-1-db-classes.inc.php';
include 'includes/functions.inc.php';
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
    <h1>Krithik and Paraspreet's Song Database</h1>
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
          <a class="nav-link " aria-current="page" href="./home-page.php#">Home</a> <!-- Need to add link to home page once its creates -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./search-page.php#">Song Search</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href='./single-song-page.php?message=error'>Song Info</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href='./search-results-page.php?output=all'>Search Results</a>
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


<main>



<!-- the form that the user will interact with -->
<?php 



?>


<fieldset>
  <form id=form action = "./search-results-page.php" method = "GET">

<label><h3> Welcome to our song database. To find your favourite songs, please begin by filling out the information below. </h3></label>
<!-- Title section -->

<div class="form-check">
    <input class="form-check-input" type="radio" name='type[]' value='t' id="flexRadioDefault1">
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
    <input type="text" name = 'titleName' class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
</div>

<br>

<!-- Artist section -->
<div class="input-group mb-3">
<div class="form-check">
    <input class="form-check-input" type="radio" name='type[]' value='a' id="flexRadioDefault1">
    <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Artist</label>
  <select class="form-select" name='artistName' id="inputGroupSelect01">
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
</div>
</div>
</div>

<!-- genre section -->
<div class="input-group mb-3">
<div class="form-check">
    <input class="form-check-input" type="radio" name='type[]' value='g' id="flexRadioDefault1">
    <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Genre</label>
  <select class="form-select" name='genreName' id="inputGroupSelect01">
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
</div>
</div>
</div>

<!-- year section -->

<div class="form-check">
<input class="form-check-input" type="radio" name='type[]' value='y' id="flexRadioDefault1">
Year
<br>
<br>

<div class="form-check">
    <input class="form-check-input" type="radio" name='lessOrGreater[]' value='less' id="flexRadioDefault1">
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Less</span>
    <input type="text" name = 'lessThanYearValue' class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
</div>

<div class="form-check">
    <input class="form-check-input" type="radio" name='lessOrGreater[]' value='greater' id="flexRadioDefault1">
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Greater</span>
    <input type="text" name = 'greaterThanYearValue' class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
</div>
</div>

</br>

<input type = 'submit' val=sub>

</form>  
</fieldset>

<footer class="testfoot">
  COMP 3512 - Web 2
  <br>
  <a href="https://github.com/patwa172/patwa172-assign1.git">Github</a>
  <br>
  &copy; Krithik Jaisankar & Paraspreet Atwal 2023
</footer>

</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>