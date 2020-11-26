@extends('layout.main')

@section('content')


<!-- รูปไสลด์    -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://placehold.it/1900x1080" class="d-block w-100 " height="360"  >
    </div>
    <div class="carousel-item">
      <img src="http://placehold.it/1900x1080" class="d-block w-100 " height="360"  >
    </div>
    <div class="carousel-item">
      <img src="http://placehold.it/1900x1080" class="d-block w-100 " height="360"  >
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container">

<div class="card">
  <div class="card">
    <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">ค้นหา</button>
              </span>
            </div>
    </div>
  </div>
</div>

<div class="row text-center">


<div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
    <div class="card-body">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
    </div>
    <div class="card-footer">
      <a href="#" class="btn btn-primary">Find Out More!</a>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
    <div class="card-body">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
    </div>
    <div class="card-footer">
      <a href="#" class="btn btn-primary">Find Out More!</a>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
    <div class="card-body">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
    </div>
    <div class="card-footer">
      <a href="#" class="btn btn-primary">Find Out More!</a>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
    <div class="card-body">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
    </div>
    <div class="card-footer">
      <a href="#" class="btn btn-primary">Find Out More!</a>
    </div>
  </div>
</div>

</div>







</div>

@endsection