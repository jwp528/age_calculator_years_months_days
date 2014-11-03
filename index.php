<?php
//calculate age in years, months, and days
//input:mm/dd/yyyy

/**
 *STEP BY STEP INSTRUCTIONS
 *
 *STEP 1: string together birthday
 *STEP 2: convert string to dateTime
 *STEP 3: convert current timestamp dateTime
 *STEP 4: calculate difference between birthday and current day.
 *STEP 5: assign years months and days to the
 */
date_default_timezone_set("America/Toronto");

$hasResult = false;

if(isset($_POST['submit'])){

	//set age variables
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
  $result = "";
	//string together age
	$bdayString = "$month/$day/$year";
	$bdayTime = new DateTime($bdayString);
	$stringNow = date("Y/m/d", time());
	$now = new DateTime($stringNow);

	$age = $bdayTime->diff($now);

	$years = $age->y;
	$months = $age->m;
	$days = $age->d;
	$leapYearAge;
	$isLeapYear = false;
	if($year % 4 == 0 && $month == "02" && $day == "29"){
		$leapYearAge = $age->y / 4;
		$isLeapYear = true;
	};

	if($bdayTime > $now){
		$hasResult = true;
		$result = "You're either from the future, or messing with the program... either way:<br/>";
		$result .= "You will be born $years Years, $months Months, and $days Days from now.";
	}
	else{
		$hasResult = true;
		$result = "You are $years Years, $months Months, and $days Days Old.";
		if($days == 0 && $months == 0 && $years > 0){
			$result .= "<br/>Happy Birthday!";
		}//end if
	}//end else
}
?>
<html>
	<head>
		<title>Age Calculator</title>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/sage.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
	</head>
	<body>
		<div class="wrap">
			<h1>Please input your date of birth, and this program will calculate how many years, months, and days old you are:</h1>
			<form action="index.php" class="form" method="post">
				<label for="month" class="label">Month: </label>
				<select name="month" id="DOM" onchange="checkDay($(this).val());">
					<option value="01" <?php date('m', time()) == 01? print "selected" : ""; ?>>Jan</option>
					<option value="02" <?php date('m', time()) == 02? print "selected" : ""; ?>>Feb</option>
					<option value="03" <?php date('m', time()) == 03? print "selected" : ""; ?>>Mar</option>
					<option value="04" <?php date('m', time()) == 04? print "selected" : ""; ?>>Apr</option>
					<option value="05" <?php date('m', time()) == 05? print "selected" : ""; ?>>May</option>
					<option value="06" <?php date('m', time()) == 06? print "selected" : ""; ?>>Jun</option>
					<option value="07" <?php date('m', time()) == 07? print "selected" : ""; ?>>Jul</option>
					<option value="08" <?php date('m', time()) == 08? print "selected" : ""; ?>>Aug</option>
					<option value="09" <?php date('m', time()) == 09? print "selected" : ""; ?>>Sep</option>
					<option value="10" <?php date('m', time()) == 10? print "selected" : ""; ?>>Oct</option>
					<option value="11" <?php date('m', time()) == 11? print "selected" : ""; ?>>Nov</option>
					<option value="12" <?php date('m', time()) == 12? print "selected" : ""; ?>>Dec</option>
				</select>
				<label for="day" class="label">Day: </label>
				<input type="text" name="day" id="day" maxlength="2" class="numeric" value="<?php print date('d', time()); ?>" onChange="validateDayOfMonth(this);"/>
				<label for="year" class="label">Year: </label>
				<input type="text" name="year" id="year" maxlength="4" class="numeric" value="<?php print date('Y', time()); ?>" onChange="checkLeapYear();" />
				<input type="submit" class="submit" name="submit" value="Calculate" />
			</form>
		</div>
		<?php if($hasResult): ?>
			<div class="result">
				<h6>Being born on <?php print "$month/$day/$year"; ?></h6>
				<h4><?php print $result; ?></h4>
				<?php if($isLeapYear): ?>
					<h4>And because you were born on the leap day february 29th, your leap age is <?php print $leapYearAge; ?> Years old.</h4>
				<?php endif; ?>
			</div>
			<?php $hasResult = false; ?>
		<?php endif; ?>
	</body>
</html>