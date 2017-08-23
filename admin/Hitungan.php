	<div class='panel panel-default'>
		<div class='panel-heading'>
			
		</div>
		<div class='panel-body'>
		<div class="col-md-12">
			<p><b>Meal Allowence</b></p>
		</div>
		<!--Makan Pagi -->
		<div class="col-md-2">
			<p>Uang Makan Pagi</p>
		</div>
		<div class="col-sm-1">
			<p><?php echo $pagi?></p>
		</div>
		<div class="col-sm-1">
			<p>x</p>
		</div>		
		<div class="col-md-1">
			<p>75.000</p>
		</div>
		<div class="col-md-1">
			<p>=</p>
		</div>	
		<div class="col-sm-1">
			<p class="pull-left">Rp.</p>
		</div>
		<div class="col-sm-1" align="right">
			<p class="pull-right"><?php echo number_format($pagi*75000,2,",",".") ?></p>
		</div>
		<div class="col-md-1" align="right">
			<p></p>
		</div>
			
		</div>
		</div>