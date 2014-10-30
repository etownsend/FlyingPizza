FlyingPizza
===========

A toy website written mostly in PHP for a fictional pizza delivery company.

What it is
----------
The Flying Pizza Company is a little project I did in order to get more familiar with php.
Inspired by the Tacocopter and Burrito Bomber projects, this represents the web presence of
a pizza delivery service that airdrops piping hot, oven fresh pizza right into your back yard
before a normal delivery guy could get out of the parking lot.

How to use it
-------------
First you must create an account. There are two types of user accounts- customers and employees.
Currently, all new accounts are created as customer accounts. To create an employee account, a
customer account is upgraded by changing a field in the database. Currently there are already
two accounts available for testing purposes- 'guestCustomer' and 'guestEmployee' (very imaginative,
I know) with the passwords for both also being 'guest'.

Once logged into an account, the user is shown a series of options based on their role. For customers,
they are able to view the menu, change their delivery locations, and place orders. Employees are
shown options that enable them to process orders and send them out for delivery.

How it works
------------
The backend is written in php which queries a mysql database. It supports multiple user logins
as well as implements several good security practices like proper handling of user
passwords using PBKDF2, user input sanitization, and SQL prepared statements. This provides extra
insurance against database injection and cross site scripting attacks, as well as helps keep
users passwords safe in case the server is ever compromised.

On the frontend, depending on the user, php determines which content to show them. The webpages
themselves are made with Bootstrap for easy styling with some javascript to handle ajax requests.

Since ssl certificates cost money if they are to be valid for more than a couple of months, and 
self signed certs often produce security warnings in browsers, currently the project does not use
one. This does mean that all information is passed in plaintext which leaves the user
vulnerable to password sniffing and session hijacking.

How to use it
-------------
If you're going to use this as a template for your own website, you're going to need some hardware.
I run this on a Raspberry Pi Model B (The one with the 512 MB of RAM) with the classic LAMP stack.
LAMP:Linux,Apache,MySQL,PHP. If you're lazy like me, you'll also want to install phpMyAdmin.
Once you've got all that... 

1.  Clone this into your server's document root (ex. `/var/www`)
2.  Create the database by running createFlyingPizza.sql: (ex: `mysql -p < createFlyingPizza.sql`)
3.  Set up a name and password for flying pizza to use when connecting to the database
4.  Create a new file in `FlyingPizza/classes` called conn.php with the following format:
	```
	<?php
	return array(
		// Maybe IP address, but probably just localhost
		'db_host' => 'localhost',
		// The name of the database
		'db_name' => 'flyingPizza',
		// The username and password you created in step 3
		'db_user' => 'username',
		'db_pass' => 'password'
	);
	?>
	```
	The code that uses it is on Line 9 of `FlyingPizza/classes/db.class.php`
	It has to be done this way to keep the supposedly secret connection information out of 
	a public repo like GitHub. Otherwise, bad form.
	
	![BAD FORM!!!](https://cloud.githubusercontent.com/assets/6364532/4838898/85be0cf2-5ff4-11e4-852e-b923daa28e21.jpg)
5.  That should be about it...



Where to go from here
---------------------
The project is very much at a demonstration stage. Most of the important functionality exists,
but needs polishing. Here are some things that would need some work if this were to be turned
into an actual product.
- SSL Certificate
- Add synchronizer tokens to all requests to help mitigate cross site requst forgery
- Adding database transactions for better
- Addition of a password reset system
- More thorough error checking
- More verbose error messages
- Stronger user input validation
- Google maps integration (For management of delivery locations)
- Some sort of payment system
- More compelling UI on the customer side - For example, to order a cheese pizza, the user
	literally has to type 'cheese piza'. This is bad, and I should feel bad.
- Better UI on the employee side - For example, currently, in order to register an order as
	shipped, the employee has to type in the IDs of both the order and the aircraft it is 
	going out on. This basic display could be redone in a number of different ways, but 
	would depend largely on the workflow of the kitchen staff who would be using it.
- Rolling 'customer' and 'employee' user types into a more granular permissions system
- Function level permissions checking
- Adding manager and admin features and permissions
