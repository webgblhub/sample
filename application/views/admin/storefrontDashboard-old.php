<?php
if(!empty($this->uri->segment(4)))
{
$switching=base64_decode($this->uri->segment(4));
$categories=base64_decode($this->uri->segment(5));
}
?>        
        <section>
         <div class="contaier dash-board-container-wrper">
           <div class="dash-input-cont">
            <div class="container option-selec-cont-sec">
              <div class="dash-header">
                <h4>Statistics</h4>
              </div>
<form method="get">
              <div class="row dash-header-wraper">
                  <div class="padding-dash col-lg-2 col-xs-1 col-sm-2">
                    <select name="ser" id="ser" class="dash-select" onchange="manage(this.value)" required>
            <option value="">Select</option>
            <option value="all" <?php if($this->input->get('ser')=='all') { ?> selected="selected"<?php } ?>>All</option>
            <option value="30" <?php if($this->input->get('ser')=='30') { ?> selected="selected"<?php } ?>>30 Days</option>
            <option value="60" <?php if($this->input->get('ser')=='60') { ?> selected="selected"<?php } ?>>60 Days</option>
            <option value="90" <?php if($this->input->get('ser')=='90') { ?> selected="selected"<?php } ?>>90 Days</option>
            <option value="year" <?php if($this->input->get('ser')=='year') { ?> selected="selected"<?php } ?>>Yearly</option>
            <option value="month" <?php if($this->input->get('ser')=='month') { ?> selected="selected"<?php } ?>>Monthly</option>
            <option value="custom" <?php if($this->input->get('ser')=='custom') { ?> selected="selected"<?php } ?>>Custom</option>
            </select> 
                  </div>

                  <div class="padding-dash col-lg-2 col-xs-1 col-sm-2 yearblock">
                    <?php $years = range(2000, strftime("%Y", time())); ?>
            <select class="dash-select " name="year" id="year" disabled="disabled" required>
              <option value="">Select Year</option>
              <?php foreach($years as $year) : ?>
                <option value="<?php echo $year; ?>" <?php if($this->input->get('year')==$year) { ?> selected="selected"<?php } ?>><?php echo $year; ?></option>
              <?php endforeach; ?>
            </select>
                  </div>

                  <div class="padding-dash col-lg-2 col-xs-1 col-sm-2 monthblock">
                    <select id="month" name="month" class="dash-select " required disabled="disabled">
              <option value="">Select Month</option>
              <option value="01" <?php if($this->input->get('month')=='01') { ?> selected="selected"<?php } ?>>January</option>
              <option value="02" <?php if($this->input->get('month')=='02') { ?> selected="selected"<?php } ?>>February</option>
              <option value="03" <?php if($this->input->get('month')=='03') { ?> selected="selected"<?php } ?>>March</option>
              <option value="04" <?php if($this->input->get('month')=='04') { ?> selected="selected"<?php } ?>>April</option>
              <option value="05" <?php if($this->input->get('month')=='05') { ?> selected="selected"<?php } ?>>May</option>
              <option value="06" <?php if($this->input->get('month')=='06') { ?> selected="selected"<?php } ?>>June</option>
              <option value="07" <?php if($this->input->get('month')=='07') { ?> selected="selected"<?php } ?>>July</option>
              <option value="08" <?php if($this->input->get('month')=='08') { ?> selected="selected"<?php } ?>>August</option>
              <option value="09" <?php if($this->input->get('month')=='09') { ?> selected="selected"<?php } ?>>September</option>
              <option value="10" <?php if($this->input->get('month')=='10') { ?> selected="selected"<?php } ?>>October</option>
              <option value="11" <?php if($this->input->get('month')=='11') { ?> selected="selected"<?php } ?>>November</option>
              <option value="12" <?php if($this->input->get('month')=='12') { ?> selected="selected"<?php } ?>>December</option>
            </select>
                  </div>

                  <div class="padding-dash col-lg-2 col-xs-2 col-sm-2 datefromblock">
                    <input type="date" name="datfrom" id="datfrom" class="dash-input " required disabled="disabled" value="<?php echo $this->input->get('datfrom') ?>" />
                  </div>
                  <div class="padding-dash col-lg-2 col-xs-2 col-sm-2 datetoblock">
                    <input type="date" name="datto" id="datto" class="dash-input " required disabled="disabled" value="<?php echo $this->input->get('datto') ?>" />
                  </div>

                  <div class="padding-dash col-lg-2 col-xs-1">
                  <div class="dash-btn">
                    <button type="submit" name="butSub" id="butSub"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
                  </div>
              </div>
              </form>
          </div>
           </div>
         </div>
          <div class="container pie-chart-bg">
             <div class="dash-container pie-align">
               <div class="row">
                 <div class="piechart-col col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="piechart">
                    <canvas id="chart-area"></canvas>
                      <?php /*?><img src="IMG/toppng.com-80-pie-chart-orangeblue-1112x713.png"><?php */?>
                    </div>
                 </div>
                 <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="piechart">
                  <canvas id="chart-area2"></canvas>
                    <?php /*?><img src="IMG/toppng.com-80-pie-chart-orangeblue-1112x713.png"><?php */?>
                  </div>   
                </div>
               </div>

               <div class="graph-container">
                 <div class="row">
                  <div class="piechart-col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="line-chart">
                    <canvas id="canvas"></canvas>
                      <?php /*?><img src="IMG/line-chart.png"><?php */?>
                    </div>
                   </div>
                 </div>
               </div>
             </div>
          </div>
       </section>
       
  <script src="<?php echo base_url('assets/admin/'); ?>bower_components/Chart/dist/Chart.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>bower_components/Chart/samples/utils.js"></script>

<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php echo $genders[0]->femalecount ?>,
						<?php echo $genders[0]->malecount ?>,
					],
					backgroundColor: [
						//window.chartColors.red,
						//window.chartColors.blue,
						'#dc853e',
						'#93a9d0',
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Female',
					'Male'
				]
			},
			options: {
				responsive: true
			}
		};


		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
    
    <script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config2 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php foreach($ages as $item) { ?>
						<?php echo $item->age_count ?>,
						<?php } ?>
					],
					backgroundColor: [
						//window.chartColors.red,
						//window.chartColors.orange,
						//window.chartColors.yellow,
						//window.chartColors.green,
						//window.chartColors.blue,
						//window.chartColors.purple,
						//window.chartColors.grey,
						'#dc853e',
						'#93a9d0',
						'#4573a7',
						'#b04147',
						'#829d40',
						'#775e86',
						'#276d86',
					],
					label: 'Dataset 1'
				}],
				labels: [
					<?php foreach($ages as $item) { ?>
					'Age(<?php echo $item->age_group ?>)',
					<?php } ?>
				]
			},
			options: {
				responsive: true
			}
		};


		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
    
    <script>
		var barChartData = {
		<?php if($this->input->get('ser')== 'year') {?>
		<?php if(count($results)>0) { ?>
		labels: [
		<?php foreach($results as $item) { ?>
		'<?php echo $item->created_at ?>', 
		<?php } ?>
		],
		<?php } else { ?>
		labels: [
		'Total',
		],
		<?php }  ?>
		<?php } else if($this->input->get('ser')== 'month' ) {?>
		<?php if(count($results)>0) { ?>
		labels: [
		<?php foreach($results as $item) { ?>
		'<?php echo $item->created_at ?>', 
		<?php } ?>
		],
		<?php } else { ?>
		labels: [
		'Total',
		],
		<?php }  ?>
		
		<?php } else if($this->input->get('ser')== 'custom' ) {?>
		<?php if(count($results)>0) { ?>
		labels: [
		<?php foreach($results as $item) { ?>
		'<?php echo $item->created_at ?>', 
		<?php } ?>
		],
		<?php } else { ?>
		labels: [
		'Total',
		],
		<?php }  ?>
		
		<?php } else if($this->input->get('ser')== '60' ) {?>
		<?php if(count($results)>0) { ?>
		labels: [
		<?php foreach($results as $item) { ?>
		'<?php echo $item->created_at ?>', 
		<?php } ?>
		],
		<?php } else { ?>
		labels: [
		'Total',
		],
		<?php }  ?>
		
		<?php } else if($this->input->get('ser')== '30' ) {?>
		<?php if(count($results)>0) { ?>
		labels: [
		<?php foreach($results as $item) { ?>
		'<?php echo $item->created_at ?>', 
		<?php } ?>
		],
		<?php } else { ?>
		labels: [
		'Total',
		],
		<?php }  ?>
		
		<?php } else if($this->input->get('ser')== '90' ) {?>
		<?php if(count($results)>0) { ?>
		labels: [
		<?php foreach($results as $item) { ?>
		'<?php echo $item->created_at ?>', 
		<?php } ?>
		],
		<?php } else { ?>
		labels: [
		'Total',
		],
		<?php }  ?>
		
		<?php }  ?>
			datasets: [{
				label: 'Booked',
				backgroundColor: '#276d86',
				data: [
				<?php if($this->input->get('ser')== 'year') {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== 'month' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== 'custom' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '60' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '30' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '90' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else {  ?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php }  ?>
					
				]
			}, {
				label: 'Lead',
				backgroundColor: '#dc853e',
				data: [
					<?php if($this->input->get('ser')== 'year') {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->bookedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== 'month' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== 'custom' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '60' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '30' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '90' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php } else {  ?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->flaggedcount ?>,
					<?php } ?>
					<?php }  ?>
					
				]
			}, {
				label: 'Storefront View',
				backgroundColor: '#b04147',
				data: [
					
					<?php if($this->input->get('ser')== 'year') {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== 'month' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== 'custom' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>

					<?php } else if($this->input->get('ser')== '60' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '30' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>
					<?php } else if($this->input->get('ser')== '90' ) {?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>
					<?php } else {  ?>
					<?php foreach($results as $item) { ?>
					<?php echo $item->viewcount ?>,
					<?php } ?>
					<?php } ?>
					
					
				]
			}]

		};
		window.onload = function() {
			
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					title: {
						display: true,
						text: 'Stacked Chart For Suppliers'
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
			
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		
			var ctx2 = document.getElementById('chart-area2').getContext('2d');
			window.myPie = new Chart(ctx2, config2);
			
			$("#ser").trigger("change");
			
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
			window.myBar.update();
		});
		
		function manage(val)
		{
		//alert(val);
		if(val=='year')
		{
		$('#year').prop('disabled',false);
		$('#month').prop('disabled',true);
		$('#datfrom').prop('disabled',true);
		$('#datto').prop('disabled',true);
		}
		else if(val=='month')
		{
		$('#year').prop('disabled',false);
		$('#month').prop('disabled',false);
		$('#datfrom').prop('disabled',true);
		$('#datto').prop('disabled',true);
		}
		else if(val=='custom')
		{
		$('#year').prop('disabled',true);
		$('#month').prop('disabled',true);
		$('#datfrom').prop('disabled',false);
		$('#datto').prop('disabled',false);
		}
		else
		{
		$('#year').prop('disabled',true);
		$('#month').prop('disabled',true);
		$('#datfrom').prop('disabled',true);
		$('#datto').prop('disabled',true);
		}
		}
	</script>

       
        
       