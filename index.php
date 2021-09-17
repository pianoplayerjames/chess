<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/board.js"></script>
    <script src="assets/js/arrows-min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="board" data-axis="white" data-game='fb48bgb'></div>
                <div class='btn btn-success' onclick='flip();'>flip board</div>
            </div>
        </div>
    </div>
</body>

</html>