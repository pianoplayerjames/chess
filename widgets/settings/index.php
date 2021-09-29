<?php
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

?>

<link rel="stylesheet" href="<?php echo $url ; ?>assets/css/spectrum.min.css" />

<div class='row'>

<div class='col-lg-2 gy-2'>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    Basic Info
  </a>
  <a href="#" class="list-group-item list-group-item-action">Game Controls</a>
  <a href="#" class="list-group-item list-group-item-action">Design</a>
  <a href="#" class="list-group-item list-group-item-action">Security</a>

  
</div>

</div>

<div class='col-lg-10'>

<div class='row' data-masonry='{"percentPosition": true }'>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Username</h6>
    <input type="text" class="form-control mt-2" id="exampleFormControlInput1" placeholder="<?php echo $user->username; ?>">
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Email Address</h6>
    <input type="email" class="form-control mt-2" id="exampleFormControlInput1" placeholder="<?php echo $user->email; ?>">
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Password</h6>
    <input type="text" class="form-control mt-2" id="exampleFormControlInput1" placeholder="">
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
  <a href="#" class="btn btn-primary float-end">Upload</a>
    <h6 class="card-title">Profile Pic</h6>
    <img src='https://i.imgur.com/2mAHfWr.jpg' class='img-fluid' />
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Your Name</h6>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
    <input type="text" class="form-control mt-2" id="exampleFormControlInput1" placeholder="Surname">
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Country</h6>
    <p class="card-text">

        <select id='country' class="form-select">
            <?php
            $find_countries = $db->prepare("SELECT * FROM countries ORDER BY name ASC");
            $find_countries->execute();
            while($countries = $find_countries->fetch(PDO::FETCH_OBJ)) {
            ?>
            <option data-thumbnail="<?php echo $url; ?>assets/img/countries/<?php echo $countries->flag; ?>.svg" value="<?php echo $countries->id; ?>"><?php echo ucfirst($countries->name); ?></option>
            <?php 
            }
            ?>
        </select>

    </p>
    <h6 class="card-title">City</h6>
    <div class="mb-3">
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Name of city you live in">
</div>
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">  <div class="card-body">
    <h6 class="card-title">Gender</h6>
    <p class="card-text">
    <select id='gender' class="form-select">
            <option value='female'>Female</option>
            <option value='male'>Male</option>
            <option value='other'>Other</option>
    </select>
    </p>
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Bio</h6>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Socials</h6>
    <ul class="list-group">
  <li class="list-group-item">Lichess</li>
  <li class="list-group-item">chess.com</li>
  <li class="list-group-item">Twitch</li>
  <li class="list-group-item">Discord</li>
  <li class="list-group-item">Facebook</li>
</ul>
  </div>
</div>
</div>

<div class="col-lg-4 g-2">
<div class="card trans_bg col-lg-12">
  <div class="card-body">
    <h6 class="card-title">Background color</h6>
    <input id='picker' type='text' class='basic' value="<?php echo $prefs->bg; ?>" />
  </div>
</div>
</div>

        </div>


</div>

        </div>

<script src="<?php echo $url; ?>assets/js/spectrum.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>

<script>
    $("#picker").spectrum({
        allowEmpty: true,
        move: function(color) {
            $('body').css({'background' : color });
        },
        type: "flat",
        showPalette: false,
        showInput: false,
        showButtons: true,
        showAlpha: false,
        allowEmpty: false,
        change: save_color
    });

    function save_color(color) {
        $.ajax({
                url: url + 'widgets/settings/ajax/setColor.php',
                type: 'POST',
                data: 'color='+color,
                success: function() {
                    console.log(color);
                }
            });
    }
    </script>
