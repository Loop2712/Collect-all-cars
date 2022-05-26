
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        navigator.geolocation.getCurrentPosition(initMap);
        // navigator.geolocation.getCurrentPosition(geocodeLatLng);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");
        let latlng = document.querySelector("#latlng");

        lat_text.value = position.coords.latitude ;
        lng_text.value = position.coords.longitude ;
        latlng.value = position.coords.latitude+","+position.coords.longitude ;

        let lat = parseFloat(lat_text.value) ;
        let lng = parseFloat(lng_text.value) ;

        // console.log(lat);
        // console.log(lng);

        let location_user = document.querySelector("#location_user");
            location_user.innerHTML = '<a class="btn-block shadow-box text-white btn btn-primary" id="submit"><i class="fas fa-search-location"></i> My Position</a>';

        check_area(lat,lng);
    }

    function initMap(position) { 
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");
        let latlng = document.querySelector("#latlng");

        lat_text.value = position.coords.latitude ;
        lng_text.value = position.coords.longitude ;
        latlng.value = position.coords.latitude+","+position.coords.longitude ;
        
        let lat = parseFloat(lat_text.value) ;
        let lng = parseFloat(lng_text.value) ;

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: { lat: lat, lng: lng },
            mapTypeId: "terrain",
        });
        // 40.7504479,-73.9936564,19

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
        const marker_user = new google.maps.Marker({ map, position: user });

        draw_area(map);

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        document.getElementById("location_user").addEventListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });

        marker_user.addListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });

        let text_sos = document.querySelector('#text_sos').value;

        if (text_sos === "insurance") {
            document.querySelector('#btn_contact_insurance').click();
        }
    }

    function geocodeLatLng(geocoder, map, infowindow) {
        const input = document.getElementById("latlng").value;
        const latlngStr = input.split(",", 2);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        geocoder
            .geocode({ location: latlng })
            .then((response) => {
                if (response.results[0]) {
                    map.setZoom(15);
                    const marker = new google.maps.Marker({
                      position: latlng,
                      map: map,
                    });
                    infowindow.setContent(response.results[0].formatted_address);
                    infowindow.open(map, marker);

                    let location_user = document.querySelector("#location_user");
                        location_user.innerHTML = response.results[0].formatted_address;
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
        }

    function confirm_phone() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");
        let area_help = document.querySelector("#area_help");

            // console.log(text_name.innerHTML);
            // console.log(area_help.innerHTML);
            // console.log(lat_text.value);
            // console.log(lng_text.value);
            // console.log(text_phone.value);

        let content = document.querySelector("#content");
        let area = document.querySelector("#area");

            content.value = "help_area" ;
            area.value = area_help.innerHTML ;

        document.querySelector("#btn_submit").click();

    }

    function edit_phone() {
        let phone = document.querySelector("#phone");
        let text_phone = document.querySelector("#text_phone");
        let input_phone = document.querySelector("#input_phone");
            text_phone.innerHTML = input_phone.value ;
            phone.value = input_phone.value ;
            // console.log(text_phone.innerHTML);
    }

    function add_phone() {
        let phone = document.querySelector("#phone");
        let text_phone = document.querySelector("#text_phone");
        let input_not_phone = document.querySelector("#input_not_phone");
            text_phone.innerHTML = input_not_phone.value ;
            phone.value = input_not_phone.value ;
            // console.log(text_phone.innerHTML);
    }

    function draw_area(map) {

        // console.log(result_area);

        for (var xii = 0; xii < result_area.length; xii++) {
            // console.log(result_area[xii]['sos_area']);
            // Construct the polygon.
            if (typeof result_area !== null) {

                let draw_area = new google.maps.Polygon({
                    paths: JSON.parse(result_area[xii]['sos_area']),
                    strokeColor: "#008450",
                    strokeOpacity: 0.8,
                    strokeWeight: 1,
                    fillColor: "#008450",
                    fillOpacity: 0.25,
                });
                draw_area.setMap(map);

            }

            // console.log(JSON.parse(result_area[xii]['sos_area']))
        }

    //     // พื้นที่ทดสอบ
    //     const area_test = [
    //         { lat: 14.1150621, lng: 100.6013697 },
    //         { lat: 14.1150621, lng: 100.6074465 },
    //         { lat: 14.1127626, lng: 100.6074465 },
    //         { lat: 14.1127626, lng: 100.6013697 },
    //       ];

    //       // Construct the polygon.
    //       const draw_area_test = new google.maps.Polygon({
    //         paths: area_test,
    //         strokeColor: "#008450",
    //         strokeOpacity: 0.8,
    //         strokeWeight: 1,
    //         fillColor: "#008450",
    //         fillOpacity: 0.25,
    //       });
    //       draw_area_test.setMap(map);
    // // // END พื้นที่ ทดสอบ

    // // // พื้นที่ VRU 
    //     const area_vru = [
    //         { lat: 14.1357294, lng: 100.6054468 },
    //         { lat: 14.1357294, lng: 100.6179993 },
    //         { lat: 14.1319187, lng: 100.6179993 },
    //         { lat: 14.1319187, lng: 100.6054468 },
            
    //       ];
    //       // Construct the polygon.
    //       const draw_area_vru = new google.maps.Polygon({
    //         paths: area_vru,
    //         strokeColor: "#008450",
    //         strokeOpacity: 0.8,
    //         strokeWeight: 1,
    //         fillColor: "#008450",
    //         fillOpacity: 0.25,
    //       });
    //       draw_area_vru.setMap(map);
    // // // END พื้นที่ VRU 

    // // พื้นที่ TU
    //     const tu_a = { lat: 14.077896, lng: 100.593465 };
    //     const tu_b = { lat: 14.080425, lng: 100.600798 };
    //     const tu_c = { lat: 14.076168, lng: 100.600594 };
    //     const tu_d = { lat: 14.076193, lng: 100.617410 };
    //     const tu_e = { lat: 14.066614, lng: 100.616926 };
    //     const tu_f = { lat: 14.066762, lng: 100.605290 };
    //     const tu_g = { lat: 14.065550, lng: 100.605443 };
    //     const tu_h = { lat: 14.066020, lng: 100.597200 };
    //     const tu_i = { lat: 14.075945, lng: 100.596154 };
    //     const tu_j = { lat: 14.076391, lng: 100.594189 };

    //     const area_tu = [tu_a,tu_b,tu_c,tu_d,tu_e,tu_f,tu_g,tu_h,tu_i,tu_j,];

    //       // Construct the polygon.
    //     const draw_area_tu = new google.maps.Polygon({
    //         paths: area_tu,
    //         strokeColor: "#008450",
    //         strokeOpacity: 0.8,
    //         strokeWeight: 1,
    //         fillColor: "#008450",
    //         fillOpacity: 0.25,
    //       });
    //       draw_area_tu.setMap(map);
    // // // END พื้นที่ TU

    // // พื้นที่ บ้านลัค
    //     const luck_a = { lat: 14.187077, lng: 101.162882 };
    //     const luck_b = { lat: 14.187651, lng: 101.162502 };
    //     const luck_c = { lat: 14.188048, lng: 101.163155 };
    //     const luck_d = { lat: 14.188600, lng: 101.163246 };
    //     const luck_e = { lat: 14.188644, lng: 101.164103 };
    //     const luck_f = { lat: 14.187386, lng: 101.164194 };
    //     const luck_h = { lat: 14.187077, lng: 101.164133 };

    //     const area_luck = [luck_a,luck_b,luck_c,luck_d,luck_e,luck_f,luck_h,];

    //     // Construct the polygon.
    //     const draw_area_luck = new google.maps.Polygon({
    //         paths: area_luck,
    //         strokeColor: "#008450",
    //         strokeOpacity: 0.8,
    //         strokeWeight: 1,
    //         fillColor: "#008450",
    //         fillOpacity: 0.25,
    //       });
    //       draw_area_luck.setMap(map);
    // // END พื้นที่ บ้านลัค

    // // พื้นที่ พระจอมเกล้าพระนครเหนือ
    //     const kmutnb_a = { lat: 13.819200, lng: 100.512753 };
    //     const kmutnb_b = { lat: 13.818744, lng: 100.514181 };
    //     const kmutnb_c = { lat: 13.819357, lng: 100.514901 };
    //     const kmutnb_d = { lat: 13.819157, lng: 100.515523 };
    //     const kmutnb_e = { lat: 13.819333, lng: 100.515561 };
    //     const kmutnb_f = { lat: 13.819222, lng: 100.516228 };
    //     const kmutnb_g = { lat: 13.821000, lng: 100.517113 };
    //     const kmutnb_i = { lat: 13.822192, lng: 100.514845 };
    //     const kmutnb_j = { lat: 13.824593, lng: 100.512288 };
    //     const kmutnb_k = { lat: 13.824234, lng: 100.511526 };
    //     const kmutnb_l = { lat: 13.823348, lng: 100.512004 };
    //     const kmutnb_m = { lat: 13.822952, lng: 100.511392 };
    //     const kmutnb_n = { lat: 13.821650, lng: 100.512422 };
    //     const kmutnb_o = { lat: 13.820254, lng: 100.514284 };

    //     const area_kmutnb = [kmutnb_a,kmutnb_b,kmutnb_c,kmutnb_d,kmutnb_e,
    //         kmutnb_f,kmutnb_g,kmutnb_i,kmutnb_j,kmutnb_k,kmutnb_l,kmutnb_m,kmutnb_n,kmutnb_o,];

    //     // Construct the polygon.
    //     const draw_area_kmutnb = new google.maps.Polygon({
    //         paths: area_kmutnb,
    //         strokeColor: "#008450",
    //         strokeOpacity: 0.8,
    //         strokeWeight: 1,
    //         fillColor: "#008450",
    //         fillOpacity: 0.25,
    //       });
    //       draw_area_kmutnb.setMap(map);
    // // END พื้นที่ พระจอมเกล้าพระนครเหนือ

    // // พื้นที่ หมู่บ้านซิเมนต์ไทย
    //     const thai_cement_a = { lat: 13.833294, lng: 100.539767 };
    //     const thai_cement_b = { lat: 13.830202, lng: 100.541761 };
    //     const thai_cement_c = { lat: 13.830106, lng: 100.549475 };
    //     const thai_cement_d = { lat: 13.833513, lng: 100.551297 };
    //     const thai_cement_e = { lat: 13.831744, lng: 100.546931 };
    //     const thai_cement_f = { lat: 13.834021, lng: 100.545848 };
    //     const thai_cement_g = { lat: 13.833294, lng: 100.544432 };
    //     const thai_cement_h = { lat: 13.832725, lng: 100.544441 };
    //     const thai_cement_i = { lat: 13.832541, lng: 100.543981 };
    //     const thai_cement_j = { lat: 13.834477, lng: 100.542781 };
    //     const thai_cement_k = { lat: 13.836728, lng: 100.540570 };

    //     const area_thai_cement = [thai_cement_a,thai_cement_b,thai_cement_c,thai_cement_d,thai_cement_e,thai_cement_f,thai_cement_g,
    //         thai_cement_h,thai_cement_i,thai_cement_j,thai_cement_k,];

    //     // Construct the polygon.
    //     const draw_area_thai_cement = new google.maps.Polygon({
    //         paths: area_thai_cement,
    //         strokeColor: "#008450",
    //         strokeOpacity: 0.8,
    //         strokeWeight: 1,
    //         fillColor: "#008450",
    //         fillOpacity: 0.25,
    //       });
    //       draw_area_thai_cement.setMap(map);
    // // END พื้นที่ หมู่บ้านซิเมนต์ไทย

    }

    function check_area(lat,lng) { //lat,lng

        for (let ii = 0; ii < result_area.length; ii++) {

            // console.log(result_area[ii]);
            // console.log(result_area[ii]['name']);
            // console.log(JSON.parse(result_area[ii]['sos_area']));
            // console.log(JSON.parse(result_area[ii]['sos_area']).length);

            let name_partner = result_area[ii]['name'];
            let arr_lat_lng = JSON.parse(result_area[ii]['sos_area']);
            
            if (arr_lat_lng !== null) {
                let area_arr = [] ;

                let arr_length = JSON.parse(result_area[ii]['sos_area']).length;

                for(z = 0; z < arr_length; z++){
                    
                    let text_latlng = parseFloat(arr_lat_lng[z]['lat']) + "," + parseFloat(arr_lat_lng[z]['lng']) ;
                        text_latlng = JSON.parse("[" + text_latlng + "]");

                    area_arr.push(text_latlng);
                }


                if ( inside([ lat, lng ], area_arr) ) {

                    document.querySelector('#a_help').classList.remove('d-none');
                    let area_help = document.querySelector("#area_help");
                    let name_area = document.querySelector("#name_area");
                        name_area.value = result_area[ii]['name_area'];
                        console.log(name_area.value);
                        // console.log(area_help.innerHTML);

                        if (name_area.value !== "") {
                            name_area.value = name_area.value + " & " + name_area.value ;
                        }else{
                            name_area.value = name_area.value ;
                        }

                        if (area_help.innerHTML !== "") {
                            area_help.innerHTML = area_help.innerHTML + " & " + name_partner ;
                        }else{
                            area_help.innerHTML = name_partner ;
                        }
                        

                    document.querySelector('#btn_quick_help').classList.add('d-none');
                } 
                
            }

        }

        document.querySelector('#div_goto').classList.remove('d-none');

        // // // พื้นที่ ทดสอบ
        // const area_test = [
        //         [ 14.1150621, 100.6013697 ],
        //         [ 14.1150621, 100.6074465 ],
        //         [ 14.1127626, 100.6074465 ],
        //         [ 14.1127626, 100.6013697 ],
        //     ];

        // // // พื้นที่ VRU
        // const area_vru = [
        //         [ 14.1357294, 100.6054468 ],
        //         [ 14.1357294, 100.6179993 ],
        //         [ 14.1319187, 100.6179993 ],
        //         [ 14.1319187, 100.6054468 ],
                
        //       ];

        // // // พื้นที่ มธ
        //     const area_tu = [
        //         [ 14.077896, 100.593465 ],
        //         [ 14.080425, 100.600798 ],
        //         [ 14.076168, 100.600594 ],
        //         [ 14.076193, 100.617410 ],
        //         [ 14.066614, 100.616926 ],
        //         [ 14.066762, 100.605290 ],
        //         [ 14.065550, 100.605443 ],
        //         [ 14.066020, 100.597200 ],
        //         [ 14.075945, 100.596154 ],
        //         [ 14.076391, 100.594189 ],
        //     ];

        // // พื้นที่ บ้านลัค
        //     const area_luck = [
        //         [ 14.187077, 101.162882 ],
        //         [ 14.187651, 101.162502 ],
        //         [ 14.188048, 101.163155 ],
        //         [ 14.188600, 101.163246 ],
        //         [ 14.188644, 101.164103 ],
        //         [ 14.187386, 101.164194 ],
        //         [ 14.187077, 101.164133 ],
        //     ];

        // // พื้นที่ พระจอมเกล้าพระนครเหนือ
        //     const area_kmutnb = [
        //         [ 13.819200, 100.512753 ],
        //         [ 13.818744, 100.514181 ],
        //         [ 13.819357, 100.514901 ],
        //         [ 13.819157, 100.515523 ],
        //         [ 13.819333, 100.515561 ],
        //         [ 13.819222, 100.516228 ],
        //         [ 13.821000, 100.517113 ],
        //         [ 13.822192, 100.514845 ],
        //         [ 13.824593, 100.512288 ],
        //         [ 13.824234, 100.511526 ],
        //         [ 13.823348, 100.512004 ],
        //         [ 13.822952, 100.511392 ],
        //         [ 13.821650, 100.512422 ],
        //         [ 13.820254, 100.514284 ],
        //     ];

        // // พื้นที่ หมู่บ้านซิเมนต์ไทย
        //     const area_thai_cement = [
        //         [ 13.833294, 100.539767 ],
        //         [ 13.830202, 100.541761 ],
        //         [ 13.830106, 100.549475 ],
        //         [ 13.833513, 100.551297 ],
        //         [ 13.831744, 100.546931 ],
        //         [ 13.834021, 100.545848 ],
        //         [ 13.833294, 100.544432 ],
        //         [ 13.832725, 100.544441 ],
        //         [ 13.832541, 100.543981 ],
        //         [ 13.834477, 100.542781 ],
        //         [ 13.836728, 100.540570 ],
        //     ];

        // // let lat = 13.8334364;
        // // let lng = 100.5405355;

        // if ( inside([ lat, lng ], area_test) ) {
        //     // พื้นที่ทดสอบ
        //     document.querySelector('#a_help').classList.remove('d-none');
        //     let area_help = document.querySelector("#area_help");
        //         area_help.innerHTML = "ViiCHECK Volunteer"

        // } else if ( inside([ lat, lng ], area_luck) ) {
        //     // luck
        //     document.querySelector('#a_help').classList.remove('d-none');
        //     let area_help = document.querySelector("#area_help");
        //         area_help.innerHTML = "ViiCHECK"

        // } else if ( inside([ lat, lng ], area_thai_cement) ) {
        //     // หมู่บ้านซิเมนต์ไทย
        //     document.querySelector('#a_help').classList.remove('d-none');
        //     let area_help = document.querySelector("#area_help");
        //         area_help.innerHTML = "ViiCHECK"

        // } else if ( inside([ lat, lng ], area_vru) ) {
        //     // VRU
        //     document.querySelector('#a_help').classList.remove('d-none');
        //     let area_help = document.querySelector("#area_help");
        //         area_help.innerHTML = "VRU"

        // } else if ( inside([ lat, lng ], area_tu) ) {
        //     // TU
        //     document.querySelector('#a_help').classList.remove('d-none');
        //     let area_help = document.querySelector("#area_help");
        //         area_help.innerHTML = "TU"

        // } else if ( inside([ lat, lng ], area_kmutnb) ) {
        //     // KMUTNB
        //     document.querySelector('#a_help').classList.remove('d-none');
        //     let area_help = document.querySelector("#area_help");
        //         area_help.innerHTML = "KMUTNB"

        // } else{
        //     document.querySelector('#btn_quick_help').classList.remove('d-none');
        // }

    }

    function inside(point, vs) {

        var x = point[0], y = point[1];
        
        var inside = false;

        for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
            var xi = vs[i][0], yi = vs[i][1];
            var xj = vs[j][0], yj = vs[j][1];
            
            var intersect = ((yi > y) != (yj > y))
                && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) inside = !inside;
        }
        // console.log(inside);
        return inside;

    };