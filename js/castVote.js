$(document).ready(function(){
  $("#submit").click(function(e){
      e.preventDefault(); // Prevent the form from submitting normally
    
      // Get the form data
      var voterID = $("input[name='voterID']").val();
      var eventID = $("h3#eventID").attr("value");
      var presidentID = $("select[name='president'] option:selected").data('id');
      var chancellorID = $("select[name='chancellor'] option:selected").data('id');
      var mpID = $("select[name='mp'] option:selected").data('id');
      // Send the data to submit_vote.php using Ajax
      $.ajax({
      type: "POST",
      url: "php/castVote.php",
      data: {
          voterID: voterID,
          eventID: eventID,
          presidentID: presidentID,
          chancellorID: chancellorID,
          mpID: mpID
      },
      success: function(data){
        $("#reply").html(data); // Show the response from castVote.php
      }
    });
  }); 
});