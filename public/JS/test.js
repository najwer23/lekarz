$(document).ready(function() {
  // console.log("Event");
  $("#back").click(function() {
    // console.log("Even3t");

    var imie = $('input[name="imie"]').val();
    $.ajax({
      type: "GET",
      url: "/ajax",
      data: {
        's': imie
      },
      success: function(data) {
        // $('.text').text(JSON.stringify(data));
        console.log(data)
        var output="";
        for(var i=0; i<data.a.length; i++)
        {
          var td1='<div class="numer">'+data.a[i]["s"]+"</div>"+"<br>";
          output += td1;
        }
        // var imie = $('input[name="imie"]').val('');
        $("#c").html( output );
      },
      error: function (data) {
               alert('Oh no aa :(');
           }
    });

  });
});
