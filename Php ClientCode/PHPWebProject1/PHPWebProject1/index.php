<?php
define('NEWLINE', "<br />\n");         // Constant for new line
$wsdl = 'http://localhost:8083/?wsdl'; //wsdl address of wcf service wsdl Definition
$soapClient = new SoapClient($wsdl, array('cache_wsdl' => 0)); // instantiate a new  SoapClient Object
try
{
	$result = $soapClient->getMessage(); // call a method associated with the service
}

catch (SoapFault $fault)  // catch a soap Fault exception
{   echo "Fault code: {$fault->faultcode}" . NEWLINE;      // echo the Fault code
    echo "Fault string: {$fault->faultstring}" . NEWLINE; // echo the fault string describing the exception that occurred
    if ($soapClient != null)  //if soap client Object is not equal to null
	     $soapClient = null; //set soapClient to null
	
	exit();                 // exit  running script;
}
$soapClient = null;  // reset soapClient  object to null for future request
echo "Wcf Return value: {$result->getMessageResult}" . NEWLINE;  // echo the result returned from the soap Request

?>