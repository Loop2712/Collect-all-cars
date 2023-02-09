
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        navigator.geolocation.getCurrentPosition(initMap);

        // navigator.geolocation.getCurrentPosition(geocodeLatLng);
      } else { 
        // x.innerHTML = "Geolocation is not supported by this browser.";
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
       
        let location_users = document.querySelector("#location_user");
            location_users.innerHTML = '<a class=" shadow-box text-white btn btn-primary shadow" style="position:absolute;margin-top:-100px;margin-left:10px;border-radius:10px" id="submit"><i class="fas fa-search-location"></i></a>';

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

        document.querySelector('#btn_emergency_volunteer').classList.remove('d-none');

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
        let area = document.querySelector("#area");
        let content = document.querySelector("#content");

        // console.log(text_name.innerHTML);
        // console.log(area_help.innerHTML);
        // console.log(lat_text.value);
        // console.log(lng_text.value);
        // console.log(text_phone.value);

        if (content.value == "emergency_Charlie_Bangkok") {
            area.value = "ชาลีกรุงเทพ" ;
        }else{
            area.value = area_help.innerHTML ;
        }


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

    }

    function check_area(lat,lng) { //lat,lng

        for (let ii = 0; ii < result_area.length; ii++) {

            // console.log(result_area[ii]);
            // console.log(result_area[ii]['name']);
            // console.log(JSON.parse(result_area[ii]['sos_area']));
            // console.log(JSON.parse(result_area[ii]['sos_area']).length);

            let name_partner = result_area[ii]['name'];

            // let text_name_area = result_area[ii]['name_area'];
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

                    let logo_partner_help = document.querySelector('#logo_help');
                    let logo_sos = 'https://www.viicheck.com/storage/' + result_area[ii]['logo'];
                    
                        let text_name_area = result_area[ii]['name_area'];

                        // console.log(name_area.value);
                        // console.log(area_help.innerHTML);

                        if (name_area.value !== "") {
                            name_area.value = name_area.value + "&" + text_name_area ;
                        }else{
                            name_area.value = text_name_area ;
                        }

                        if (area_help.innerHTML !== "") {
                            area_help.innerHTML = area_help.innerHTML + " & " + name_partner ;
                        }else{
                            area_help.innerHTML = name_partner ;
                        }

                        if(result_area[ii]['logo']){   
                            logo_partner_help.src = logo_sos ;
                        }else{
                            logo_partner_help.src = 'https://www.viicheck.com/img/logo/logo_x-icon.png';
                        }  
                       

                        
                        

                    document.querySelector('#btn_quick_help').classList.add('d-none');
                } 
                
            }

        }

        document.querySelector('#div_goto').classList.remove('d-none');

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