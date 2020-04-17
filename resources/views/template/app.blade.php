<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Template</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">


  <style>
    * {
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
        <div class="row">
          <div class="nav-wrapper">
            <a href="{{ url('/pessoas') }}" class="brand-logo left">
              Agenda - Laravel
            </a>
            <ul class="right">
              <li>
                <form action="{{ url("pessoas/busca") }}" method="POST">
                  <div class="input-field">
                    {{ csrf_field() }}
                    <input id="search" type="search" class="black-text" placeholder="Pesquisar" name="criterio">
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                  </div>
                </form>
              </li>
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
      </div>
    </nav>
  </div>

  <div class="container">
    @yield('content')
  </div>


  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

  <script>
    $(document).ready(function () {
      $('.sidenav').sidenav()
    })

    $('.dropdown-trigger').dropdown()

    $(document).ready(function () {
      $('.tooltipped').tooltip({
        position: 'right',
        margin: 0,
        enterDelay: 0
      })
    })

    function showToast(message, type) {

      switch (type) {
        case 'success':
          iziToast.success({
            message,
            theme: 'light',
            position: 'topRight'
          });
          break;

        case 'error':
          iziToast.error({
            message,
            theme: 'light',
            position: 'topRight'
          });
          break;

        case 'warning':
          iziToast.warning({
            message,
            theme: 'light',
            position: 'topRight'
          });
          break;
      
        default:
          iziToast.show({
            message,
            theme: 'light',
            position: 'topRight'
          });
          break;
      }

    }

  </script>
</body>

</html>