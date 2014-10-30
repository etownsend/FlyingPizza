<?php
//customer.php

require_once 'includes/global.inc.php';
require_once 'includes/customersOnly.inc.php'
?>
<script src="js/formCommunication.js"></script>

<center><h3>Customer Portal</h3></center>
<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading">View Menu</div>
		<div class="panel-body">
			<form id="menu" class="form-horizontal" role="form" action="operations/custMenu.php">
				<div class="form-group">
					<label for="menuMin" class="col-sm-2 control-label"><h4>Lower Bound</h4></label>
					<div class="col-sm-10">
						<input id="menuMin" class="form-control" type="text" name="min" placeholder="optional">
					</div>
				</div>
				<div class="form-group">
					<label for="menuMax" class="col-sm-2 control-label"><h4>Upper Bound</h4></label>
					<div class="col-sm-10">
						<input id="menuMax" class="form-control" type="text" name="max" placeholder="optional">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<p class = "help-block">Leave Either Value Blank To Not Apply That Bound</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="submit" onclick="processForm('menu')">
							<input type="reset" class="btn btn-default" value="reset" onclick="resetForm('menu')">
						</div>
					</div>
				</div>
			</form>
			<div id="menu-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">View Your Deliverable Locations</div>
		<div class="panel-body">
		<form id="viewLocations" class="form-horizontal" role="form" action="operations/custLocView.php">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="submit" onclick="processForm('viewLocations')">
							<input type="reset" class="btn btn-default" value="reset" onclick="resetForm('viewLocations')">
						</div>
					</div>
				</div>
			</form>
			<div id="viewLocations-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Add To Your Deliverable Locations</div>
		<div class="panel-body">
			<form id="addLocation" class="form-horizontal" role="form" action="operations/custLocAdd.php">
				<div class="form-group">
					<label for="addLocAddress" class="col-sm-2 control-label"><h4>Street Address</h4></label>
					<div class="col-sm-10">
						<input id="addLocAdress" class="form-control" type="text" name="address" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="orderItem1" class="col-sm-2 control-label"><h4>GPS Coordinates</h4></label>
					<div class="col-sm-10">
						<input id="orderItem1" class="form-control" type="text" name="gps" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="orderItem2" class="col-sm-2 control-label"><h4>Nickname</h4></label>
					<div class="col-sm-10">
						<input id="orderItem2" class="form-control" type="text" name="nickname" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="submit" onclick="processForm('addLocation')">
							<input type="reset" class="btn btn-default" value="reset" onclick="resetForm('addLocation')">
						</div>
					</div>
				</div>
			</form>
			<div id="addLocation-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Place Your Order</div>
		<div class="panel-body">

			<form id="placeOrder" class="form-horizontal" role="form" action="operations/custPlaceOrder.php">
				<div class="form-group">
					<label for="orderLocation" class="col-sm-2 control-label"><h4>Location</h4></label>
					<div class="col-sm-10">
						<input id="orderLocation" class="form-control" type="text" name="location" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="orderItem1" class="col-sm-2 control-label"><h4>Item 1</h4></label>
					<div class="col-sm-10">
						<input id="orderItem1" class="form-control" type="text" name="item1" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="orderItem2" class="col-sm-2 control-label"><h4>Item 2</h4></label>
					<div class="col-sm-10">
						<input id="orderItem2" class="form-control" type="text" name="item1" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="orderItem3" class="col-sm-2 control-label"><h4>Item 3</h4></label>
					<div class="col-sm-10">
						<input id="orderItem3" class="form-control" type="text" name="item1" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="submit" onclick="processForm('placeOrder')">
							<input type="reset" class="btn btn-default" value="reset" onclick="resetForm('placeOrder')">
						</div>
					</div>
				</div>
			</form>
			<div id="placeOrder-response"></div>
		</div>
	</div>
	
</div>