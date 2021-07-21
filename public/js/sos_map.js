document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();
    });

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
            location_user.innerHTML = '<a class="btn-block shadow-box text-white btn btn-primary" id="submit"><i class="fas fa-search-location"></i> ตำแหน่งของฉัน</a>';

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
        });

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
        const marker_user = new google.maps.Marker({ map, position: user });

        draw_area(map);

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        document.getElementById("submit").addEventListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });

        marker_user.addListener("click", () => {
            geocodeLatLng(geocoder, map, infowindow);
        });
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

            console.log(text_name.innerHTML);
            console.log(area_help.innerHTML);
            console.log(lat_text.value);
            console.log(lng_text.value);
            console.log(text_phone.value);

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

    function police() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");

            content.value = "police" ;

        document.querySelector("#btn_submit").click();

    }

    function js100() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");

            content.value = "js100" ;

        document.querySelector("#btn_submit").click();

    }

    function life_saving() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");

            content.value = "life_saving" ;

        document.querySelector("#btn_submit").click();

    }

    function pok_tek_tung() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");

            content.value = "pok_tek_tung" ;

        document.querySelector("#btn_submit").click();

    }

    function highway() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");

            content.value = "highway" ;

        document.querySelector("#btn_submit").click();

    }

    function lawyers() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");

            content.value = "lawyers" ;

        document.querySelector("#btn_submit").click();

    }

    function draw_area(map) {
        // พื้นที่ทดสอบ
        const area_test = [
            { lat: 14.1150621, lng: 100.6013697 },
            { lat: 14.1150621, lng: 100.6074465 },
            { lat: 14.1127626, lng: 100.6074465 },
            { lat: 14.1127626, lng: 100.6013697 },
          ];

          // Construct the polygon.
          const draw_area_test = new google.maps.Polygon({
            paths: area_test,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
          });
          draw_area_test.setMap(map);
    // // END พื้นที่ ทดสอบ

    // // พื้นที่ VRU 
        const area_vru = [
            { lat: 14.1357294, lng: 100.6054468 },
            { lat: 14.1357294, lng: 100.6179993 },
            { lat: 14.1319187, lng: 100.6179993 },
            { lat: 14.1319187, lng: 100.6054468 },
            
          ];
          // Construct the polygon.
          const draw_area_vru = new google.maps.Polygon({
            paths: area_vru,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
          });
          draw_area_vru.setMap(map);
    // // END พื้นที่ VRU 

    // พื้นที่ TU
        const tu_a = { lat: 14.077896, lng: 100.593465 };
        const tu_b = { lat: 14.080425, lng: 100.600798 };
        const tu_c = { lat: 14.076168, lng: 100.600594 };
        const tu_d = { lat: 14.076193, lng: 100.617410 };
        const tu_e = { lat: 14.066614, lng: 100.616926 };
        const tu_f = { lat: 14.066762, lng: 100.605290 };
        const tu_g = { lat: 14.065550, lng: 100.605443 };
        const tu_h = { lat: 14.066020, lng: 100.597200 };
        const tu_i = { lat: 14.075945, lng: 100.596154 };
        const tu_j = { lat: 14.076391, lng: 100.594189 };

        const area_tu = [tu_a,tu_b,tu_c,tu_d,tu_e,tu_f,tu_g,tu_h,tu_i,tu_j,];

          // Construct the polygon.
        const draw_area_tu = new google.maps.Polygon({
            paths: area_tu,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
          });
          draw_area_tu.setMap(map);
    // // END พื้นที่ TU

    // พื้นที่ บ้านลัค
        const luck_a = { lat: 14.187077, lng: 101.162882 };
        const luck_b = { lat: 14.187651, lng: 101.162502 };
        const luck_c = { lat: 14.188048, lng: 101.163155 };
        const luck_d = { lat: 14.188600, lng: 101.163246 };
        const luck_e = { lat: 14.188644, lng: 101.164103 };
        const luck_f = { lat: 14.187386, lng: 101.164194 };
        const luck_h = { lat: 14.187077, lng: 101.164133 };

        const area_luck = [luck_a,luck_b,luck_c,luck_d,luck_e,luck_f,luck_h,];

        // Construct the polygon.
        const draw_area_luck = new google.maps.Polygon({
            paths: area_luck,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
          });
          draw_area_luck.setMap(map);
    // END พื้นที่ บ้านลัค
    }

    function check_area(lat,lng) {

        // // พื้นที่ ทดสอบ
        const area_test = [
                [ 14.1150621, 100.6013697 ],
                [ 14.1150621, 100.6074465 ],
                [ 14.1127626, 100.6074465 ],
                [ 14.1127626, 100.6013697 ],
            ];

        // // พื้นที่ VRU
        const area_vru = [
                [ 14.1357294, 100.6054468 ],
                [ 14.1357294, 100.6179993 ],
                [ 14.1319187, 100.6179993 ],
                [ 14.1319187, 100.6054468 ],
                
              ];

        // // พื้นที่ มธ
            const area_tu = [
                [ 14.077896, 100.593465 ],
                [ 14.080425, 100.600798 ],
                [ 14.076168, 100.600594 ],
                [ 14.076193, 100.617410 ],
                [ 14.066614, 100.616926 ],
                [ 14.066762, 100.605290 ],
                [ 14.065550, 100.605443 ],
                [ 14.066020, 100.597200 ],
                [ 14.075945, 100.596154 ],
                [ 14.076391, 100.594189 ],
            ];

        // พื้นที่ บ้านลัค
            const area_luck = [
                [ 14.187077, 101.162882 ],
                [ 14.187651, 101.162502 ],
                [ 14.188048, 101.163155 ],
                [ 14.188600, 101.163246 ],
                [ 14.188644, 101.164103 ],
                [ 14.187386, 101.164194 ],
                [ 14.187077, 101.164133 ],
            ];

        if ( inside([ lat, lng ], area_test) ) {
            // พื้นที่ทดสอบ
            document.querySelector('#a_help').classList.remove('d-none');
            let area_help = document.querySelector("#area_help");
                area_help.innerHTML = "ทดสอบ"

        } else if ( inside([ lat, lng ], area_vru) ) {
            // VRU
            document.querySelector('#a_help').classList.remove('d-none');
            let area_help = document.querySelector("#area_help");
                area_help.innerHTML = "VRU"

        } else if ( inside([ lat, lng ], area_tu) ) {
            // TU
            document.querySelector('#a_help').classList.remove('d-none');
            let area_help = document.querySelector("#area_help");
                area_help.innerHTML = "TU"

        } else if ( inside([ lat, lng ], area_luck) ) {
            // luck
            document.querySelector('#a_help').classList.remove('d-none');
            let area_help = document.querySelector("#area_help");
                area_help.innerHTML = "ทดสอบ"

        } else{
            document.querySelector('#btn_quick_help').classList.remove('d-none');
        }

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