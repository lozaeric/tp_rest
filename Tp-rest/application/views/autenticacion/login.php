 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <style>
  	body {
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #eee;
	}

	form {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	form form-heading,
	form .checkbox {
	  margin-bottom: 10px;
	}
	form .checkbox {
	  font-weight: normal;
	}
	form .form-control {
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
		 -moz-box-sizing: border-box;
			  box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	}
	form .form-control:focus {
	  z-index: 2;
	}
	form input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	form input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
  </style>
  <script>
  
  </script>
</head>
<body>
<div class="container">
	   <?php
			print validation_errors();
			print form_open ('autenticacion/loguearse');
		?>
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="recordarme"> Recordarme en este dispositivo
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
</div>
</body>
</html>