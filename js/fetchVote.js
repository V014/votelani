// function that checks the current vote count of selected candidate
function fetchVote(selectElement, voteTarget) {
    //Add onchange event listener to the selectElement and when its
    //selected value changes trigger a fetch request to the getVoteCount.php
    //endpoint and parse the JSON response vote count and update the value
    //of the voteTarget element
    selectElement = document.getElementById(selectElement);
    voteTarget = document.getElementById(voteTarget);

    selectElement.addEventListener("change", function(e) {
        //Access the available options in the select element and get the one
        //option the user has chosen using the currently selected index of the
        //select element
        let selectedOption = selectElement.options[selectElement.selectedIndex];
        let candidateID = selectedOption.getAttribute('data-id');
        let candidateType = selectElement.getAttribute('id');

        if (candidateID != null || candidateID != undefined) {
        // Make an AJAX request to retrieve the vote count
        fetch(`php/getVoteCount.php?selectedCandidate=${candidateID}&selectionOption=${candidateType}`)
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
// call the function
fetchVote("PresidentID", "president-vote-count");
fetchVote("ChancellorID", "chancellor-vote-count");
fetchVote("MPID", "mp-vote-count");