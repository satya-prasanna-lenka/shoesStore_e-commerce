<?php
$cookie = getenv('REMOTE_ADDR');
$login = "flex";
$user = "none";
if (!isset($_SESSION)) {

  session_start();
}

$qty = 0;
if (!isset($_COOKIE[$cookie])) {

  header("location:cart.php");
} else {

  $qty =   $_COOKIE[$cookie];
}
if (isset($_SESSION['userlogin'])) {
  $login = "none";
  $user = "flex";
}

if (isset($_COOKIE["login"])) {
  $loginn =   $_COOKIE["login"];
  $_SESSION['email'] = $loginn;
  $_SESSION['userlogin'] = true;
}



echo '
<div class="header_section header_main">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="logo">
          <a href="#"><img src="images/logo.png" /></a>
        </div>
      </div>
      <div class="col-sm-9">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="index.php">Home</a>
              <a class="nav-item nav-link" href="collection.php">Collection</a>
              <a style="display:' . $user . ' ;" class="nav-item nav-link" href="shoes.php">Order Details</a>
          <a style="display:' . $login . ' ;" class="nav-item nav-link" href="userLogin.php">Login</a>
              <a class="nav-item nav-link" href="contact.php">Contact</a>

              <a
                class="nav-item nav-link last"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                href="#"
                ><img src="images/search_icon.png"
              /></a>
              <div style="display: flex; ">
              <a
                style="display: flex; position: relative; top: 10px"
                class="nav-item nav-link last"
                href="cart.php"
              >
                <img style="position: absolute" src="images/shop_icon.png" />
                <div
                  style="
                    position: absolute;
                    font-size: 0.8rem;
                    border-radius: 50%;
                    background-color: #db5660;
                    height: 20px;
                    width: 20px;
                    left: 42px;
                    top: -1px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  "
                  class="div"
                >
                  ' . $qty . '
                </div>
              </a>
              <a    style="display:' . $user . ' ;" class="nav-item nav-link last my_styleings" href="contact.php"
                ><img
                  style="height: 30px; width: 30px; border-radius: 50%"
                  src="images/user.png"
                  />
                  </a>
                  </div>
                  <div style="display:' . $user . ' ;margin-top: 15px;"  class="logoutBox"><a href="userLogout.php">Logout</a></div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div
    class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable"
  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="exampleModalLabel">
          Only for admin
        </h3>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="container text-center">
        <div class="btn btn-outline-dark">
          <a href="./admin/table.php">Admin</a>
        </div>
        <br />
        <div class="btn btn-outline-dark mt-4">
          <a href="./admin/login.php">Admin login</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
';