<div class="container">
    <div class="row">
        <div class="col-12">
        <div>
    <select id="input_carbrand" onchange="showcar_brand()">
        <option value="">เลือกยี่ห้อ</option>
    </select>
</div>
<div>
    <select id="input_carmodel" class=" form-control" onchange="showcar_model()">
        <option value="">เลือกรุ่น</option>
    </select>
</div>


<script>
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("START");
    showcar_brand();    
});
function showcar_brand(){
    //PARAMETERS
    fetch("{{ url('/') }}/api/carbrand")
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
    let input_province = document.querySelector("#input_carmodel");
    fetch("{{ url('/') }}/api/carbrand/"+input_carbrand.value+"/carmodel"")
        .then(response => response.json())
        .then(result => {
            console.log(result);
            //UPDATE SELECT OPTION
            let input_carbrand = document.querySelector("#input_carbrand");
            input_carbrand.innerHTML = "";
            for(let item of result){
                let option = document.createElement("option");
                option.text = item.model;
                option.value = item.model;
                input_carbrand.add(option);                
            }
            //QUERY AMPHOES
           
        });
}
</script>
