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
    function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
    }

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') 
				c = c.substring(1);
			if (c.indexOf(name) == 0) 
				return c.substring(name.length, c.length);
		}
		return "";
	}
	
	function filtrar (valor) {
		var rex = new RegExp(valor, 'i');
        $('.searchable tr').hide();
        $('.searchable tr').filter(function () {
            return rex.test($(this).text());
        }).show();
	}
	
	
  $(document).ready(function () {
	    if (getCookie ("filtro")=="")
			setCookie ("filtro","",1);
		else 
			$('#filter').val (getCookie ("filtro"));
		
        $('#filter').keyup(function () {
            filtrar ($(this).val());
			setCookie ("filtro",$(this).val(),1);
        });
		$.ajax({
			url: "../jugadores/verporfecha",
			type: 'post',
			success: function (data) {
				var jugadores = JSON.parse (data), tablaJugadores;

				for (i = 0; i < jugadores.length; i++) {
					tablaJugadores += "<tr><td>"+jugadores[i].nombre+"</td>"+"<td>"+jugadores[i].posicion+"</td>";
					if (jugadores[i].fecha!=null)
						tablaJugadores += "<td>"+jugadores[i].fecha+"</td></tr>";
					else
						tablaJugadores += "<td></td></tr>";
				}
				if (tablaJugadores==null)
					$("#tabla").html ("<strong class=\"bg-red\">No hay ningun jugador con fecha cargados.</strong>");
				else {
					$("#tabla").html (tablaJugadores);
					filtrar (getCookie ("filtro"));
				}
			},
			error: function() {
				$("#tabla").html ("<strong class=\"bg-red\">Hubo un error en la consulta de datos.</strong>");
			}
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