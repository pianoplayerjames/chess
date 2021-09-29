<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
?>
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
                        <h1 id='clock1' class="text-white ps-3"></h1>
                    </div>

                    <button type="button" class="btn btn-success" onclick='start_countdown("clock1", 100);'><i class="fas fa-arrow-circle-left"></i> Start</button>
                    <button type="button" class="btn btn-success" onclick='countdown("clock1", 100);'><i class="fas fa-arrow-circle-left"></i> Stop</button>

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
                        <h1 id='clock2' class="text-white ps-3"></h1>
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

        <script src="<?php echo $url; ?>assets/js/board.js"></script>
        <script src="<?php echo $url ; ?>assets/js/arrows-min.js"></script>

<script>
draw_board();
</script>