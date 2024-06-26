<?php
include "php/connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Votelani</title>
  <script src="js/jquery.min.js"></script>
</head>

<body>
  <!-- Navigation list -->
  <nav>
    <span class="brand">Votelani</span>
    <div class="nav">
      <ul>
        <li><a href="index.html" class="active-nav">Home</a></li>
        <li><a href="ballot.html">Ballot</a></li>
        <li><a href="verification.html">Verification</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </div>
    <!-- This navigation bar appears on small screens -->
    <div class="dropdown">
      <div class="hamburger-btn"></div>
      <div class="dropdown-content">
        <a>Menu</a>
        <a href="index.html" class="active-menu">Home</a>
        <a href="ballot.html">Ballot</a>
        <a href="verification.html">Verification</a>
        <a href="about.html">About</a>
      </div>
    </div>
  </nav>

  <div class="content">
    <!-- Voting Form -->
    <form action="" method="post">
    <h3 class="heading" id="eventID" value="1">Malawi Tripartite Elections 2024</h3>
      <p>Voter's ID</p>
      <input class="textfield" type="text" name="voterID" id="voterID" placeholder="e.g. X23R4T" required>
      <!-- select president -->
      <div class="selection">
        <p>Leader</p>
        <!-- id tag pointing to an image element on change -->
        <select name="president" id="PresidentID">
          <option value="person">Choose president</option>
          <option data-id="1" value="Lazarus_Chakwera">Lazarus Chakwera</option>
          <option data-id="2" value="Peter_Mutharika">Peter Mutharika</option>
          <option data-id="3" value="Atupele_Muluzi">Atupele Muluzi</option>
        </select>
      </div>

      <!-- select chancellor -->
      <div class="selection">
        <p>Chancellor</p>
        <!-- id tag pointing to an image element on change -->
        <select name="chancellor" id="ChancellorID">
          <option value="person">Choose Chancellor</option>
          <option data-id="4" value="Leonard_Chimbanga">Leonard Chimbanga BT</option>
          <option data-id="5" value="Noel_Chalamanda">Noel Chalamanda BT</option>
        </select>
      </div>

      <!-- select member of parliament -->
      <div class="selection">
        <p>Member of parliament</p>
        <!-- id tag pointing to an image element on change -->
        <select name="mp" id="MPID">
          <option value="person">Choose MP</option>
          <option data-id="6" value="John_Bande">John Bande</option>
          <option data-id="7" value="Nicholas_Dausi">Nicholas Dausi</option>
          <option data-id="8" value="Patricia_Kaliati">Patricia Kaliati</option>
        </select>
      </div>
      <input class="button" type="submit" value="Vote" name="vote" id="submit">
      <div id="reply"></div>
    </form> <!-- closed form -->

    <!-- Candidate images -->
    <div class="candidates">
      <div class="gallery">
        <!-- id tag pointing to select president option -->
        <img id="president-image" src="img/person.png" alt="Image of selected president">
        <!-- Vote count -->
        <p>
        <div id="president-vote-count" class="voteCounter">0</div>
        </p>
      </div>

      <div class="gallery">
        <!-- id tag pointing to select chancellor option -->
        <img id="chancellor-image" src="img/person.png" alt="Image of selected chancellor">
        <!-- Vote count -->
        <p>
        <div id="chancellor-vote-count" class="voteCounter">0</div>
        </p>
      </div>

      <div class="gallery">
        <!-- id tag pointing to select member of parliament option -->
        <img id="mp-image" src="img/person.png" alt="Image of selected member of parliament">
        <!-- Vote count -->
        <p>
        <div id="mp-vote-count" class="voteCounter">0</div>
        </p>
      </div>
    </div>
  </div> <!-- end of content -->

  <footer>
    Orbit Media &copy; All rights reserved 2024
  </footer>
  <script src="js/changeImage.js"></script>
  <script src="js/castVote.js"></script>
  <script src="js/fetchVote.js"></script>
</body>

</html>
