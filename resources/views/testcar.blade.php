<select name="brand" id="input_brand" class="form-control" onchange="showModel()">
        <option value="" selected > - เลือกยี่ห้อรถยนต์ / Select Car Brand - </option> 
</select>
{!! $errors->first('brand', '<p class="help-block">:message</p>') !!}

<select name="generation" id="input_generation" class="form-control">
        <option value="" selected > - เลือกรุ่นรถยนต์ / Select Car Model - </option> 
</select>
{!! $errors->first('generation', '<p class="help-block">:message</p>') !!}

<script>
  $(document).ready(function(){
    console.log("HELLO");
    showProvinces();
  });
</script>

<script>
    function ajax(url, callback){
      $.ajax({
        "url" : url,
        "type" : "GET",
        "dataType" : "json",
      })
      .done(callback); //END AJAX
    }
</script>

<script>
    function showBrand(){
      //PARAMETERS
      var url = "{{ url('/') }}/api/car_brand";
      var callback = function(result){
        $("#input_brand").empty();
        for(var i=0; i<result.length; i++){
          $("#input_brand").append(
            $('<option></option>')
              .attr("value", "Toyota"+result[i].brand)
              .html(""+result[i].brand)
          );
        }
        showModel();
      };
      //CALL AJAX
      ajax(url,callback);
    }
</script>

<script>
  function showModel(){
      //INPUT
      var province_code = $("#input_province").val();
      //PARAMETERS
      var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe";
      var callback = function(result){
        //console.log(result);
        $("#input_amphoe").empty();
        for(var i=0; i<result.length; i++){
          $("#input_amphoe").append(
            $('<option></option>')
              .attr("value", ""+result[i].amphoe_code)
              .html(""+result[i].amphoe)
          );
        }
        showDistricts();
      };
      //CALL AJAX
      ajax(url,callback);
    }
</script>