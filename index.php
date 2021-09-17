<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css" />
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/board.js"></script>
    <script src="assets/js/arrows-min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark" style='background: #0000005c;'>
  <div class="container">
    <a class="navbar-brand" href="#">Chess</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Lobby</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Training</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Puzzles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Puzzles</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Community</a>
        </li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">James</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="board position-relative" data-axis="white" data-game='fb48bgb'>
                    <div class="position-absolute top-100 start-100 p-1 translate-middle fas fa-arrows-alt-h ms-3 shadow" style='margin-top: -12px;'></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>