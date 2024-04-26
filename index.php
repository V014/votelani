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
                <li><a href="verification.html">Verification</a></li>
                <li><a href="ballot.html">Ballot</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
        <!-- This navigation bar appears on small screens -->
        <div class="dropdown">
            <div class="hamburger-btn"></div>
            <div class="dropdown-content">
                <a>Menu</a>
                <a href="index.html" class="active-menu">Home</a>
                <a href="verification.html">Verification</a>
                <a href="ballot.html">Ballot</a>
                <a href="about.html">About</a>
              </div>
        </div>
    </nav>

    <!-- Voting Form -->
    <div class="content">
      <form action="#" method="post">
        <h3>Voter's ID</h3>
        <input class="textfield" type="text" name="voteID" placeholder="e.g. X23R4T" required> 
        <!-- select president -->
        <div class="selection">
          <h3>Leader</h3>
          <!-- id tag pointing to an image element on change -->
          <select name="president" id="president-select" onchange="fetchData(PresidentID)">
            <option value="person">Choose president</option>
            <option presidentID="1" value="Lazarus_Chakwera">Lazarus Chakwera</option>
            <option presidentID="2" value="Peter_Mutharika">Peter Mutharika</option>
            <option presidentID="3" value="Atupele_Muluzi">Atupele Muluzi</option>
          </select>
        </div>

        <!-- select chancellor -->
        <div class="selection">
          <h3>Chancellor</h3>
          <!-- id tag pointing to an image element on change -->
          <select name="chancellor" id="chancellor-select" onchange="fetchData(ChancellorID)">
            <option value="person">Choose Chancellor</option>
            <option ChancellorID="4" value="Leonard_Chimbanga">Leonard Chimbanga BT</option>
            <option ChancellorID="5" value="Noel_Chalamanda">Noel Chalamanda BT</option>
          </select>
        </div>

        <!-- select member of parliament -->
        <div class="selection">
          <h3>Member of parliament</h3>
          <!-- id tag pointing to an image element on change -->
          <select name="mp" id="mp-select" onchange="fetchData(MPID)">
            <option value="person">Choose MP</option>
            <option MPID="6" value="John_Bande">John Bande</option>
            <option MPID="7" value="Nicholas_Dausi">Nicholas Dausi</option>
            <option MPID="8" value="Patricia_Kaliati">Patricia Kaliati</option>
          </select>
        </div>
        <input class="button" type="submit" value="Vote" name="vote">
      </form> <!-- closed form -->

      <!-- Candidate images -->
      <div class="candidates">
        <div class="gallery">
          <!-- id tag pointing to select president option -->
          <img id="president-image" src="img/person.png" alt="Image of selected president">
          <!-- Vote count -->
          <p><div id="data-container">0</div></p>
        </div>

        <div class="gallery">
          <!-- id tag pointing to select chancellor option -->
          <img id="chancellor-image" src="img/person.png" alt="Image of selected chancellor">
          <!-- Vote count -->
          <p><div id="data-container">0</div></p>
        </div>

        <div class="gallery">
          <!-- id tag pointing to select member of parliament option -->
          <img id="mp-image" src="img/person.png" alt="Image of selected member of parliament">
          <!-- Vote count -->
          <p><div id="data-container">0</div></p>
        </div>
      </div>

    </div> <!-- end of content -->
    
    <footer>
        Orbit Media All rights reserved &copy;2024
    </footer>
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
      function fetchData(selectElement, selectedCandidate) {
        // Get the selected candidate and selection option
        selectedCandidate = selectElement.options[selectElement.selectedIndex].text;
        const selectionOption = selectElement.id; // e.g., "president-select"

        // Send a GET request to the PHP script with the selected candidate and selection option
        fetch(`php/getData.php?selectedCandidate=${selectedCandidate}&selectionOption=${selectionOption}`)
          .then(response => response.text())
          .then(data => {
            const dataContainer = document.getElementById('data-container');
            dataContainer.innerHTML = `Vote count for ${selectedCandidate}: ${data}`;
          });
      }

      fetchData("president-select");
      fetchData("chancellor-select");
      fetchData("mp-select");
    </script>
</body>
</html>