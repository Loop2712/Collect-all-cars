@extends('layouts.mail_to')

@section('content')
	<div class="container">
		<div class="row">
			<!-- คอม -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12" style="font-size:16px;">
						<h4>เรียน <b>{{ $data["name"] }}</b></h4>
					</div>
				</div>
			</div>
		</div>
	</div>   
	<script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'th'}, 'google_translate_element');
              }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
@endsection
