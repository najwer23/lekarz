$(document).ready(function() {

  $("#submitCall").click(function() {

    var name = $('input[name="name"]').val();
    var surname = $('input[name="surname"]').val();
    var phone = $('input[name="phone"]').val();
    var email = $('input[name="email"]').val();

    var date = $('input[name="date"]').val();
    var clock= $( "#clock option:selected" ).text();

    var town= $( "#town option:selected" ).text();
    var street = $('input[name="street"]').val();
    var houseNumber = $('input[name="houseNumber"]').val();

    if(name!=0&&surname!=0&&phone!=0&&email!=0&&date!=0&&clock!=0&&town!=0&&street!=0&&houseNumber!=0)
    {
      $('.animation').show();
      $('.animation2').show();
      $.ajax({
        type: "POST",
        url: "/ajaxAddCall",
        data: {
          'name': name,
          'surname': surname,
          'phone': phone,
          'email': email,
          'date': date,
          'clock': clock,
          'town': town,
          'street': street,
          'houseNumber': houseNumber
        },
        success: function(data) {
          $('.animation').hide();
          $('.animation2').hide();

          if(data.a[0]["email"]>0)
          {
            var output='<div class="msgSent"><i class="far fa-check-square"></i> Zarejestrowano zgłoszenie!</div>';
          }
          else {
            var output='<div class="msgWrongEmail"><i class="fas fa-exclamation-triangle"></i> Błędny adres Email!</div>';
          }
          $("#c").html( output );
          email = $('input[name="email"]').val('');
        },
      });
    }
    else {
      var output='<div class="msgWrongEmail"><i class="fas fa-exclamation-triangle"></i> Wypełnij wszystkie pola!</div>';
        $("#c").html( output );
    }
    });
  });
