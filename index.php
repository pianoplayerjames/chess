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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style='background: #0000001c;'>
        <div class="container">
            <a class="navbar-brand" href="#">WeChess</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Lobby</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tournaments</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Puzzles
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Puzzles</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Social</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><span style='color: #ffbe00;'>GM</span> James</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container mt-5 pt-3">
        <div class="row">
            <div id='board_contain' class="col-lg-8 mt-3">
                <div class="board mx-auto position-relative" data-axis="white" data-game='fb48bgb'>
                    <div class="position-absolute top-100 start-100 p-1 translate-middle fas fa-arrows-alt-h ms-3 shadow" style='margin-top: -12px;'></div>
                </div>
            </div>
            <div class="col-lg-4 g-0 mt-3">
                <div class="card bg-success rounded shadow">
                    <div class="progress" style="height: 5px;background: none;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 46%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class='p-0'>
                        <img src='https://images.chesscomfiles.com/uploads/v1/user/152277913.9a719931.100x100o.1d81f31c2254.jpeg' class='float-start rounded p-2 pe-3' />
                        <span class="badge m-2 float-end text-light">1748</span>
                        <a class="nav-link text-white" aria-current="page" href="#"><i class="fas fa-crown text-light"></i> James</a>
                        <h1 class="text-white ps-3">01:48</h1>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> takeback</button>
                        <button type="button" class="btn btn-success"><i class="fas fa-handshake"></i> Offer Draw</button>
                        <button type="button" class="btn btn-success"><i class="fas fa-chess-king"></i> Resign</button>
                    </div>
                </div>


                <div class="card bg-dark mt-3 rounded shadow">
                    <div class="progress" style="height: 5px; background: none;">
                        <div class="progress-bar progress-bar-striped bg-danger rounded-0" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class='p-0'>
                        <img src='https://images.chesscomfiles.com/uploads/v1/user/139320646.3f9ca7ac.100x100o.119a823dea32.jpeg' class='float-start rounded p-2 pe-3' />
                        <span class="badge m-2 float-end text-light">1863</span>
                        <a class="nav-link text-white" aria-current="page" href="#"><span style='color: #ffbe00;'>WGM</span> <i class="fas fa-crown text-light"></i> Kaitelele</a>
                        <h1 class="text-white ps-3">00:37</h1>
                    </div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-dark"><i class="fas fa-heart"></i> Follow</button>
                        <button type="button" class="btn btn-dark"><i class="fas fa-comment"></i> Chat</button>
                        <button type="button" class="btn btn-dark"><i class="fas fa-exclamation-circle"></i> Info</button>
                        <button type="button" class="btn btn-dark"><i class="fas fa-gift"></i> Gift</button>
                    </div>
                </div>


                <div class="card bg-dark mt-3 rounded shadow">

                    <div class='p-0'>
                        <div class='bg-primary'>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary rounded-0"><i class="fas fa-exchange-alt"></i> Flip Board</button>
                                <button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button>
                                <button type="button" class="btn btn-primary"><i class="fas fa-angle-left"></i></button>
                                <button type="button" class="btn btn-primary"><i class="fas fa-angle-right"></i></button>
                                <button type="button" class="btn btn-primary rounded-0"><i class="fas fa-angle-double-right"></i></button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>