<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		$j = "hi";
		$d = "hi";
		$c = "hi";
		$name = $_POST["name"];
		$Card = $_POST["Card"];
		$CC = $_POST["CC"];
		if (!isset($_POST["name"]) || $_POST["name"] == "") {
			$j = null;
		}elseif (!preg_match_all("/^[a-zA-Z\-\s]*$/", $name)) {
			$d = null;
		}
		if (!isset($_POST["ID"]) || $_POST["ID"] == "") {
			$j = null;
		}
		if (!isset($_POST['check'])) {
			$j = null;
		}
		if (!isset($_POST["Card"]) || $_POST["Card"] == "") {
			$j = null;
		}elseif (!preg_match_all("/^[0-9]{16}$/", $Card)) {
			$c = null;
		}
		if (!isset($_POST["CC"])) {
			$j = null;
		}
		if ($CC == "Visa"){
			if (!preg_match("/^[4]/", $Card)){
				$c = null;
			}
		}
		if ($CC == "MasterCard"){
			if (!preg_match("/^[5]/", $Card)){
				$c = null;
			}
		}
		if (empty($j)){
		?>
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
		<!-- Ex 4 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
	} elseif(empty($d)) {
		?>
		<h1>Sorry</h1>
		<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>
		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif(empty($c)){
		?>
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>
		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		-->

		<?php
		# if all the validation and check are passed
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->

		<ul>
			<li>Name: <?php echo $_POST["name"]; ?> </li>
			<li>ID: <?php echo $_POST["ID"]; ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?php processCheckbox($names) ?> </li>
			<li>Grade: <?php echo $_POST["Grade"]; ?></li>
			<li>Credit  <?php echo $_POST["Card"]; ?> (<?php echo $_POST["CC"]; ?>)</li>
		</ul>

		<!-- Ex 3 :
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = file("loosers.txt");
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */


		?>
		<pre>
Here are all the loosers who have submitted here:
<?php foreach ($filename as $list ){ ?><p><?php echo $list; ?></p><?php } ?>
		</pre>
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->


		<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				for ($i=0; $i < count($_POST['check']) ; $i++) {
					$names = $_POST['check'];
					echo $names[$i];
					echo " ";
				}


			}
		?>

	</body>
</html>
