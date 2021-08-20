	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-10">
	        <h2>Remaining Storage</h2>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item">
	                <a href="index.html">Home</a>
	            </li>
	            <li class="breadcrumb-item">
	                <a>Storage</a>
	            </li>
	            <li class="breadcrumb-item active">
	                <strong>Dashboard</strong>
	            </li>
	        </ol>
	    </div>
	    <div class="col-lg-2">

	    </div>
	</div>
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">

	    	<?php foreach ($stotagetypes as $item) { ?>
	        <div class="col-lg-6">
	            <div class="ibox ">
	                <div class="ibox-title">
	                    <h5><?= $item->type; ?></h5>
	                </div>
	                <div class="ibox-content">
	                    <div>
	                        <canvas id="<?= $item->id; ?>" height="140"></canvas>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <?php $dataArr = []; ?>

	        <?php foreach ($stotagevolume as $data) { 
	        	if($item->id == $data->type_id){
	        		if($data->size == 'Small'){
	        			$dataArr['small'] = $data->vol;
	        			$dataArr['smallsize'] = $data->allocated;
	        		}
	        		if($data->size == 'Medium'){
	        			$dataArr['Medium'] = $data->vol;
	        			$dataArr['Mediumsize'] = $data->allocated;
	        		}
	        		if($data->size == 'Large'){
	        			$dataArr['Large'] = $data->vol;
	        			$dataArr['Largesize'] = $data->allocated;
	        		}
	        		if($data->size == 'XL'){
	        			$dataArr['XL'] = $data->vol;
	        			$dataArr['XLsize'] = $data->allocated;
	        		}
	        		if($data->size == 'XXL'){
	        			$dataArr['XXL'] = $data->vol;
	        			$dataArr['XXLsize'] = $data->allocated;
	        		}	        			        			        			        		
	        	}
	        } ?>

			<script type="text/javascript">


			$(function () {

			    	var Smallremaining = "Small (" + "<?= isset($dataArr['small']) ? $dataArr['small'] - $dataArr['smallsize'] : 0 ?>" + ")";
			    	var Mediumremaining = "Small (" + "<?= isset($dataArr['Medium']) ? $dataArr['Medium'] - $dataArr['Mediumsize'] : 0 ?>" + ")";
			    	var Largeremaining = "Small (" + "<?= isset($dataArr['Large']) ? $dataArr['Large'] - $dataArr['Largesize'] : 0 ?>" + ")";
			    	var XLremaining = "Small (" + "<?= isset($dataArr['XL']) ? $dataArr['XL'] - $dataArr['XLsize'] : 0 ?>" + ")";
			    	var XXLremaining = "Small (" + "<?= isset($dataArr['XXL']) ? $dataArr['XXL'] - $dataArr['XXLsize'] : 0 ?>" + ")";


				    var barData = {				    	

				        labels: [Smallremaining, Mediumremaining, Largeremaining, XLremaining, XXLremaining],
				        datasets: [
				            {
				                label: "Total Storage",
				                backgroundColor: 'rgba(220, 220, 220, 0.5)',
				                pointBorderColor: "#fff",
				                data: ["<?= isset($dataArr['small']) ? $dataArr['small'] : 0 ?>", 
				                	  "<?= isset($dataArr['Medium']) ? $dataArr['Medium'] : 0 ?>", 
				                	  "<?= isset($dataArr['Large']) ? $dataArr['Large'] : 0 ?>", 
				                	  "<?= isset($dataArr['XL']) ? $dataArr['XL'] : 0 ?>", 
				                	  "<?= isset($dataArr['XXL']) ? $dataArr['XXL'] : 0 ?>"]
				            },
				            {
				                label: "Filled",
				                backgroundColor: 'rgba(26,179,148,0.5)',
				                borderColor: "rgba(26,179,148,0.7)",
				                pointBackgroundColor: "rgba(26,179,148,1)",
				                pointBorderColor: "#fff",
				                data:  ["<?= isset($dataArr['smallsize']) ? $dataArr['smallsize'] : 0 ?>", 
				                	  "<?= isset($dataArr['Mediumsize']) ? $dataArr['Mediumsize'] : 0 ?>", 
				                	  "<?= isset($dataArr['Largesize']) ? $dataArr['Largesize'] : 0 ?>", 
				                	  "<?= isset($dataArr['XLsize']) ? $dataArr['XLsize'] : 0 ?>", 
				                	  "<?= isset($dataArr['XXLsize']) ? $dataArr['XXLsize'] : 0 ?>"]
				            }
				        ]
				    };

				    var barOptions = {
				        responsive: true
				    };


				    var ctx2 = document.getElementById("<?= $item->id; ?>").getContext("2d");
				    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

			});

			</script>

	    	<?php } ?>

	    </div>
	</div>


	<script src="<?= base_url(); ?>assets/js/plugins/chartJs/Chart.min.js"></script>