<?php
//customer.php

require_once 'includes/global.inc.php';
?>

<center><h2>Welcome to The Flying Pizza Company</h2></center>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2>What it is</h2>
			<p>
				The Flying Pizza Company is a little project I did in order to get more familiar with php.
				Inspired by the Tacocopter and Burrito Bomber projects, this represents the web presence of
				a pizza delivery service that airdrops piping hot, oven fresh pizza right into your back yard
				before a normal delivery guy could get out of the parking lot.
			</p>
			
			<h2> How to use it</h2>
			<p>
				First you must create an account. There are two types of user accounts- customers and employees.
				Currently, all new accounts are created as customer accounts. To create an employee account, a
				customer account is upgraded by changing a field in the database. Currently there are already
				two accounts available for testing purposes- 'guestCustomer' and 'guestEmployee' (very imaginative,
				I know) with the passwords for both also being 'guest'.
			</p>
			<p>
				Once logged into an account, the user is shown a series of options based on their role. For customers,
				they are able to view the menu, change their delivery locations, and place orders. Employees are
				shown options that enable them to process orders and send them out for delivery.
			</p>

			<h2>How it works</h2>
			<p>
				The backend is written in php which queries a mysql database. It supports multiple user logins
				as well as implements several good security practices like proper handling of user
				passwords using PBKDF2, user input sanitization, and SQL prepared statements. This provides extra
				insurance against database injection and cross site scripting attacks, as well as helps keep
				users passwords safe in case the server is ever compromised.
			</p>
			<p>
				On the frontend, depending on the user, php determines which content to show them. The webpages
				themselves are made with Bootstrap for easy styling with some javascript to handle ajax requests.
			</p>
			<p>
				Since ssl certificates cost money if they are to be valid for more than a couple of months, and 
				self signed certs often produce security warnings in browsers, currently the project does not use
				one. This does mean that all information is passed in plaintext which leaves the user
				vulnerable to password sniffing and session hijacking.
			</p>

			<h2>Where to go from here</h2>
			<p>
				The project is very much at a demonstration stage. Most of the important functionality exists,
				but needs polishing. Here are some things that would need some work if this were to be turned
				into an actual product.
			</p>
			<ul>
				<li>SSL Certificate</li>
				<li>Add synchronizer tokens to all requests to help mitigate cross site requst forgery</li>
				<li>Adding database transactions for better</li>
				<li>Addition of a password reset system</li>
				<li>More thorough error checking</li>
				<li>More verbose error messages</li>
				<li>Stronger user input validation</li>
				<li>Google maps integration (For management of delivery locations)</li>
				<li>Some sort of payment system</li>
				<li>More compelling UI on the customer side - For example, to order a cheese pizza, the user
					literally has to type 'cheese piza'. This is bad, and I should feel bad.</li>
				<li>Better UI on the employee side - For example, currently, in order to register an order as
					shipped, the employee has to type in the IDs of both the order and the aircraft it is 
					going out on. This basic display could be redone in a number of different ways, but 
					would depend largely on the workflow of the kitchen staff who would be using it.</li>
				<li>Rolling 'customer' and 'employee' user types into a more granular permissions system</li>
				<li>Function level permissions checking</li>
				<li>Adding manager and admin features and permissions</li>
			</ul>
		</div>
	</div>
</div>