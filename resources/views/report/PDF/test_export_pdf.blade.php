@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br><br><br><br>

<!-- html2pdf CDN link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container d-none d-sm-block">
    <div class="row">
        <div class="col-12">
            
            <button class="btn btn-success main-shadow main-radius notranslate" id="download-button">
               Export PDF
            </button>
            <br><br>

            <!-- Content PDF -->
            <div id="slip" class="notranslate">

               <div class="" style="border-bottom: 2px solid red;">
                  <div class="container d-flex align-items-center">
                     <div class="row">
                        <div class="col-3">
                           <a href="{{URL::to('/')}}">
                              <img width="80%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
                           </a>
                        </div>
                        <div class="col-9">
                           <span style="position: absolute;bottom: 0;right: 0;">
                              วันที่ : {{ date("d/m/Y") }}
                           </span>
                        </div>

                        <div class="col-12 fixed-bottom">
                           
                        </div>
                     </div>
                  </div>
               </div>


            </div>

        </div>
    </div>
</div>
   

<script>
   const button = document.getElementById('download-button');

   function generatePDF() {
      // Choose the element that your content will be rendered to.
      const element = document.getElementById('slip');
      var opt = {
            margin:  1,
            filename: 'TEST_Export_PDF',
         };

         // New Promise-based usage:
         html2pdf().from(element).set(opt).save();
   }

   button.addEventListener('click', generatePDF);
</script>

@endsection