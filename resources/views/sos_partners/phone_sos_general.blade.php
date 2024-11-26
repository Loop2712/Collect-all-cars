

<div id="div_phone_sos_general" class="col-12 card shadow p-2 d-none">
    <div id="content_phone_sos_general" class="col-12 row notranslate align-items-center"></div>
</div>

<script>
	function get_phone_sos_general(countryCode){
    	// console.log("สัญชาติ >> " + nationalitie);
        // console.log("อยู่ที่ >> " + countryCode);

        fetch("{{ url('/') }}/api/get_phone_sos_general/" + countryCode)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result.length > 0){

                	document.querySelector('#div_phone_sos_general').classList.remove('d-none');

                	let div = document.querySelector('#content_phone_sos_general');
                		div.innerHTML = "" ;

                	for (let i = 0; i < result.length; i++) {
	                	let html = `
	                		<div class="col-7 mt-2 mb-2 text-center">
						        <p style="font-size:15px; vertical-align: middle;margin:0px ">`+result[i].name+`</p>
						    </div>
						    <div class="col-5 mt-2 mb-2">
						        <a class="btn btn-danger btn-block shadow-box text-white" onclick="save_sos_content('police','110');" style=" background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i>&nbsp; `+result[i].phone+`</a>
						    </div>
	                	`;

	                	div.insertAdjacentHTML("beforeend", html);
                	}
                }
            });
	}
</script>