function myFunction(ileStron,wszystkieElementy,id) {

  var output="";
  var output2="";

  $.ajax({
    type: "POST",
    url: "/ajaxPage",
    data: {
      'page': ileStron,
      'date': id
    },
    success: function(data) {


      // 4
      var elementyNaStronie=data.a[0]["onePage"];

      if(wszystkieElementy>ileStron*elementyNaStronie)
      {
        var ileNaStronie=elementyNaStronie;
      }
      else {
        var ileNaStronie=wszystkieElementy-(ileStron-1)*elementyNaStronie;
      }

      var lp=(elementyNaStronie)*(ileStron-1)+1;

      // for(var i=0; i<data.a[1]["rezerwacja"].length; i++)
      for(var i=0; i<ileNaStronie; i++)
      {
        var td0='<div class="record">';
        var td1='<div class="infoRecord"><span style="color:black">['+(lp)+']</span> NUMER ZGŁOSZENIA</div>';
        var td2='<div class="recordText">'+data.a[1]["rezerwacja"][i]['id']+'</div>';
        var td3='<div class="infoRecord">NUMER KLIENTA</div>';
        var td4='<div class="recordText">'+data.a[1]["rezerwacja"][i]['idKlienta']+'</div>';
        var td5='<div class="infoRecord">DZIEŃ WIZYTY</div>';
        var td6='<div class="recordText">'+(data.a[1]["rezerwacja"][i]['data']).date.substring(0, 10)+'</div>';
        var td7='<div class="infoRecord">GODZINA WIZYTY</div>';
        var td8='<div class="recordText">'+data.a[1]["rezerwacja"][i]['godzina'].substr(3, data.a[1]["rezerwacja"][i]['godzina'].length - 3)+'</div>';
        var td9='</div>';
        // var td1=''+data.a[1]["rezerwacja"][i]['godzina']+'';
        output += td0 + td1 + td2 +td3 +td4 +td5 +td6 +td7 +td8 +td9;
        lp=lp+1;
      }

      if(output!=0)
      {
        $("#c").html( "" );
        $("#flexParentRecord").html( output );

        if(ileStron==1)
        {
          var p1='<div class="empty"></div>';
          var p2='<div class="number-page">Strona: '+ileStron+'/'+(Math.ceil(wszystkieElementy/elementyNaStronie))+'</div>';
          var p3='<div onclick="myFunction('+(ileStron+1)+','+wszystkieElementy+','+id+')" class="right-page"><i class="fas fa-angle-double-right"></i></div>';
          var output3=p1+p2+p3;
          $("#pagination").html( output3 );
        }

        if(wszystkieElementy>ileStron*elementyNaStronie && ileStron>1)
        {
          var p1='<div onclick="myFunction('+(ileStron-1)+','+wszystkieElementy+','+id+')" class="left-page"><i class="fas fa-angle-double-left"></i></div>';
          var p2='<div class="number-page">Strona: '+ileStron+'/'+(Math.ceil(wszystkieElementy/elementyNaStronie))+'</div>';
          var p3='<div onclick="myFunction('+(ileStron+1)+','+wszystkieElementy+','+id+')" class="right-page"><i class="fas fa-angle-double-right"></i></div>';
          var output3=p1+p2+p3;
          $("#pagination").html( output3 );
        }

        if(ileStron*elementyNaStronie>wszystkieElementy)
        {
          var p1='<div onclick="myFunction('+(ileStron-1)+','+wszystkieElementy+','+id+')" class="left-page"><i class="fas fa-angle-double-left"></i></div>';
          var p2='<div class="number-page">Strona: '+ileStron+'/'+(Math.ceil(wszystkieElementy/elementyNaStronie))+'</div>';
          var p3='<div class="empty"></div>';
          var output3=p1+p2+p3;
          $("#pagination").html( output3 );
        }

      }
      else {
        $("#flexParentRecord").html( output2 );
      }
    },
  });
}
