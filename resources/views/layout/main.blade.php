<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.title')

</head>

<body id="page-top">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->

      <div id="content">
          @include('layout.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid"> 
            @include('layout.header')

            @yield('content')

        </div>

        <!-- /.container-fluid -->
      </div>

      <!-- End of Main Content -->
      @include('layout.footer')
    </div>
    
    <!-- End of Content Wrapper -->
    @include('layout.js')
   
</body>

</html>