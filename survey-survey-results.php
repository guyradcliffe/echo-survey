<?php
  require_once ('../path-to-db-connection'); 
  include ("../common/header.php");
  // Retrieve the question  
  $question = mysql_query("SELECT question FROM surveyTbl") or die ("Could not fetch answer data");
  // Retrieve number of rows of the first answer   
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
  // Retrieve number of rows of the fifth answer   
  $answerfive = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM surveyTbl WHERE answer='Aggregate USMLE performance data'") or die ("Could not fetch answer data");
  $answerfivenum = mysql_num_rows($answerfive);
  $answerfiveprint = mysql_fetch_assoc($answerfive);
  
  echo "<h5 style='width:575px; height:30px; margin:0 auto;'>" . mysql_result($question, 1) . "</h5>\n";
  echo "<div class='echosurvey'>"; 
  echo "<div class='row'><div class='cellleft'><h5>Answers:</h5></div><div class='cellright'></div></div>\n";
  echo "<div class='row'><div class='cellleft'>" . $answeroneprint['answer'] . ":</div><div class='cellright'>&nbsp;" . $answeronenum . "</div></div>\n";
  echo "<div class='row'><div class='cellleft'>" . $answertwoprint['answer'] . ":</div><div class='cellright'>&nbsp;" . $answertwonum . "</div></div>\n";
  echo "<div class='row'><div class='cellleft'>" . $answerthreeprint['answer'] . ":</div><div class='cellright'>&nbsp;" . $answerthreenum . "</div></div>\n";
  echo "<div class='row'><div class='cellleft'>" . $answerfourprint['answer'] . ":</div><div class='cellright'>&nbsp;" . $answerfournum . "</div></div>\n";
  echo "<div class='row'><div class='cellleft'>" . $answerfiveprint['answer'] . ":</div><div class='cellright'>&nbsp;" . $answerfivenum . "</div></div>\n";
  echo "<div class='row'><div class='cellleft'><a href='index.php'>Take a survey</a></div><div class='cellright'></div></div>\n";
  echo "</div>\n";
  include ("../common/footer.php"); 
?>
