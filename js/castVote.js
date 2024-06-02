$(document).ready(function(){
  $("#submit").click(function(e){
      e.preventDefault(); // Prevent the form from submitting normally
    
      // Get the form data
      var voteID = $("input[name='voteID']").data('id');
      var president = $("select[name='president'] option:selected").data(id);
      var chancellor = $("select[name='chancellor'] option:selected").data(id);
      var mp = $("select[name='mp'] option:selected").data(id);

      // Send the data to submit_vote.php using Ajax
      $.ajax({
      type: "POST",
      url: "../php/castVote.php",
      data: {
          voteID: voteID,
          president: president,
          chancellor: chancellor,
          mp: mp
      },
      success: function(data){
        $("#reply").html(data); // Show the response from submit_vote.php
      }
    });
  }); 
});