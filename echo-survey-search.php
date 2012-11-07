<? 
	include ('../common/header.php'); 
	require_once ('../path to connection file'); // Connect to the db.
  echo "<h3>Search ECHO Survey Database</h3>" . PHP_EOL;
  echo "<div class='echo-survey' style='overflow:hidden;'>" . PHP_EOL; 
  if(!isset($_GET['submit'])) {//if form is not submitted, show the form
  echo "<p>You may search by Question, Answer, Month or Year</p><br />" . PHP_EOL; 
?>

<form action="echo-survey-search.php" method="get">
  <div style="width:100%;">
    <div style="float:left; width:600px; overflow:hidden; height:25px; margin-bottom:10px;"><div style="float:left; margin:2px 5px 0 5px; color:#afafaf;">Answer: </div><input type="text" name="answer" /></div>
    <div style="float:left; width:600px;">
      <select name="question" style="margin:0 5px 10px 5px;">
       <option value="">Select Question</option>
       <option value="What kind of data on IMGs in U.S. GME would you like to see?">What kind of data on IMGs in U.S. GME would you like to see?</option>
       <option value="What kind of information about the residency interview process would be of interest to you?">What kind of information about the residency interview process would be of interest to you?</option>
       <option value="What questions do you have about U.S. immigration and visa requirements?">What questions do you have about U.S. immigration and visa requirements?</option>
       <option value="What kind of information about publishing research would you like to know more about?">What kind of information about publishing research would you like to know more about?</option>
      </select>
    </div>
    <div style="float:left; width:600px; margin-bottom:10px;">
      <select name="month" style="margin:0 5px 5px 5px;">
        <option value="">Select Month</option>
        <option value="June">June 2012</option>
        <option value="July">July 2012</option>
        <option value="August">August 2012</option>
        <option value="September">September 2012</option>
      </select>
    </div>
    <div style="float:left; width:100%; margin:5px 5px 5px 0;">
      <input type="submit" name="submit" value="Search">
      <input type="hidden" name="page" value="0" />
    </div>
  </div>
</form>
<div class="clearer"></div>
<?php
} elseif(isset($_GET['submit'])) {

$page=$_GET['page']; 
$question = mysql_real_escape_string($_GET['question']); 
$answer = mysql_real_escape_string($_GET['answer']);
$month = mysql_real_escape_string($_GET['month']);
$year = mysql_real_escape_string($_GET['year']);

if (empty($question)&&empty($answer)&&!empty($month)) { // if only month
		echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br /><p>You searched for <b>" .  $month . "</b>.</p>" . PHP_EOL;
    switch ($month) {
    case "June":
        include ("201206-june-results.php");
        break;
    case "July":
        include ("201207-july-results.php");
        break;
    case "August":
        include ("201208-august-results.php");
        break;
    case "September":
        include ("201209-september-results.php");
        break;
    }
} elseif (!empty($question)&&empty($answer)&&empty($month)) { // if only question
		echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br /><p>You searched for <b>" .  $question . " and " . $year . "</b>.</p>" . PHP_EOL;
    switch ($question) {
    //june's question
    case "What kind of data on IMGs in U.S. GME would you like to see?":
        include ("201206-june-results.php");
        break;
    //july's question
    case "What kind of information about the residency interview process would be of interest to you?":
        include ("201207-july-results.php");
        break;
    // august's question
    case "What questions do you have about U.S. immigration and visa requirements?":
        include ("201208-august-results.php");
        break;
    //september's question
    case "What kind of information about publishing research would you like to know more about?":
        include ("201209-september-results.php");
        break;
    }
} elseif (empty($question)&&!empty($answer)&&empty($month)) { // if only answer
		echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br /><p>You searched for <b>" .  $answer . "</b>.</p>" . PHP_EOL;
		echo "<ul>";
  	$answerquery = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer LIKE '$answer'");
  	$answernum = mysql_num_rows($answerquery);
    $answerprint = mysql_fetch_assoc($answerquery);  
    echo "<li>" . $answerprint[answer] . ":&nbsp;<b>" . $answernum . "</b></li>". PHP_EOL;
    echo "<li>Question is: <b>" . $answerprint[question] . "</b></li>";
  	echo "<li>Month for question is: <b>" . $answerprint[month] . "</b></li>";
  	echo "<li>Year for question is: <b>" . $answerprint[year] . "</b></li>";
  	echo "</ul><br /><br />";
} elseif (!empty($question)&&empty($answer)&&!empty($month)) {// if question and month
		echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br /><p>You searched for <b>" . $question . "</b> and <b>" . $month . "</b>.</p>" . PHP_EOL;
  	$questionquery = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE question LIKE'$question'");
  	$monthquery = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE month LIKE'$month'");
  	$monthrow = mysql_fetch_assoc($monthquery);
  	$questionrow = mysql_fetch_assoc($questionquery);
  	if ($monthrow[month]==$questionrow[month]) {
      switch ($questionrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
  	} else {
  	 switch ($questionrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
      switch ($monthrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
  	}
} elseif (!empty($question)&&!empty($answer)&&!empty($month)) {// if question and month and answer
		echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br /><p>You searched for <b>" . $answer . "</b> and <b>" . $question . "</b> and <b>" . $month . "</b>.</p>" . PHP_EOL;
  	$questionquery = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE question LIKE'$question'");
  	$monthquery = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE month LIKE'$month'");
  	$answerquery = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer LIKE'$answer'");
  	$monthrow = mysql_fetch_assoc($monthquery);
  	$questionrow = mysql_fetch_assoc($questionquery);
  	$answerrow = mysql_fetch_assoc($answerquery);	
  	if ($answerrow[month]===$monthrow[month]&&$answerrow[month]===$questionrow[month]&&$monthrow[month]===$questionrow[month]) {
      switch ($questionrow[month]) {// show one month because they all are equal
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
    } elseif ($answerrow[month]===$monthrow[month]&&$answerrow[month]===$questionrow[month]&&!$monthrow[month]===$questionrow[month]){
  	 switch ($answerrow[month]) {// do not show monthrow and questionrow just one or the other plus answerrow
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
      switch ($questionrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
  	} elseif ($monthrow[month]===$questionrow[month]&&$monthrow[month]===$answerrow[month]&&!$answerrow[month]===$questionrow[month]){
  	 switch ($answerrow[month]) {// do not show answerrow and questionrow just one or the other plus monthrow
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
      switch ($monthrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
  	} else {// question, answer and month are all unique so show all
  	switch ($answerrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
  	 switch ($questionrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
      switch ($monthrow[month]) {
      case "June":
        include ("201206-june-results.php");
        break;
      case "July":
        include ("201207-july-results.php");
        break;
      case "August":
        include ("201208-august-results.php");
        break;
      case "September":
        include ("201209-september-results.php");
        break;
      }
  	}
} else { 
		echo '<p>Sorry, no matches could be found in the database.</p><p>' . mysql_error() . '</p><br />' . PHP_EOL;
    echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br />" . PHP_EOL; 
	}
}
echo "<a href='index.php'>Take a survey</a><br /><br />" . PHP_EOL;
echo "</div><!-- end echo-survey -->" . PHP_EOL;
include ('../common/footer.php');
?>