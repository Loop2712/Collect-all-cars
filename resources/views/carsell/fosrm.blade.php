<div class="container">
    <div class="row">
    
        <div class="col-12">
        <div>
    <select class="form-control" id="input_carbrand" onchange="showcar_model()">
        <option value="">เลือกยี่ห้อ</option>
    </select>
</div>
<div>
    <select id="input_carmodel" class="form-control" >
        <option value="">เลือกรุ่น</option>
    </select>
</div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>


<script>
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("START");
    showcar_brand();    
});
function showcar_brand(){
    //PARAMETERS
    fetch("{{ url('/') }}/api/car_brand")
        .then(response => response.json())
        .then(result => {
            console.log(result);
            //UPDATE SELECT OPTION
            let input_carbrand = document.querySelector("#input_carbrand");
                input_carbrand.innerHTML = "";
            for(let item of result){
                let option = document.createElement("option");
                option.text = item.brand;
                option.value = item.brand;
                input_carbrand.add(option);                
            }
            //QUERY AMPHOES
            showcar_model();
        });
}
function showcar_model(){
    let input_carbrand = document.querySelector("#input_carbrand");
    fetch("{{ url('/') }}/api/car_brand/"+input_carbrand.value+"/car_model")
        .then(response => response.json())
        .then(result => {
            console.log(result);
            //UPDATE SELECT OPTION
            let input_carmodel = document.querySelector("#input_carmodel");
            input_carmodel.innerHTML = "";
            for(let item of result){
                let option = document.createElement("option");
                option.text = item.model;
                option.value = item.model;
                input_carmodel.add(option);                
            }
            //QUERY AMPHOES
           
        });
}
</script>
