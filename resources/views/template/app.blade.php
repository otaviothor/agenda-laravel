<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Template</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  

  <style>
    *{
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      outline: none;
    }
  </style>


</head>

<body>

  <div class="navbar-fixed">
    <nav class="grey darken-4">
      <div class="container">
        <div class="nav-wrapper">
          <a href="/" class="brand-logo left">
            Agenda - Laravel
          </a>
          <ul class="right">
            <li>
              <a class="dropdown-trigger" href="#" data-target="actionsMenu">
                Contato
                <i class="material-icons right">arrow_drop_down</i>
              </a>
            </li>
          </ul>
          <ul id="actionsMenu" class="dropdown-content">
            <li><a href="{{ url('/pessoas/novo') }}">Novo</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/pessoas') }}">Listagem</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container">
    @yield('content')
  </div>


  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
    $(document).ready(function () {
      $('.sidenav').sidenav()
    })

    $('.dropdown-trigger').dropdown()

    $(document).ready(function(){
      $('.tooltipped').tooltip({
        position: 'right',
        margin: 0,
        enterDelay: 0
      })
    })

  </script>
</body>

</html>