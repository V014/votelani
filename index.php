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
  <title>Vote Leader</title>
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
    <form action="#" method="post">
    <h3 class="heading">Malawi Presidential Elections 2024</h3>
      <h5>Voter's ID</h5>
      <input class="textfield" type="text" name="voteID" id="voteID" placeholder="e.g. X23R4T" required>
      <!-- select president -->
      <div class="selection">
        <h5>Leader</h5>
        <!-- id tag pointing to an image element on change -->
        <select name="president" id="president-select">
          <option value="person">Choose president</option>
          <option data-id="1" value="Lazarus_Chakwera">Lazarus Chakwera</option>
          <option data-id="2" value="Peter_Mutharika">Peter Mutharika</option>
          <option data-id="3" value="Atupele_Muluzi">Atupele Muluzi</option>
        </select>
      </div>

      <!-- select chancellor -->
      <div class="selection">
        <h5>Chancellor</h5>
        <!-- id tag pointing to an image element on change -->
        <select name="chancellor" id="chancellor-select">
          <option value="person">Choose Chancellor</option>
          <option data-id="4" value="Leonard_Chimbanga">Leonard Chimbanga BT</option>
          <option data-id="5" value="Noel_Chalamanda">Noel Chalamanda BT</option>
        </select>
      </div>

      <!-- select member of parliament -->
      <div class="selection">
        <h5>Member of parliament</h5>
        <!-- id tag pointing to an image element on change -->
        <select name="mp" id="mp-select">
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
        <div id="president-vote-count">0</div>
        </p>
      </div>

      <div class="gallery">
        <!-- id tag pointing to select chancellor option -->
        <img id="chancellor-image" src="img/person.png" alt="Image of selected chancellor">
        <!-- Vote count -->
        <p>
        <div id="chancellor-vote-count">0</div>
        </p>
      </div>

      <div class="gallery">
        <!-- id tag pointing to select member of parliament option -->
        <img id="mp-image" src="img/person.png" alt="Image of selected member of parliament">
        <!-- Vote count -->
        <p>
        <div id="mp-vote-count">0</div>
        </p>
      </div>
    </div>

  </div> <!-- end of content -->

  <footer>
    Orbit Media &copy; All rights reserved 2024
  </footer>
  <script src="js/castVote.js"></script>
  <script>
    // function that changes the selected images to selected candidates
    function changeImage(selectedElem, imgElem) {
      // declare variables
      let img = document.getElementById(imgElem);
      let select = document.getElementById(selectedElem);
      // device image update event
      select.addEventListener("change", function(e) {
        let selected = e.target.value;
        img.src = `img/${selected}.png`;
      });
    }

    // Call the change name function to react to change
    changeImage("president-select", "president-image");
    changeImage("chancellor-select", "chancellor-image");
    changeImage("mp-select", "mp-image");

    // function that checks the current vote count of selected candidate
    function fetchVote(selectElement, voteTarget) {
      //Add onchange event listener to the selectEleement and when its
      //selected value changes trigger a fetch request to the getVoteCount.php
      //endpoint and parse the JSON response voute count and update the value
      //of the voteTarget element
      selectElement = document.getElementById(selectElement);
      voteTarget = document.getElementById(voteTarget);

      selectElement.addEventListener("change", function(e) {
        //Access the available options in the select element and get the one
        //options the user has chosen using the currently selected index of the
        //select element
        let selectedOption = selectElement.options[selectElement.selectedIndex];
        let candidateID = selectedOption.getAttribute('data-id');

        if (candidateID != null || candidateID != undefined) {
          // Make an AJAX request to retrieve the vote count
          fetch(`php/getVoteCount.php?selectedCandidate=${candidateID}&selectionOption=${''}`)
            .then(response => {
              response.json().then(json => voteTarget.innerHTML = json['vote_count']);
            })
            .catch(error => {
              console.error('Error fetching vote count:', error);
              voteTarget.innerHTML = 'Error fetching vote count';
            });
        } else {
          voteTarget.innerHTML = 0;
        }
      });
    }

    fetchVote("president-select", "president-vote-count");
    fetchVote("chancellor-select", "chancellor-vote-count");
    fetchVote("mp-select", "mp-vote-count");
  </script>
</body>

</html>
