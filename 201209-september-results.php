<?php
    echo "<table class='survey-table'>" . PHP_EOL;//start table
  	$september_count = 0;
  	$septemberquestion = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE year='2012' AND month='September' AND question='What kind of information about publishing research would you like to know more about?' LIMIT 0,1");
  	while ($row = mysql_fetch_array($septemberquestion)) {
    	$september_count++;
    	if ($september_count>0 && $september_count<2) {
    	 echo "<tr><td class='main'><h5><span>Month/Year: </span>" .$row[month] . ", " . $row[year] . "</td></tr>" . PHP_EOL;
    	 echo "<tr><td class='main'><h5><span>Question: </span>" . $row[question] . "</h5></td></tr>" . PHP_EOL;
    	}
  	}
  // Retrieve number of rows of the first answer   
  $answerone = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Benefits of publishing research'") or die ("Could not fetch answer data");
  $answeronenum = mysql_num_rows($answerone);// returns total number of rows that matches the string in the WHERE clause
  $answeroneprint = mysql_fetch_assoc($answerone);//returns an array of strings
  // Retrieve number of rows of the second answer   
  $answertwo = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Types of research'") or die ("Could not fetch answer data");
  $answertwonum = mysql_num_rows($answertwo);
  $answertwoprint = mysql_fetch_assoc($answertwo);
  // Retrieve number of rows of the third answer   
  $answerthree = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Writing an abstract'") or die ("Could not fetch answer data");
  $answerthreenum = mysql_num_rows($answerthree);
  $answerthreeprint = mysql_fetch_assoc($answerthree);
  // Retrieve number of rows of the fourth answer   
  $answerfour = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Finding a mentor'") or die ("Could not fetch answer data");
  $answerfournum = mysql_num_rows($answerfour);
  $answerfourprint = mysql_fetch_assoc($answerfour);
  
  echo "<tr><td class='main'>" . $answeroneprint['answer'] . ":&nbsp;" . $answeronenum . "</td></tr>". PHP_EOL;
  echo "<tr><td class='main'>" . $answertwoprint['answer'] . ":&nbsp;" . $answertwonum . "</td></tr>". PHP_EOL;
  echo "<tr><td class='main'>" . $answerthreeprint['answer'] . ":&nbsp;" . $answerthreenum . "</td></tr>". PHP_EOL;
  echo "<tr><td class='main'>" . $answerfourprint['answer'] . ":&nbsp;" . $answerfournum . "</td></tr>". PHP_EOL;
  echo "</table>" . PHP_EOL;
?>