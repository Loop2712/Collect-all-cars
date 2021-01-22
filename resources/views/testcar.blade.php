<select name="brand" id="brand" class="form-control">
        <option value="" selected > - เลือกยี่ห้อรถยนต์ / Select Car Brand - </option> 
</select>
{!! $errors->first('brand', '<p class="help-block">:message</p>') !!}

<select name="generation" id="generation" class="form-control">
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
        $("#brand").empty();
        for(var i=0; i<result.length; i++){
          $("#brand").append(
            $('<option></option>')
              .attr("value", "1"+result[i].brand)
              .html(""+result[i].brand)
          );
        }
        showModel();
      };
      //CALL AJAX
      ajax(url,callback);
    }
</script>