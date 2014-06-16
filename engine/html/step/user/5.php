<?php
$pageTitle="Profile step $step - HealthKeep";
$pageDescr="This is the step $step of $totalNumSteps to help you complete your profile";

if(defined(USER_TYPE) || USER_TYPE<5){
	if(isset($_SESSION["mx_signup"]) && $_SESSION["mx_signup"]==6){
		$jsfunctions.="mixpanel.track('User Step $step');";
		$_SESSION["mx_signup"]=7;
	}
}

$designV1=1;
require_once(ENGINE_PATH.'html/header.php');
require_once(ENGINE_PATH.'html/top.php');
?>
<div id="main">
	<div class="iHold">
		<div id="iTimeline" class="iBoard clearfix">
		<div class="iHeading">
				<h1 class="stepsHeading center colorGray">Enter any surgeries/procedures you have had</h1>
		</div>
		<?php require_once(ENGINE_PATH."html/step/breadcrumb.php"); ?>
		<form action="<?php echo WEB_URL; ?>act/step/save.php?t=u&s=<?php echo $step; ?>" id="steps" method="post" class="addEventForm borderTop">
			<div class="addEventFormItem clearfix">
				<h4>Please enter the procedures</h4>
				<div class="addEventFormInputs">
				<input type="text" id="topic" name="topic" />
				</div>
			</div>
			<div class="addEventFormButtons clearfix">
				<button class="btn btn-gray" type="button" onclick="location.href='<?php echo WEB_URL."step/".($step+1); ?>'">Skip</button>
				<input type="submit" class="btn btn-blue" value="save" />
			</div>
		</form>

		<?php
		$needTokenInput=1;
		$onload.="$('#topic').tokenInput('".WEB_URL."act/ajax/autoCompleteTopic.php?type=p', { hintText: 'Type the name of the procedure', noResultsText: 'No procedure with that name', searchingText: 'Searching...',tokenLimit: 10,minChars: 2,searchDelay: 200,preventDuplicates: true, theme:'long' });";

		?>
		</div>
	</div>
</div>
<?php
require_once(ENGINE_PATH.'html/footer.php');