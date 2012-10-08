<?php   
  require_once ('../path-to-db-connection');                                               
  if($_POST['survey'])
  {// The form is submitted 
    $answer=$_POST['answer'];
    $question="What kind of data on IMGs in U.S. GME would you like to see?";
    $month="June";
    $year="2012";
    $query = "INSERT INTO surveyTbl (question, answer, month, year) VALUES('$question', '$answer', '$month', '$year')";
    $result = mysql_query ($query); // Run the query.
    if ($result) { // If it ran OK.			
			 header ("Location: http://guyradcliffe.com/survey/survey-results.php");
      } else {
        die('Sorry, your selection was not recorded: ' . mysql_error());
      }       					
  }
?>
<? include ("../common/header.php"); ?>
    <div class="grid_660">
      <div class="div_660"> 
        <div class="echo-survey">
          <h5 style="margin:0 0 15px 0;">What kind of data on IMGs in U.S. GME would you like to see?</h5>
          <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>"  onsubmit="">
            <script type="text/javascript">
              $(document).ready(function() { 
                $("#vote").hide();
                $("#falsevote").show();
                $("input[type='radio']").change(function(){  
                  if($("#Data-IMGs").val()=="IMGs in U.S. GME, by country of medical school"){
                    $("#vote").show();
                    $("#falsevote").hide();
                  } else if($("#Data-IMGs").val()=="IMGs in U.S. GME, by state and specialty"){  
                    $("#vote").show();
                    $("#falsevote").hide();
                  } else if($("#Data-IMGs").val()=="IMGs in the 2012 Match"){ 
                    $("#vote").show();
                    $("#falsevote").hide();
                  } else if($("#Data-IMGs").val()=="Profile of 2011 ECFMG Certificants"){
                    $("#vote").show();
                    $("#falsevote").hide();
                  } else if($("#Data-IMGs").val()=="Aggregate USMLE performance data"){
                    $("#vote").show();
                    $("#falsevote").hide();
                  } else {}                
                });
              });
            </script>
            <div class="inputradio">
              <input type="radio" name="answer" id="Data-IMGs" value="IMGs in U.S. GME, by country of medical school"> IMGs in U.S. GME, by country of medical school<br />
              <input type="radio" name="answer" id="Data-IMGs" value="IMGs in U.S. GME, by state and specialty"> IMGs in U.S. GME, by state and specialty<br />
              <input type="radio" name="answer" id="Data-IMGs" value="IMGs in the 2012 Match"> IMGs in the 2012 Match<br />
              <input type="radio" name="answer" id="Data-IMGs" value="Profile of 2011 ECFMG Certificants"> Profile of 2011 ECFMG Certificants<br />
              <input type="radio" name="answer" id="Data-IMGs" value="Aggregate USMLE performance data"> Aggregate USMLE performance data<br />
            </div>           
            <div id="vote" style="height:30px; margin-bottom:0;"><input class="submit" type="submit" name="survey" value="Vote" style="width:215px; height:25px; cursor:pointer; cursor:hand; margin:20px 0 0 180px;" /></div>
            <div id="falsevote" style="margin:0 0 0 180px; height:30px; background:url(../images/echo-surveys-btn-falsevote.gif) no-repeat; clear:both;"></div>
            <div style="height:30px;"></div>
            <div class="clear"></div>
          </form>
        </div><!-- end echo-survey -->
      </div><!-- end div_660 -->
    </div><!-- end grid660 -->    
<?php include ("../common/footer.php"); ?>