<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Collect all cars!</title>
  </head>
  <body>
   
<nav class="navbar  navbar-dark fixed-top bg-dark">
<a class="navbar-brand" href="#">Collect all cars!</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>


<main role="main" class="container">
  <div class="row">
  <aside class="col-md-3 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
       </div>

      <div class="p-4">
        <h4 class="font-italic">generation</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">car 1</a></li>
          <li><a href="#">car 2 </a></li>
          <li><a href="#">car 3</a></li>
          <li><a href="#">car 4</a></li>
          <li><a href="#">car 5</a></li>
          <li><a href="#">car 6</a></li>
          <li><a href="#">car 7</a></li>
        </ol>
      </div>

      <div class="p-4">
        <h4 class="font-italic">รุ่นรถ</h4>
        <ol class="list-unstyled">
          <li><a href="#">รถ</a></li>
          <li><a href="#">รถ</a></li>
          <li><a href="#">รถ</a></li>
        </ol>
      </div>

   

    </aside><!-- /.blog-sidebar -->
    <div class="col-md-9 blog-main">
    <div class="p-4 mb-3 bg-white rounded">
       </div>
       <div class="p-4 mb-3 bg-white rounded">
       </div>
      <div class="row">
        <?php for($i=1;$i<=16;$i++){
            ?>
        <div class="col-md-4">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">รถรุ่นอะไรก็ไม่รู้ ลองทดสอบเขียนดูเฉยๆ</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </div>
                <small class="card-text">11111</small>
              </div>
            </div>
        </div>
            <?php 
            }?>
    </div><!-- /.blog-main -->
  </div><!-- /.row -->

</main>

<footer class="text-muted bg-light">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>footter !</p>
    <p>      </p>
    <p>footter !</p>
  </div>
</footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
  </body>
</html>