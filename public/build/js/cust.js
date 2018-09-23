$("#addMed" ).click(function() {
var flag = 1;

var name = $('#name2').val();
var duration = $('#duration').val();
var date = $('#date').val();

if (name ==""||(name.length<2||name.length>32)) {
  alert("Verificar el nombre del medicamento");
}else {
  if (name=="") {
    alert("Seleccionar una fecha");
  }else {
    if ( duration ==""||(duration<0 ||duration>365)) {
      alert("Verificar la duración");
    }else {
      var row = name+','+duration+','+date;

      var data =$('#medicinas').val();
         $('#medicinas').val(data +";"+row+";");
    }

  }
}





});
