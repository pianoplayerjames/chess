<?php
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$profile_id = $_GET['user'];

$find_profile_user = $db->prepare("SELECT * FROM users WHERE username = :username");
$find_profile_user->execute([':username' => $profile_id]);
$profile_user = $find_profile_user->fetch(PDO::FETCH_OBJ);
?>

<div class='row'>

    <div class='col-lg-3'>
        <div class='card trans_bg text-light p-2 mb-3 mt-1 shadow'>
            <img src='https://i.imgur.com/2mAHfWr.jpg' width='40%' class='mt-2 mx-auto img-fluid rounded-circle rounded shadow' />
            <div class='text-center h4 mt-2'>
                <span style='color: #ffbe00;'>GM</span>&nbsp;&nbsp;Jamesgrainger <img src='<?php echo $url; ?>assets/img/countries/unitedkingdom.svg' class='rounded-circle border border-dark shadow' width='16' /><br />
                <span style='font-size: 11px;'>
                    <span style='font-size: 11px;'>Male, 29,</span> Leeds, United Kingdom
                </span>
            </div>

            <div class="btn-group mb-2 mt-2" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-sm btn-primary">Add</button>
                <button type="button" class="btn btn-sm btn-primary">Follow</button>
                <button type="button" class="btn btn-sm btn-primary">Chat</button>

                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="#">Report</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                    </ul>
                </div>
            </div>


            <ul class="list-group list-group-flush border-0">
            <li class="list-group-item text-light border-0" style='background: none; font-size: 13px;'><i class="fas fa-crown" style='color: #da5485;'></i>&nbsp;&nbsp;Wechess Founder, Developer</li>
                <li class="list-group-item text-light border-0" style='background: none; font-size: 13px;'><i class="fas fa-user"></i>&nbsp;&nbsp;29,483 Followers</li>
                <li class="list-group-item text-light border-0" style='background: none; font-size: 13px;'><i class="fas fa-laugh-beam"></i>&nbsp;&nbsp;3,954 Friends</li>
                <li class="list-group-item text-light border-0" style='background: none; font-size: 13px;'><i class="fas fa-trophy"></i>&nbsp;&nbsp;173,495 Points</li>
            </ul>

            <div class="btn-group mt-2 mb-3 shadow border border-dark rounded" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-sm trans_bg text-light">48<br />Studies</button>
                <button type="button" class="btn btn-sm trans_bg text-light">3,485<br />Posts</button>
                <button type="button" class="btn btn-sm trans_bg text-light">29<br />Blogs</button>
            </div>


            <ul class="list-group list-group-flush border-0">


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>28</span>
                        <span style='color: #9da7bf;'></i>1745</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-meteor me-3 text-start fa-2x" style='color: #fd72d1;'></i>

                        <div>
                            <div class='text-light'>Ultrabullet</div>
                            <div class='text-light' style='font-size: 11px;'>2,848 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>49</span>
                        <span style='color: #9da7bf;'></i>2193</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-meteor me-3 text-start fa-2x" style='color: #d43a63;'></i>

                        <div>
                            <div class='text-light'>Hyperbullet</div>
                            <div class='text-light' style='font-size: 11px;'>34,346 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>39</span>
                        <span style='color: #9da7bf;'></i>1920</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-meteor me-3 text-start fa-2x" style='color: #e2722f;'></i>

                        <div>
                            <div class='text-light'>Bullet</div>
                            <div class='text-light' style='font-size: 11px;'>182,394 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>23</span>
                        <span style='color: #9da7bf;'></i>2109</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-bolt me-3 ms-2 text-start fa-2x" style='color: #ffc849;'></i>

                        <div class='ms-1'>
                            <div class='text-light'>Blitz</div>
                            <div class='text-light' style='font-size: 11px;'>1,485 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>12</span>
                        <span style='color: #9da7bf;'></i>1930</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-fire-alt me-3 text-start fa-2x" style='color: #52bd56;'></i>

                        <div class='ms-1'>
                            <div class='text-light'>Rapid</div>
                            <div class='text-light' style='font-size: 11px;'>1,293 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-danger">
                            <i class="fas fa-angle-down"></i>239</span>
                        <span style='color: #9da7bf;'></i>1796</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-chess me-3 text-start fa-2x" style='color: #999bda;'></i>

                        <div>
                            <div class='text-light'>Classical</div>
                            <div class='text-light' style='font-size: 11px;'>458 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-dice-five ms-1 me-3 text-start fa-2x" style='color: #47c9fd;'></i>

                        <div>
                            <div class='text-light'>Chess960</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-mountain me-2 text-start fa-2x" style='color: #72c175;'></i>

                        <div>
                            <div class='text-light'>King of the hill</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>



                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-bomb me-3 text-start fa-2x" style='color: #6191ec;'></i>

                        <div>
                            <div class='text-light'>Atomic</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>

                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fab fa-fort-awesome me-3 text-start fa-2x" style='color: #dc85a5;'></i>

                        <div>
                            <div class='text-light'>Crazyhouse</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>

                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-chess-pawn ms-2 me-4 text-start fa-2x" style='color: #c3a05e;'></i>

                        <div>
                            <div class='text-light'>Horde</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-flag-checkered ms-0 me-3 text-start fa-2x" style='color: #44b2cc;'></i>

                        <div>
                            <div class='text-light'>Racing Kings</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>

                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fas fa-icicles ms-0 me-3 text-start fa-2x" style='color: #845d94;'></i>

                        <div>
                            <div class='text-light'>Antichess</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>


                <li class="list-group-item text-light border-0 p-2" style='background: none;'>

                    <div class='float-end'>
                        <span class="badge bg-dark text-success">
                            <i class="fas fa-angle-up"></i>29</span>
                        <span style='color: #9da7bf;'></i>1849</span>
                    </div>

                    <div class="d-flex">
                        <i class="fab fa-buffer ms-0 me-3 text-start fa-2x" style='color: #cc5d4b;'></i>

                        <div>
                            <div class='text-light'>Three-check</div>
                            <div class='text-light' style='font-size: 11px;'>3824 games</div>
                        </div>
                    </div>

                </li>



            </ul>

        </div>
    </div>

    <div class='col-lg-6 mt-1'>

        <div class='card trans_bg text-light p-3 mb-3 shadow'>
            <div class='row mb-2'>

                <div class='col-lg-7 float-start'>
                    <h3>198,384 Games</h3>
                </div>

                <div class='col-lg-5 ms-auto float-end'>
                    <select class="form-control form-select" aria-label="Default select example">
                        <option selected>All Games</option>
                        <option value="1">Ultrabullet</option>
                        <option value="2">HyperBullet</option>
                        <option value="3">Bullet</option>
                        <option value="3">Blitz</option>
                        <option value="3">Rapid</option>
                        <option value="3">Classical</option>
                        <option value="3">Chess960</option>
                        <option value="3">King of the Hill</option>
                        <option value="3">Atomic</option>
                        <option value="3">CrazyHouse</option>
                        <option value="3">Horde</option>
                        <option value="3">Racing Kings</option>
                        <option value="3">Anti-Chess</option>
                        <option value="3">Three-Check</option>
                    </select>
                </div>

            </div>

            <hr style='border-top: 1px #bf9d9d solid;' class='m-0 mb-2' />

            <div class='row'>

                <div class="btn-group mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn trans_bg text-light" style='font-size: 11px;'>169,484<br /><span class='text-info'>Rated</span></button>
                    <button type="button" class="btn trans_bg text-light" style='font-size: 11px;'>69,304<br /><span class='text-success'>Wins</span></button>
                    <button type="button" class="btn trans_bg text-light" style='font-size: 11px;'>1,394<br /><span class='text-warning'>Draws</span></button>
                    <button type="button" class="btn trans_bg text-light" style='font-size: 11px;'>49,590<br /><span class='text-danger'>Losses</span></button>
                </div>

                <?php
                for ($i = 1; $i <= 10; $i++) {
                ?>
                    <li class="col-lg-6 list-group-item text-light border-0" style='background: none;'>

                        <i class="fab fa-buffer ms-0 me-2 float-start fa-2x" style='color: #cc5d4b;'></i>
                        <div class='text-light'>Three-check 3+0 rated</div>
                        <div class='text-info mb-2' style='font-size: 11px;'>Draw by Repitition</div>
                        <div class='text-light' style='font-size: 12px;'><span style='color: #ffbe00;'>GM</span> jamesgrainger (1920) <span class='text-success'>+3</span> <span class='float-end'>1/2</span></div>
                        <img src='https://www.chessable.com/blog/wp-content/uploads/2020/09/Balestra-Mate-2-1-300x300.png' class='img-fluid' />
                        <div class='text-light' style='font-size: 12px;'><span style='color: #ffbe00;'>WGM</span> kaitelel (2348) <span class='text-danger'>-3</span> <span class='float-end'>1/2</span></div>

                        <div class='text-light mt-2 mb-1' style='font-size: 11px;'>
                            Ruy Lopez: 1. e4 e5 2. Nf3 Nc6 3. Bb5 d6 ...
                        </div>
                        <span class='float-start' style='font-size: 11px;'>41 moves</span>
                        <span class='float-end' style='font-size: 11px;'>2 days ago</span>
                        <div class='clearfix'></div>
                        <hr style='border-top: 1px #bf9d9d solid;' class='m-0 mt-2' />
                    </li>
                <?php
                }
                ?>

            </div>



        </div>
    </div>


    <div class='col-lg-3'>

        <div class='card trans_bg text-light p-3 mb-3 shadow'>
            <h5>2,628 Trophies</h5>
            <hr style='border-top: 1px #bf9d9d solid;' class='m-0 mb-2' />

            <div class='row p-1'>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"></div>
                <img src='https://cdn-icons-png.flaticon.com/512/3112/3112946.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x34</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/861/861506.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x293</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/4225/4225100.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x7</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/2830/2830919.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x3</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/5739/5739547.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"></div>
                <img src='https://cdn-icons-png.flaticon.com/512/5003/5003824.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x2586</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/1039/1039399.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"></div>
                <img src='https://cdn-icons-png.flaticon.com/512/5696/5696304.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"></div>
                <img src='https://cdn-icons-png.flaticon.com/512/5515/5515614.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x4</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/5521/5521351.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x3</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/2164/2164914.png' class='img-fluid' />
            </div>

            <div class="col-lg-3 position-relative p-2">
                <div class="position-absolute bottom-0 start-50 translate-middle"><div class='badge bg-danger'>x38</div></div>
                <img src='https://cdn-icons-png.flaticon.com/512/744/744944.png' class='img-fluid' />
            </div>

            

            </div>

            <div class='text-center mt-2'>
                View All
            </div>
        </div>

        <div class='card trans_bg text-light p-3 mb-3 mt-1 shadow'>
            <h5>Puzzles</h5>
            <hr style='border-top: 1px #bf9d9d solid;' class='m-0 mb-2' />

            <h3>Rating <span style='color: #76e293;'>2184</span></h3>
            <h5>Solved <span style='color: #badc55;'>18,485/48,384</span></h5>
            <h5>3 min <span style='color: #a4b4da;'>24</span></h5>
            <h5>5 min <span style='color: #a4b4da;'>48</span></h5>
            <h5>Survival <span style='color: #a4b4da;'>83</span></h5>

            <div class='text-center mt-2'>
                View More Stats
            </div>
        </div>

        <div class='card trans_bg text-light p-3 mb-3 mt-1 shadow'>
            <h5>Lesson Stats</h5>
        </div>

        <div class='card trans_bg text-light p-3 mb-3 mt-1 shadow'>
            <h5>182 Badges</h5>
        </div>
    </div>

</div>