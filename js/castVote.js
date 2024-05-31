$(document).ready(function(){
    $("submit").click(function(){
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