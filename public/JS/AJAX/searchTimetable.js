$(document).ready(function() {

  $("#submitSearchTimetable").click(function() {

    var date = $('input[name="date"]').val();
    var output="";
    var output2="";
    $("#flexParentRecord").html("");
    $("#pagination").html( "" );

    if(date!=0)
    {
      $('.animation').show();
      $('.animation2').show();
      $.ajax({
        type: "POST",
        url: "/ajaxSearchTimetable",
        data: {
          'date': date
        },
        success: function(data) {

          $('.animation').hide();
          $('.animation2').hide();

          var strona=data.a[2]["onePage"];
          var wszystkieElementy=data.a[1]["count"];
          $("#c").html( "" );

          if(wszystkieElementy>strona)
          {
            var ileNaStronie=strona;
          }

          if(wszystkieElementy<strona && wszystkieElementy>0){
            var ileNaStronie=wszystkieElementy;
          }

          if(wszystkieElementy==0){
            var ileNaStronie=0;
          }

          if(wszystkieElementy!=0)
          {
            var id=data.a[0]["rezerwacja"][0]['id'];
            // for(var i=0; i<data.a[1]["rezerwacja"].length; i++)
            for(var i=0; i<ileNaStronie; i++)
            {
              var td0='<div class="record">';
              var td1='<div class="infoRecord"><span style="color:black">['+(i+1)+']</span> NUMER ZGŁOSZENIA</div>';
              var td2='<div class="recordText">'+data.a[0]["rezerwacja"][i]['id']+'</div>';
              var td3='<div class="infoRecord">NUMER KLIENTA</div>';
              var td4='<div class="recordText">'+data.a[0]["rezerwacja"][i]['idKlienta']+'</div>';
              var td5='<div class="infoRecord">DZIEŃ WIZYTY</div>';
              var td6='<div class="recordText">'+(data.a[0]["rezerwacja"][i]['data']).date.substring(0, 10)+'</div>';
              var td7='<div class="infoRecord">GODZINA WIZYTY</div>';
              var td8='<div class="recordText">'+data.a[0]["rezerwacja"][i]['godzina'].substr(3, data.a[0]["rezerwacja"][i]['godzina'].length - 3)+'</div>';
              var td9='</div>';

              output += td0 + td1 + td2 +td3 +td4 +td5 +td6 +td7 +td8 +td9;
            }

            $("#flexParentRecord").html( output );

            if(data.a[1]["count"]>strona)
            {
              var p1='<div class="empty"></div>';
              var p2='<div class="number-page">Strona: 1/'+(Math.ceil(wszystkieElementy/ileNaStronie))+'</div>';
              var p3='<div onclick="myFunction(2,'+wszystkieElementy+','+id+')" class="right-page"><i class="fas fa-angle-double-right"></i></div>';
              var output3=p1+p2+p3;
              $("#pagination").html( output3 );
            }
          }
          else {
            var output2="Brak wizyt na dziś :(";
            $("#flexParentRecord").html( output2 );
          }
        },
      });
    }
    else {
      var output='<div class="msgWrong"><i class="fas fa-exclamation-triangle"></i> Wypełnij wszystkie pola!</div>';
      $("#c").html( output );
    }
    });

  });
