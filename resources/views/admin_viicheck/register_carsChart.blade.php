<canvas id="register_carsChart"></canvas>
<script>
var ctx = document.getElementById('register_carsChart').getContext('2d');
var register_carsChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['<?php echo $vmove_desc_province[0] ?>', '<?php echo $vmove_desc_province[1] ?>', '<?php echo $vmove_desc_province[2] ?>', '<?php echo $vmove_desc_province[3] ?>', '<?php echo $vmove_desc_province[4] ?>'],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo $vmove_desc_count[0] ?>, <?php echo $vmove_desc_count[1] ?>, <?php echo $vmove_desc_count[2] ?>, <?php echo $vmove_desc_count[3] ?>, <?php echo $vmove_desc_count[4] ?>],
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