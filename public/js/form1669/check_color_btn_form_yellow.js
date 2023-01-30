function check_color_btn(active){
	// Check lat lng empty
    let input_lat = document.querySelector('#lat') ;
    let input_lng = document.querySelector('#lng') ;

	if (input_lat.value && input_lng.value) {
		document.querySelector('#btn_get_location_user').disabled = false ;
	}else{
		document.querySelector('#btn_get_location_user').disabled = true ;
	}

	// ---------------------------- ข้อใน form ----------------------------
    // ==>> 1
	let be_notified = document.querySelectorAll('input[name="be_notified"]');
	let be_notified_value = null ;
		be_notified.forEach(be_notified => {
		    if(be_notified.checked){
		        be_notified_value = be_notified.value;
		    }
		})
	let name_user = document.querySelector('[name="name_user"]');
	let phone_user = document.querySelector('[name="phone_user"]');
	let lat = document.querySelector('[name="lat"]');
	let lng = document.querySelector('[name="lng"]');
	let location_sos = document.querySelector('[name="location_sos"]');

	// ==>> 2
	let symptom = document.getElementsByClassName('symptom');
	let symptom_value = null ;

		for (let i = 0; i < symptom.length; i++) {
	        if (symptom[i].checked) {
	        	symptom_value = symptom_value + " , " +  symptom[i].value ;
	        }
	    }

	// ==>> 3
	let symptom_other = document.querySelector('[name="symptom_other"]');

	// ==>> 4
	let idc = document.querySelectorAll('input[name="idc"]');
	let idc_value = null ;
		idc.forEach(idc => {
		    if(idc.checked){
		        idc_value = idc.value;
		    }
		})

	// ==>> 5
	let vehicle_type = document.querySelectorAll('input[name="vehicle_type"]');
	let vehicle_type_value = null ;
		vehicle_type.forEach(vehicle_type => {
		    if(vehicle_type.checked){
		        vehicle_type_value = vehicle_type.value;
		    }
		})
	let operating_suit_type = document.querySelectorAll('input[name="operating_suit_type"]');
	let operating_suit_type_value = null ;
		operating_suit_type.forEach(operating_suit_type => {
		    if(operating_suit_type.checked){
		        operating_suit_type_value = operating_suit_type.value;
		    }
		}) 
	let operation_unit_name = document.querySelector('[name="operation_unit_name"]'); 
	let action_set_name = document.querySelector('[name="action_set_name"]'); 
	// <!-- ตารางเวลาปฏิบัติการ -->
	let time_create_sos = document.querySelector('[name="time_create_sos"]'); 
	let time_command = document.querySelector('[name="time_command"]'); 
	let time_go_to_help = document.querySelector('[name="time_go_to_help"]'); 
	let time_to_the_scene = document.querySelector('[name="time_to_the_scene"]'); 
	let time_leave_the_scene = document.querySelector('[name="time_leave_the_scene"]'); 
	let time_hospital = document.querySelector('[name="time_hospital"]'); 
	let time_to_the_operating_base = document.querySelector('[name="time_to_the_operating_base"]'); 
	let km_create_sos_to_go_to_help = document.querySelector('[name="km_create_sos_to_go_to_help"]'); 
	let km_to_the_scene_to_leave_the_scene = document.querySelector('[name="km_to_the_scene_to_leave_the_scene"]'); 
	let km_hospital = document.querySelector('[name="km_hospital"]'); 
	let km_operating_base = document.querySelector('[name="km_operating_base"]'); 

	// ==>> 6
	let rc = document.querySelectorAll('input[name="rc"]');
	let rc_value = null ;
		rc.forEach(rc => {
		    if(rc.checked){
		        rc_value = rc.value;
		    }
		})
	let rc_black_text = document.querySelector('[name="rc_black_text"]'); 

	// ==>> 7
	let treatment = document.querySelectorAll('input[name="treatment"]');
	let treatment_value = null ;
		treatment.forEach(treatment => {
		    if(treatment.checked){
		        treatment_value = treatment.value;
		    }
		})
	let sub_treatment = document.getElementsByClassName('sub_treatment');
	let sub_treatment_value = null ;
		for (let i = 0; i < sub_treatment.length; i++) {
	        if (sub_treatment[i].checked) {
	        	sub_treatment_value = sub_treatment_value + " , " +  sub_treatment[i].value ;
	        }
	    }

	// ==>> 8
	let patient_name_1 = document.querySelector('[name="patient_name_1"]');
	let patient_age_1 = document.querySelector('[name="patient_age_1"]'); 
	let patient_hn_1 = document.querySelector('[name="patient_hn_1"]'); 
	let patient_vn_1 = document.querySelector('[name="patient_vn_1"]'); 
	let delivered_province_1 = document.querySelector('[name="delivered_province_1"]'); 
	let delivered_hospital_1 = document.querySelector('[name="delivered_hospital_1"]'); 
	let patient_name_2 = document.querySelector('[name="patient_name_2"]'); 
	let patient_age_2 = document.querySelector('[name="patient_age_2"]'); 
	let patient_hn_2 = document.querySelector('[name="patient_hn_2"]'); 
	let patient_vn_2 = document.querySelector('[name="patient_vn_2"]'); 
	let delivered_province_2 = document.querySelector('[name="delivered_province_2"]'); 
	let delivered_hospital_2 = document.querySelector('[name="delivered_hospital_2"]'); 

	let submission_criteria = document.getElementsByClassName('submission_criteria');
	let submission_criteria_value = null ;
		for (let i = 0; i < submission_criteria.length; i++) {
	        if (submission_criteria[i].checked) {
	        	submission_criteria_value = submission_criteria_value + " , " +  submission_criteria[i].value ;
	        }
	    }
	let communication_hospital = document.getElementsByClassName('communication_hospital');
	let communication_hospital_value = null ;
		for (let i = 0; i < communication_hospital.length; i++) {
	        if (communication_hospital[i].checked) {
	        	communication_hospital_value = communication_hospital_value + " , " +  communication_hospital[i].value ;
	        }
	    }

	// ==>> 9
	let registration_category = document.querySelector('[name="registration_category"]'); 
	let registration_number = document.querySelector('[name="registration_number"]'); 
	let registration_province = document.querySelector('[name="registration_province"]'); 
	let owner_registration = document.querySelectorAll('input[name="owner_registration"]');
	let owner_registration_value = null ;
		owner_registration.forEach(owner_registration => {
		    if(owner_registration.checked){
		        owner_registration_value = owner_registration.value;
		    }
		})

	// ------------------------------------------------------------------------------------------------------------

	// if (!next_page) {
	// 	next_page = 1 ;
	// 	document.querySelector('#btn_circle_' + next_page).classList.add('text-info') ;

	// }else{
	// 	let start_btn_circle = document.querySelector("#btn_circle_" + next_page);
	// 	let start_text_color_old = start_btn_circle.classList[2];
	// 		// console.log(start_text_color_old);
	// 	start_btn_circle.classList.remove(start_text_color_old);
	// 	document.querySelector('#btn_circle_' + next_page).classList.add('text-info') ;

	// }

	// if (active) {
	// 	document.querySelector('#btn_circle_' + active).classList.remove('text-info') ;
	// }
	var nav = $('.page_number');
	for (i = 0; i < nav.length; i++) {
		switch(active) {
			case '1':
				if(nav[i].getAttribute("page") == "number_1"){
					if (be_notified_value && name_user.value && phone_user.value && lat.value && lng.value && location_sos.value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;
			

			case '2':
				if(nav[i].getAttribute("page") == "number_2"){
					if (symptom_value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '3':
				if(nav[i].getAttribute("page") == "number_3"){
					if (symptom_other.value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '4':
				if(nav[i].getAttribute("page") == "number_4"){
					if (idc_value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '5':
				if(nav[i].getAttribute("page") == "number_5"){
					if (vehicle_type_value && operating_suit_type_value && operation_unit_name.value && action_set_name.value && time_create_sos.value && time_command.value && time_go_to_help.value && time_to_the_scene.value && time_leave_the_scene.value && time_hospital.value && time_to_the_operating_base.value && km_create_sos_to_go_to_help.value && km_to_the_scene_to_leave_the_scene.value && km_hospital.value && km_operating_base.value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '6':
				if(nav[i].getAttribute("page") == "number_6"){
					if (rc_value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '7':
				if(nav[i].getAttribute("page") == "number_7"){
					if (treatment_value && sub_treatment_value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '8':
				if(nav[i].getAttribute("page") == "number_8"){
					if (patient_name_1.value && patient_age_1.value && patient_hn_1.value && patient_vn_1.value && delivered_province_1.value && delivered_hospital_1.value && patient_name_2.value && patient_age_2.value && patient_hn_2.value && patient_vn_2.value && delivered_province_2.value && delivered_hospital_2.value && submission_criteria_value && communication_hospital_value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			case '9':
				if(nav[i].getAttribute("page") == "number_9"){
					if (registration_category.value && registration_number.value && registration_province.value && owner_registration_value) {
						nav[i].closest(".page_number").classList.remove("danger");
						nav[i].closest(".page_number").classList.add("success");
					
					}else{
						nav[i].closest(".page_number").classList.add("danger");
						nav[i].closest(".page_number").classList.remove("success");
					}
				}
			break;

			default:
			console.log(nav.length)

			
			// 1
			if(nav[i].getAttribute("page") == "number_1"){
				if (be_notified_value && name_user.value && phone_user.value && lat.value && lng.value && location_sos.value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}

			// 2
			if(nav[i].getAttribute("page") == "number_2"){
				if (symptom_value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}

			// 3
			if(nav[i].getAttribute("page") == "number_3"){
				if (symptom_other.value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
			// 4
			if(nav[i].getAttribute("page") == "number_4"){
				if (idc_value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
			// 5
			if(nav[i].getAttribute("page") == "number_5"){
				if (vehicle_type_value && operating_suit_type_value && operation_unit_name.value && action_set_name.value && time_create_sos.value && time_command.value && time_go_to_help.value && time_to_the_scene.value && time_leave_the_scene.value && time_hospital.value && time_to_the_operating_base.value && km_create_sos_to_go_to_help.value && km_to_the_scene_to_leave_the_scene.value && km_hospital.value && km_operating_base.value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
			// 6
			if(nav[i].getAttribute("page") == "number_6"){
				if (rc_value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
			// 7
			if(nav[i].getAttribute("page") == "number_7"){
				if (treatment_value && sub_treatment_value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
			// 8
			if(nav[i].getAttribute("page") == "number_8"){
				if (patient_name_1.value && patient_age_1.value && patient_hn_1.value && patient_vn_1.value && delivered_province_1.value && delivered_hospital_1.value && patient_name_2.value && patient_age_2.value && patient_hn_2.value && patient_vn_2.value && delivered_province_2.value && delivered_hospital_2.value && submission_criteria_value && communication_hospital_value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
			// 9
			if(nav[i].getAttribute("page") == "number_9"){
				if (registration_category.value && registration_number.value && registration_province.value && owner_registration_value) {
					nav[i].closest(".page_number").classList.remove("danger");
					nav[i].closest(".page_number").classList.add("success");
				
				}else{
					nav[i].closest(".page_number").classList.add("danger");
					nav[i].closest(".page_number").classList.remove("success");
				}
			}
		}
	}

}