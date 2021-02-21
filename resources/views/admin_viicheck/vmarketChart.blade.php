<div class="row">
    <canvas id="vmarketChart"></canvas>
<script>
var ctx = document.getElementById('vmarketChart').getContext('2d');
var vmarketChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['<?php echo $vmarket_desc_location[0] ?>', '<?php echo $vmarket_desc_location[1] ?>', '<?php echo $vmarket_desc_location[2] ?>', '<?php echo $vmarket_desc_location[3] ?>', '<?php echo $vmarket_desc_location[4] ?>'],
        datasets: [{
            label: '# ทั้งหมด',
            data: [<?php echo $vmarket_desc_count[0] ?>, <?php echo $vmarket_desc_count[1] ?>, <?php echo $vmarket_desc_count[2] ?>, <?php echo $vmarket_desc_count[3] ?>, <?php echo $vmarket_desc_count[4] ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1.5
        }]
    }
});
</script>
</div>