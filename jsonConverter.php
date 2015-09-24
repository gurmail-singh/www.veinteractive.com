<?php>
/**
* Load XML via URL and convert to JSON
* //https://veads.veinteractive.com/adxml.php?a=5614
*
*/

$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$url = 'https://veads.veinteractive.com/adxml.php?a=5614';

$xml = file_get_contents($url, false, $context);
$xml = simplexml_load_string($xml);
$xml = 'gs.xml';
$objXml = simplexml_load_file($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
$json = json_encode($objXml);


//now decode json
 $jsonArray = json_decode($json);
 $_SESSION["jsonArray"] = $jsonArray;
/* 
 echo 'showintro=\t'.$jsonArray->general->showintro .'<br>';
 echo 'headline=\t'.$jsonArray->scenes->scene->headline .'<br>';
 echo 'fgimage=\t'.$jsonArray->scenes->scene->fgimage .'<br>';
 echo 'end';

 foreach($jsonArray->scenes as $scene
 )	{
	echo $general;
 }
exit();


foreach($json as $obj){
   echo $obj->introimage .'<br>';
}
*/

$xml_string = @file_get_contents('gs.xml', FILE_TEXT);
$xml = simplexml_load_string($xml_string);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
//echo $array->description;
//echo "helloworld";
/*
<?php
$file = @file_get_contents($xml_File, FILE_TEXT);
$xml = new SimpleXMLElement($file);
$xml_Excerpt = @$xml->xpath('/states/state[@id="AL"]')[0]; // [0] gets the node
echo json_encode($xml_Excerpt);
?>
*/
?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
</head>
<form method="post">
        <textarea id="xmlTextArea" cols="60" rows="7">Hello world<?php echo $xml_string;?></textarea> 
		<textarea id="jsonTextArea" cols="60" rows="7"></textarea> 
        <br />        
        <button id="btnConvertJSON" onclick="JSONpopulate()" type="button">Convert to JSON</button>
</form>