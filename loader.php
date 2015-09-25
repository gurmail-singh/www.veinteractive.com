<?php
if($_POST['action'] == 'JSONPopulate') {
    $url = 'https://veads.veinteractive.com/adxml.php?a=5614';
    $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
    $xml = simplexml_load_string( file_get_contents( $url ), 'SimpleXMLElement', LIBXML_NOCDATA );
    $json = json_encode($xml);
	print $json;
}

?>