<?php
//employee.php

require_once 'includes/global.inc.php';
require_once 'includes/employeesOnly.inc.php';
?>
<script src="js/formCommunication.js"></script>

<center><h3>Employee Portal</h3></center>

<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading">View All Unsent Orders</div>
		<div class="panel-body">
			<form id="viewUnsent" class="form-horizontal" role="form" action="operations/empUnsent.php">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="Submit" onclick="processForm('viewUnsent')">
							<input type="reset" class="btn btn-default" value="Reset" onclick="resetForm('viewUnsent')">
						</div>
					</div>
				</div>
			</form>
			<div id="viewUnsent-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">View All Unmade Items</div>
		<div class="panel-body">
			<form id="viewUnmade" class="form-horizontal" role="form" action="operations/empUnmade.php">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="Submit" onclick="processForm('viewUnmade')">
							<input type="reset" class="btn btn-default" value="Reset" onclick="resetForm('viewUnmade')">
						</div>
					</div>
				</div>
			</form>
			<div id="viewUnmade-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Produce Item</div>
		<div class="panel-body">
			<form id="produceItem" class="form-horizontal" role="form" action="operations/empProduce.php">
				<div class="form-group">
					<label for="produceTicketID" class="col-sm-2 control-label"><h4>TicketID</h4></label>
					<div class="col-sm-10">
						<input id="produceTicketID" class="form-control" type="text" name="ticketID">
					</div>
				</div>
				<div class="form-group">
					<label for="produceItemID" class="col-sm-2 control-label"><h4>ItemID</h4></label>
					<div class="col-sm-10">
						<input id="produceItemID" class="form-control" type="text" name="itemID">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="Submit" onclick="processForm('produceItem')">
							<input type="reset" class="btn btn-default" value="Reset" onclick="resetForm('produceItem')">
						</div>
					</div>
				</div>
			</form>
			<div id="produceItem-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Send Order For Delivery</div>
		<div class="panel-body">
			<form id="sendOrder" class="form-horizontal" role="form" action="operations/empSend.php">
				<div class="form-group">
					<label for="sendTicketID" class="col-sm-2 control-label"><h4>TicketID</h4></label>
					<div class="col-sm-10">
						<input id="sendTicketID" class="form-control" type="text" name="ticketID">
					</div>
				</div>
				<div class="form-group">
					<label for="sendAircraftID" class="col-sm-2 control-label"><h4>AircraftID</h4></label>
					<div class="col-sm-10">
						<input id="sendAircraftID" class="form-control" type="text" name="aircraftID">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="Submit" onclick="processForm('sendOrder')">
							<input type="reset" class="btn btn-default" value="Reset" onclick="resetForm('sendOrder')">
						</div>
					</div>
				</div>
			</form>
			<div id="sendOrder-response"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">View Maintence Reports</div>
		<div class="panel-body">
			<form id="viewMaint" class="form-horizontal" role="form" action="operations/empViewMaint.php">
				<div class="form-group">
					<label for="viewMaintAircraftID" class="col-sm-2 control-label"><h4>AircraftID</h4></label>
					<div class="col-sm-10">
						<input id="viewMaintAircraftID" class="form-control" type="text" name="aircraftID">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="Submit" onclick="processForm('viewMaint')">
							<input type="reset" class="btn btn-default" value="Reset" onclick="resetForm('viewMaint')">
						</div>
					</div>
				</div>
			</form>
			<div id="viewMaint-response"></div>
		</div>
	</div>


	<div class="panel panel-default">
		<div class="panel-heading">File Maintenance Report</div>
		<div class="panel-body">
			<form id="fileMaint" class="form-horizontal" role="form" action="operations/empFileMaint.php">
				<div class="form-group">
					<label for="fileMaintDesc" class="col-sm-2 control-label"><h4>Description</h4></label>
					<div class="col-sm-10">
						<input id="fileMaintDesc" class="form-control" type="text" name="description">
					</div>
				</div>
				<div class="form-group">
					<label for="fileMaintCost" class="col-sm-2 control-label"><h4>Cost</h4></label>
					<div class="col-sm-10">
						<input id="fileMaintCost" class="form-control" type="text" name="cost">
					</div>
				</div>
				<div class="form-group">
					<label for="fileMaintDate" class="col-sm-2 control-label"><h4>Date</h4></label>
					<div class="col-sm-10">
						<input id="fileMaintDate" class="form-control" type="text" name="date">
					</div>
				</div>
				<div class="form-group">
					<label for="fileMaintAircraftID" class="col-sm-2 control-label"><h4>AircraftID</h4></label>
					<div class="col-sm-10">
						<input id="fileMaintAircraftID" class="form-control" type="text" name="aircraftID">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="btn-group">
							<input type="button" class="btn btn-default" value="Submit" onclick="processForm('fileMaint')">
							<input type="reset" class="btn btn-default" value="Reset" onclick="resetForm('fileMaint')">
						</div>
					</div>
				</div>
			</form>
			<div id="fileMaint-response"></div>
		</div>
	</div>

</div>