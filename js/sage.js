//global stuffs
var monthDays = {
  January: "31",
		February: "28",
		March: "31",
		April: "30",
		May: "31",
		June: "30",
		July: "31",
		August: "31",
		September: "30",
		October: "31",
		November: "30",
		December: "31"
};

var isLeapYear = $("#year").val() % 4 == 0? true : false;

$(document).ready(function () {
  //called when key is pressed in textbox
	$(".numeric").keypress(function (e) {
  //if the letter is not digit then don't type anything
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
	}
	else{
		return true;
	}
 });

	console.log($("#DOM").val());
});

function checkDay(month) {
								switch(month){
											case "01": case "03": case "05": case "07": case "08": case "10": case "12":
																if ($("#day").val() > 31) {
																  document.getElementById("day").value = "31";
																}
																break;
								   case "04": case "06": case "09": case "11":
																if ($("day").val() > 30) {
																  document.getElementById("day").value = "30";
																}
																break;
								   case "02":
																if (isLeapYear) {
																  if ($("#day").val() > 29) {
																    document.getElementById("day").value = "29";
																  }
																}//end if
																else{
																  if($("#day").val() > 28) {
																    document.getElementById("day").value = "28";
																		}
																}
								}//end switch
}//end checkDay

function checkLeapYear(){
  isLeapYear = $("#year").val() % 4 == 0? true : false;
		console.log(isLeapYear);
		console.log($("#DOM").val());

		if (!isLeapYear && $("#DOM").val() == "02" && document.getElementById("day").value > "28") {
      document.getElementById("day").value = 28;
				}
}

function validateDayOfMonth(input){

		switch($("#DOM").val()){
		case "01":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 1){
				input.value = 1;
			}
			break;
		case "02":
			if (isLeapYear) {
				if (input.value > 29) {
					input.value = 29;
				}
			}
			else{
				if (input.value > 28) {
					input.value = 28;
				}
			}
			break;
		case "03":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 1){
				input.value = 1;
			}
				break;
		case "04":
			if(input.value > 30){
				input.value = 30;
			}
			else if (input.value < 1) {
				input.value = 1;
			}
				break;
		case "05":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 1){
				input.value = 1;
			}
				break;
		case "06":
			if(input.value > 30){
				input.value = 30;
			}
			else if (input.value < 1) {
				input.value = 1;
			}
			break;
		case "07":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 1){
				input.value = 1;
			}
			break;
		case "08":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 1){
				input.value = 1;
			}
			break;
		case "09":
			if(input.value > 30){
				input.value = 30;
			}
			else if (input.value < 1) {
				input.value = 1;
			}
			break;
		case "10":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 1){
				input.value = 1;
			}
			break;
		case "11":
			if(input.value > 30){
				input.value = 30;
			}
			else if (input.value < 1) {
				input.value = 1;
			}
			break;
		case "12":
			if (input.value > 31) {
				input.value = 31;
			}
			else if(input.value < 0){
				input.value = 1;
			}
			break;
	}//end switch
}//end validateDayOfMonth