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