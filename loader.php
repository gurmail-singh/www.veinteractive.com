<?php
if($_POST['action'] == 'XMLPopulate') {
	$xml = 'gs.xml';
  	$objXml = simplexml_load_file($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
	
	$xml_string = $objXml->__toString();
	$jsonResponse = '{response_html: "' . $xml_string .'"}';
	//print json_encode($jsonResponse);
	//print $jsonResponse;
	print $jsonResponse;
}

if($_POST['action'] == 'JSONPopulate') {
	$xml = 'gs.xml';
  	$objXml = simplexml_load_file($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
	print json_encode($objXml);
}

?>