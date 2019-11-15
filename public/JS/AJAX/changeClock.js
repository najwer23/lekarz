$(document).ready(function(){

    $("#datepicker").change(function(){

      var date = $('input[name="date"]').val();

      $.ajax({
        type: "POST",
        url: "/ajaxGetTime",
        data: {
          'date' : date
        },
        success: function(data) {

          if(data.a[0]["date"]==1)
          {
            var output='<option value="1">a) od 6:00 do 10:00</option><option value="2">b) od 10:00 do 14:00</option><option value="3">c) od 14:00 do 18:00</option><option value="4">d) od 18:00 do 22:00</option>';
          }

          if(data.a[0]["date"]==2)
          {
            var output='<option value="2">b) od 10:00 do 14:00</option><option value="3">c) od 14:00 do 18:00</option><option value="4">d) od 18:00 do 22:00</option>';
          }

          if(data.a[0]["date"]==3)
          {
            var output='<option value="3">c) od 14:00 do 18:00</option><option value="4">d) od 18:00 do 22:00</option>';
          }

          if(data.a[0]["date"]==4)
          {
            var output='<option value="4">d) od 18:00 do 22:00</option>';
          }

          if(data.a[0]["date"]==5)
          {
            var output='';
          }

          $("#clock").html( output );
        }
      });


    });
});
