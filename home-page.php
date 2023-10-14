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
          <a class="nav-link active" aria-current="page" href="./home-page.php#">Home</a> <!-- Need to add link to home page once its creates -->
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
          <a class="nav-link" href="./view-favorites-page.php#">View Favorites</a>
        </li>
      </form>
    </div>
  </div>
</nav>
</header>

<main>

<div class="grid-container">
  <div class="grid-item1"><a href="./search-results-page.php#?"><img href="./search-results-page.php#?" src="./pics/topGenres.jpg" alt=""></a></div>
  <div class="grid-item2"><a href="./search-results-page.php#?"><img src="./pics/topArtists.jpg" alt=""></a></div>
  <div class="grid-item3"><a href="./search-results-page.php#?"><img src="./pics/mostPopularSongs.jpg" alt=""></a></div>
  <div class="grid-item4"><a href="./search-results-page.php#?"><img src="./pics/oneHitWonders.jpg" alt=""></a></div>
  <div class="grid-item5"><a href="./search-results-page.php#?"><img src="./pics/longestAcousticSongs.jpg" alt=""></a></div>
  <div class="grid-item6"><a href="./search-results-page.php#?"><img src="./pics/atTheClub.jpg" alt=""></a></div>
  <div class="grid-item7"><a href="./search-results-page.php#?"><img src="./pics/runningSongs.jpg" alt=""></a></div>
  <div class="grid-item8"><a href="./search-results-page.php#?"><img src="./pics/studying.jpg" alt=""></a></div>
</div>


</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>