$(document).ready(function(){

    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });









    $("#nop").change(function(){
      var price = $('#price').val();
      var numop = $('#nop').val();
      if(numop >= 1){
  
      var thecost = numop * price;
          $("#cost").val(thecost);
      }
  });
  

  $('#btnregistraton').click(function(){
    $('#logincustomer').hide(2000);
    $('#registratonicustomer').show(2000);
 })

 $('#btnlogin').click(function(){
    $('#logincustomer').show(2000);
    $('#registratonicustomer').hide(2000);
 })










});