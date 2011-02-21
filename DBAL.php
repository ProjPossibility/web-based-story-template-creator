<?php

class DBAL
{
	var $con;
	// Open connection to the DB
	function openDBConnection()
	{
		$this->con = mysql_connect('jmlalogix.db.5637669.hostedresource.com','jmlalogix','Madhavan@007');
		
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}
		$database = "jmlalogix";
		
		@mysql_select_db($database) or die( "Unable to select database");
	}

	// Close connection to the DB
	function closeDBConnection()
	{
		mysql_close($this->con);
	}
	
	function getUserID($userName)
	{
		$this->openDBConnection();
		$getUserID = "select user_id from user where user_name='".$userName."'" ;
		$resultSet = mysql_query($getUserID);
		$userID = mysql_result($resultSet, 0, "user_id"); 
		$this->closeDBConnection();
		return $userID;
	}
	
	function getFormID()
	{
		$this->openDBConnection();
		$addDataQuery = "select * from TravelGrants" ;
		$resultSet = mysql_query($addDataQuery);
		$numberOfResutlts = mysql_num_rows($resultSet);
		$this->closeDBConnection();
		return $numberOfResutlts;
	}

	function createNewForm($formID, $userID, $presenting, $attending, $conferenceTitle, $conferenceLocation, $conferenceState, $confStartDate, $confEndDate, $travelStartDate, $travelEndDate, $titleResearch, $abstract, $learning, $status, $tae, $submissionDate, $advName, $deanName, $finalAmt)
	{
		$this->openDBConnection();
		$addDataQuery = "insert into TravelGrants (`Presenting`,`Attending` ,`FormID` ,`City` ,`State` ,`StartDate` ,`EndDate` ,`Title` ,`TravelStartDate` ,`TravelEndDate` ,`WorkTitle` ,`Abstract` ,`Learning` ,`TAE` ,`TotalRequired` ,`UserID` ,`Status`, `SubDate`, `AdvName`, `DeanName`, `FinalAmt`) VALUES ('" . $presenting . "',  '" . $attending . "',  '" . $formID . "',  '" . $conferenceLocation . "',  '" . $conferenceState . "',  '" . $confStartDate . "',  '" . $confEndDate . "',  '" . $conferenceTitle . "',  '" . $travelStartDate . "',  '" . $travelEndDate . "',  '" . $titleResearch . "',  '" . $abstract . "',  '" . $learning . "',  '" . $tae . "',  '" . $tae . "',  '" . $userID . "',  '" . $status . "', '" . $submissionDate . "', '". $advName ."', '". $deanName ."', '". $finalAmt  ."')" ;
		$result1 = mysql_query($addDataQuery);
		$this->closeDBConnection();
		
		return $addDataQuery;
	}
	
	function registerExpenses($formID, $expType, $expDate, $expCompany, $expAmount, $mileage)
	{
		$this->openDBConnection();
		
		$registerExpenseQuery = "insert into Expenses (`formid`, `type`, `date`, `company`, `amount`, `noofmiles`) values ('" . $formID ."', '". $expType ."', '". $expDate . "', '" . $expCompany . "', '" . $expAmount . "', '" . $mileage ."')";
		
		$resultSet = mysql_query($registerExpenseQuery);
		
		$this->closeDBConnection();		
	}

	// Incomplete form Saving to the DB for the User
	function saveNewForm($formID, $userID, $presenting, $attending, $conferenceTitle, $conferenceLocation, $conferenceState, $confStartDate, $confEndDate, $travelStartDate, $travelEndDate, $titleResearch, $abstract, $learning, $status, $tae, $finalAmt)
	{
		$this->openDBConnection();
		$addDataQuery = "insert into TravelGrants (`Presenting`,`Attending` ,`FormID` ,`City` ,`State` ,`StartDate` ,`EndDate` ,`Title` ,`TravelStartDate` ,`TravelEndDate` ,`WorkTitle` ,`Abstract` ,`Learning` ,`TAE` ,`TotalRequired` ,`UserID` ,`Status`, `SubDate`, `AdvName`, `DeanName`, `FinalAmt`) VALUES ('" . $presenting . "',  '" . $attending . "',  '" . $formID . "',  '" . $conferenceLocation . "',  '" . $conferenceState . "',  '" . $confStartDate . "',  '" . $confEndDate . "',  '" . $conferenceTitle . "',  '" . $travelStartDate . "',  '" . $travelEndDate . "',  '" . $titleResearch . "',  '" . $abstract . "',  '" . $learning . "',  '" . $tae . "',  '" . $tae . "',  '" . $userID . "',  '" . $status . "', '" . $submissionDate . "', '". $advName ."', '". $deanName ."', '". $finalAmt ."')" ;
		$result1 = mysql_query($addDataQuery);
		$this->closeDBConnection();
	}


	// Update an already incomplete form and still save it as Incomplete
	function saveExistingForm($formID, $userID, $presenting, $attending, $conferenceTitle, $conferenceLocation, $conferenceState, $confStartDate, $confEndDate, $travelStartDate, $travelEndDate, $titleResearch, $abstract, $learning, $status, $tae)
	{
		$this->openDBConnection();
		$addDataQuery = "insert into TravelGrants (`Presenting`,`Attending` ,`FormID` ,`City` ,`State` ,`StartDate` ,`EndDate` ,`Title` ,`TravelStartDate` ,`TravelEndDate` ,`WorkTitle` ,`Abstract` ,`Learning` ,`TAE` ,`TotalRequired` ,`UserID` ,`Status`) VALUES ('" . $presenting . "',  '" . $attending . "',  '" . $formID . "',  '" . $conferenceLocation . "',  '" . $conferenceState . "',  '" . $confStartDate . "',  '" . $confEndDate . "',  '" . $conferenceTitle . "',  '" . $travelStartDate . "',  '" . $travelEndDate . "',  '" . $titleResearch . "',  '" . $abstract . "',  '" . $learning . "',  '" . $tae . "',  '" . $tae . "',  '" . $userID . "',  '" . $status . "')" ;
		$result1 = mysql_query($addDataQuery);
		$this->closeDBConnection();
	}
	
	// Get Advisor Email id
	function getAdvisorEmailID($userID)
	{
		$this->openDBConnection();

		$getAdvisorEmail = "SELECT adv_email FROM user WHERE user_id = '". $userID."'";
		$result1 = mysql_query($getAdvisorEmail);
		$advisorEmail = mysql_result($result1, 0, "adv_email"); 

		$this->closeDBConnection();
		
		return $advisorEmail;
	}
	
	
	function getAdvisorName($userID)
	{
		$this->openDBConnection();

		$getAdvisorName = "SELECT adv_first_name, adv_last_name FROM user WHERE user_id = '". $userID."'";
		$result1 = mysql_query($getAdvisorName);
		$advisorFName = mysql_result($result1, 0, "adv_first_name"); 
		$advisorLName = mysql_result($result1, 0, "adv_last_name"); 

		$this->closeDBConnection();
		
		$advFullName = $advisorFName . " " . $advisorLName;
		
		return $advFullName;
	}

	function getDeanName($userID)
	{
		$this->openDBConnection();

		$getAdvisorName = "SELECT dean_first_name, dean_last_name FROM user WHERE user_id = '". $userID."'";
		$result1 = mysql_query($getAdvisorName);
		$deanFName = mysql_result($result1, 0, "dean_first_name"); 
		$deanLName = mysql_result($result1, 0, "dean_last_name"); 

		$this->closeDBConnection();
		
		$deanFullName = $deanFName . " " . $deanLName;
		
		return $deanFullName;
	}
	
	// Get a File ID
	function getFileID()
	{
		$this->openDBConnection();
		$getFileID = "select * from UploadedFiles";
		$resultSet = mysql_query($getFileID);
		$numberOfResutlts = mysql_num_rows($resultSet);
		$this->closeDBConnection();
		return $numberOfResutlts;
	}
	
	// Put entry in the UploadedFiles DB for the files being uploaded
	function saveFileEntry($userID, $formID, $originalFileName, $fileExtension)
	{
		$this->openDBConnection();
		$saveFileInformation = "insert into UploadedFiles (`UserID`,`FormID`,`ActualName`,`Extension`) values('" . $userID . "','" . $formID . "','" . $originalFileName . "','" . $fileExtension . "')";
		$resultSet = mysql_query($saveFileInformation);
		$this->closeDBConnection();
	}
	
	function getUploadedFiles($formID)
	{
		$this->openDBConnection();
		$getUploadedFile = "select * from UploadedFiles where FormID='" . $formID . "'";
		$resultSet = mysql_query($getUploadedFile);
		$numberOfResutlts = mysql_num_rows($resultSet);
		$returnedValues = mysql_fetch_assoc($resultSet);
		$this->closeDBConnection();
		return $returnedValues;
	}
}
?>