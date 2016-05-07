 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Jugadores</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <script>
  $(document).ready(function () {
        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });
		$.get("../jugadores/verporfecha",
		function(data, status){
			var jugadores = JSON.parse (data), tablaJugadores;

			for (i = 0; i < jugadores.length; i++) {
				tablaJugadores += "<tr><td>"+jugadores[i].nombre+"</td>"+"<td>"+jugadores[i].posicion+"</td>";
				if (jugadores[i].fecha!=null)
					tablaJugadores += "<td>"+jugadores[i].fecha+"</td></tr>";
				else
					tablaJugadores += "<td></td></tr>";
			}
			if (tablaJugadores==null)
				$("#tabla").html ("<strong class=\"bg-red\">No hay ninguna carrera cargada.</strong>");
			else 
				$("#tabla").html (tablaJugadores);
		}).fail(function() {
			$("#tabla").html ("<strong class=\"bg-red\">Hubo un error en la carga de carreras. Por favor, intente mas tarde.</strong>");
		});
});
  </script>
</head>
<body>
<div class="container">
<h2>Jugadores</h2>
<div class="input-group"> <span class="input-group-addon">Nombre</span>
<input id="filter" type="text" class="form-control">
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Posicion</th>
            <th>Ultimo ojeo</th>
        </tr>
    </thead>
    <tbody class="searchable" id="tabla">
    </tbody>
</table>
</div>
</body>
</html>