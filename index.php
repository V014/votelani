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
            <option value="Lazarus_Chakwera">Lazarus Chakwera</option>
            <option value="Peter_Mutharika">Peter Mutharika</option>
            <option value="Atupele_Muluzi">Atupele Muluzi</option>
          </select>
        </div>

        <!-- select chancellor -->
        <div class="selection">
          <h3>Chancellor</h3>
          <!-- id tag pointing to an image element on change -->
          <select name="chancellor" id="chancellor-select" onchange="fetchData(ChancellorID)">
            <option value="img/person.png">Choose Chancellor</option>
            <option value="img/Leonard_Chimbanga.jpg">Leonard Chimbanga BT</option>
            <option value="img/Noel_Chalamanda.jpg">Noel Chalamanda BT</option>
          </select>
        </div>

        <!-- select member of parliament -->
        <div class="selection">
          <h3>Member of parliament</h3>
          <!-- id tag pointing to an image element on change -->
          <select name="mp" id="mp-select" onchange="fetchData(MPID)">
            <option value="img/person.png">Choose MP</option>
            <option value="img/John_Bande.jpg">John Bande</option>
            <option value="img/Nicholas_Dausi.jpg">Nicholas Dausi</option>
            <option value="img/Patricia_Kaliati.jpg">Patricia Kaliati</option>
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
        let img = document.getElementById(imgElem);
        let select = document.getElementById(selectedElem);
        
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
      function fetchData(selectedElem) {
        const selectElement = document. getElementById(selectedElem);
        const selectedValue = selectedElem.value;

        // send a GET request to the PHP script
        fetch(`php/getData.php?selectedValue=${selectedValue}`)
        .then(response => response.text())
        .then(data => {
          const dataContainer = document.getElementById('data-container');
          dataContainer.innerHTML = data;
        });
      }
    </script>
</body>
</html>