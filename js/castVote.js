$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault(); // Prevent the form from submitting normally
      var president = $('#president-select').val();
    });

    $.ajax({
      url:'php/castVote.php',
      data:'Vote casted!',
      success:function(data){
        $('#content').html(data);
      }
    })  
  });