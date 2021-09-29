<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style='background: #0000001c;'>
        <div class="container">
            <div class="navbar-brand cursor" data-page='game'><i class="fas fa-chess-bishop"></i> WeChess</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="nav-link cursor" aria-current="page" data-page=''>Lobby</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link cursor" data-page='tournaments'>Tournaments</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="nav-link cursor" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Puzzles
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item cursor" data-page='puzzles'>Puzzles</a></li>
                            <li><a class="dropdown-item cursor" href="#">Survival</a></li>
                            <li><a class="dropdown-item cursor" href="#">Duel</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Training
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item cursor" data-page='puzzles'>Opening Explorer</a></li>
                            <li><a class="dropdown-item cursor" data-page='puzzles'>Game Analysis</a></li>
                            <li><a class="dropdown-item cursor" href="#">Studies</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item cursor" href="#">Lessons</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="nav-link cursor" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Players
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item cursor" data-page='puzzles'>Find Players</a></li>
                            <li><a class="dropdown-item cursor" data-page='puzzles'>Leaderboards</a></li>
                            <li><a class="dropdown-item cursor" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link cursor" data-page='tournaments'>Forum</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php 
                if($loggedin) {
                ?>
                    <li class="nav-item dropdown">
                        <div class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class='position-relative'>
                                <div class="position-absolute top-0 start-100 translate-middle">
                                    <img src='<?php echo $url; ?>assets/img/countries/unitedkingdom.svg' class='rounded-circle border border-dark shadow' width='18' />
                                </div>
                            <img src='https://i.imgur.com/2mAHfWr.jpg' width='24' class='border border-white float-end shadow rounded-circle ms-2' />

                            <span style='color: #ffbe00;'>GM</span>
                            <?php echo $user->username; ?>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item cursor" data-page='<?php echo $user->username; ?>'><i class="fas fa-user"></i>&nbsp;&nbsp;Profile</a></li>
                            <li><a class="dropdown-item cursor" data-page='settings'><i class="fas fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
                            <li><div id='account_sign_out' class="dropdown-item cursor"><i class="fas fa-lock"></i>&nbsp;&nbsp;Logout</div></li>
                        </ul>
                    </li>
                <?php 
                } else {
                ?>

                    <li class="nav-item">
                        <button data-page='signin' type="button" class="btn btn-sm btn-success me-2 cursor"><i class="fas fa-unlock"></i> Sign In</button>
                    </li>

                    <li class="nav-item">
                        <button data-page='register' type="button" class="btn btn-sm btn-primary me-2 cursor"><i class="fas fa-door-open"></i> Create Account</button>
                    </li>

                    <li class="nav-item">
                        <button data-page='settings' type="button" class="btn btn-sm bg-none text-light cursor"><i class="fas fa-cog"></i></button>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
        </div>
    </nav>