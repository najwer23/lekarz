$( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      firstDay:1,
      minDate: 0,
      showOtherMonths: true,
      selectOtherMonths: true,
      // wylacz niedzili i soboty
      beforeShowDay: function(date) {
      var day = date.getDay();
      return [day !=0 && day !=6,''];
}
    });

   $.datepicker.regional['pl'] = {clearText: 'Effacer', clearStatus: '',
   closeText: 'Zamknij',
   prevText: 'Poprzedni',
   nextText: 'Następny',
   currentText: 'Dziś',
   monthNames: ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec',
                'Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'],
   monthNamesShort: ['Sty','Lu','Mar','Kw','Maj','Cze',
                     'Lip','Sie','Wrz','Pa','Lis','Gru'],

   dayNames: ['Niedziela','Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota'],
   dayNamesShort: ['Nie','Pn','Wt','Śr','Czw','Pt','So'],
   dayNamesMin: ['N','Pn','Wt','Śr','Cz','Pt','So'],
   weekHeader: 'Tydz',
   dateFormat: 'dd.mm.yy',
   dateFormat: 'dd/mm/yy',
   isRTL: false};
   $.datepicker.setDefaults($.datepicker.regional['pl']);
});
