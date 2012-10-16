<? 
	include ('../common/header.php'); 
	require_once ('../uhusiano/survey-uhusiano.php'); // Connect to the db.
  echo "<h3>Search ECHO Survey Database</h3>" . PHP_EOL;
  echo "<div class='echo-survey' style='overflow:hidden;'>" . PHP_EOL; 
  if(!isset($_GET['submit'])) {//if form is not submitted, show the form
  echo "<p>You may search by Question, Answer, Month or Year</p><br />" . PHP_EOL; 
?>

<form action="echo-survey-search.php" method="get">
  <div style="width:100%;">
    <div style="float:left; width:240px; overflow:hidden; height:25px;"><div style="float:left; margin:2px 5px 0 5px; color:#afafaf;">Answer: </div><input type="text" name="answer" /></div>
    <div style="float:left; width:510px;">
      <select name="question" style="margin:0 5px 5px 5px;">
       <option value="">Select Question</option>
       <option value="What questions do you have about U.S. immigration and visa requirements?">What questions do you have about U.S. immigration and visa requirements?</option>
       <option value="ASMT">ASMT</option>
       <option value="CBIT">CBIT</option>
      </select>
      <select name="month" style="margin:0 5px 5px 5px;">
        <option value="">Select Month</option>
        <option value="August">August</option>
        <option value="July">July</option>
        <option value="June">June</option>
      </select>
      <select name="year" style="margin:0 5px 5px 5px;">
        <option value="">Select Year</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
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

if (!empty($question)&&!empty($answer)&&!empty($month)&&!empty($year)) { // if year & month & question & answer
		echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><p>You searched for <b>" . $answer . "</b>, <b>" . $question . "</b>, <b>" . $year . "</b> and <b>" .  $month . "</b></p>" . PHP_EOL;
		$color1 = "#474747"; 
    $color2 = "#2a2a2a"; 
		$countData = mysql_fetch_assoc(mysql_query("SELECT found_rows() AS total"));
		$totalRows = $countData['total'];
    //get june's question
    $june_count = 0;
		$junequestion = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE question='What kind of data on IMGs in U.S. GME would you like to see?' LIMIT 0,1");
    while ($row = mysql_fetch_array($junequestion)) {
    	$row_color = ($june_count % 2) ? $color1 : $color2;
    	$june_count++;
    	if ($june_count>0 && $june_count<2) {
    	  echo "<h5>" . $row[question] . "</h5>" . PHP_EOL;
    	}
  	}
  	$answerone = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='IMGs in U.S. GME, by country of medical school'") or die ("Could not fetch answer data");
    $answeronenum = mysql_num_rows($answerone);// returns total number of rows that matches the string in the WHERE clause
    $answeroneprint = mysql_fetch_assoc($answerone);//returns an array of strings
    // Retrieve number of rows of the second answer   
    $answertwo = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='IMGs in U.S. GME, by state and specialty'") or die ("Could not fetch answer data");
    $answertwonum = mysql_num_rows($answertwo);
    $answertwoprint = mysql_fetch_assoc($answertwo);
    // Retrieve number of rows of the third answer   
    $answerthree = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='IMGs in the 2012 Match'") or die ("Could not fetch answer data");
    $answerthreenum = mysql_num_rows($answerthree);
    $answerthreeprint = mysql_fetch_assoc($answerthree);
    // Retrieve number of rows of the fourth answer   
    $answerfour = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Profile of 2011 ECFMG Certificants'") or die ("Could not fetch answer data");
    $answerfournum = mysql_num_rows($answerfour);
    $answerfourprint = mysql_fetch_assoc($answerfour);
    // Retrieve number of rows of the fourth answer   
    $answerfive = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Aggregate USMLE performance data'") or die ("Could not fetch answer data");
    $answerfivenum = mysql_num_rows($answerfive);
    $answerfiveprint = mysql_fetch_assoc($answerfive);
    
    echo "<div style='width:600px; text-align:right;'>" . $answeroneprint['answer'] . ":&nbsp;" . $answeronenum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answertwoprint['answer'] . ":&nbsp;" . $answertwonum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answerthreeprint['answer'] . ":&nbsp;" . $answerthreenum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answerfourprint['answer'] . ":&nbsp;" . $answerfournum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answerfiveprint['answer'] . ":&nbsp;" . $answerfivenum . "</div>". PHP_EOL;
    echo "<div style='height:25px;'></div>";
  	//get july's question
  	$july_count = 0;
  	$julyquestion = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE question='What kind of information about the residency interview process would be of interest to you?' LIMIT 0,1");
  	while ($row = mysql_fetch_array($julyquestion)) {
    	$row_color = ($july_count % 2) ? $color1 : $color2;
    	$july_count++;
    	if ($july_count>0 && $july_count<2) {
    	  echo "<h5>" . $row[question] . "</h5>" . PHP_EOL;
    	}
  	}
    // Retrieve number of rows of the first answer   
    $answerone = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Frequently asked residency interview questions'") or die ("Could not fetch answer data");
    $answeronenum = mysql_num_rows($answerone);// returns total number of rows that matches the string in the WHERE clause
    $answeroneprint = mysql_fetch_assoc($answerone);//returns an array of strings
    // Retrieve number of rows of the second answer   
    $answertwo = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Questions you should ask during the interview'") or die ("Could not fetch answer data");
    $answertwonum = mysql_num_rows($answertwo);
    $answertwoprint = mysql_fetch_assoc($answertwo);
    // Retrieve number of rows of the third answer   
    $answerthree = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='How to communicate with program staff before, during, and after an interview'") or die ("Could not fetch answer data");
    $answerthreenum = mysql_num_rows($answerthree);
    $answerthreeprint = mysql_fetch_assoc($answerthree);
    // Retrieve number of rows of the fourth answer   
    $answerfour = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='How to communicate with the program\'s current residents during the interview process'") or die ("Could not fetch answer data");
    $answerfournum = mysql_num_rows($answerfour);
    $answerfourprint = mysql_fetch_assoc($answerfour);
    
    echo "<div style='width:600px; text-align:right;'>" . $answeroneprint['answer'] . ":&nbsp;" . $answeronenum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answertwoprint['answer'] . ":&nbsp;" . $answertwonum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answerthreeprint['answer'] . ":&nbsp;" . $answerthreenum . "</div>". PHP_EOL;
    echo "<div style='width:600px; text-align:right;'>" . $answerfourprint['answer'] . ":&nbsp;" . $answerfournum . "</div>". PHP_EOL;
    echo "<div style='height:25px;'></div>";
  	//get august's question
  	$august_count = 0;
  	$augustquestion = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE question='What questions do you have about U.S. immigration and visa requirements?' LIMIT 0,1");
  	while ($row = mysql_fetch_array($augustquestion)) {
    	$row_color = ($august_count % 2) ? $color1 : $color2;
    	$august_count++;
    	if ($august_count>0 && $august_count<2) {
    	  echo "<h5>" . $row[question] . "</h5>" . PHP_EOL;
    	}
  	}
  // Retrieve number of rows of the first answer   
  $answerone = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Visa options for U.S. GME'") or die ("Could not fetch answer data");
  $answeronenum = mysql_num_rows($answerone);// returns total number of rows that matches the string in the WHERE clause
  $answeroneprint = mysql_fetch_assoc($answerone);//returns an array of strings
  // Retrieve number of rows of the second answer   
  $answertwo = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='When to begin/Steps in the process'") or die ("Could not fetch answer data");
  $answertwonum = mysql_num_rows($answertwo);
  $answertwoprint = mysql_fetch_assoc($answertwo);
  // Retrieve number of rows of the third answer   
  $answerthree = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Organizations involved and their roles'") or die ("Could not fetch answer data");
  $answerthreenum = mysql_num_rows($answerthree);
  $answerthreeprint = mysql_fetch_assoc($answerthree);
  // Retrieve number of rows of the fourth answer   
  $answerfour = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Common obstacles and solutions'") or die ("Could not fetch answer data");
  $answerfournum = mysql_num_rows($answerfour);
  $answerfourprint = mysql_fetch_assoc($answerfour);
  
  echo "<div style='width:600px; text-align:right;'>" . $answeroneprint['answer'] . ":&nbsp;" . $answeronenum . "</div>". PHP_EOL;
  echo "<div style='width:600px; text-align:right;'>" . $answertwoprint['answer'] . ":&nbsp;" . $answertwonum . "</div>". PHP_EOL;
  echo "<div style='width:600px; text-align:right;'>" . $answerthreeprint['answer'] . ":&nbsp;" . $answerthreenum . "</div>". PHP_EOL;
  echo "<div style='width:600px; text-align:right;'>" . $answerfourprint['answer'] . ":&nbsp;" . $answerfournum . "</div>". PHP_EOL;
  echo "<div style='height:25px;'></div>";
  } else { 
		echo '<p>Sorry, no matches could be found in the database.</p><p>' . mysql_error() . '</p><br />' . PHP_EOL;
    echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'>Start a new search</a></p><br />" . PHP_EOL; 
	}
}
echo "<p><a href='index.php'>Take a survey</a></p>\n";
echo "</div><!-- end echo-survey -->" . PHP_EOL;
include ('../common/footer.php');
?>