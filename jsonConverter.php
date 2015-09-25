<?php>
/**
* Load XML via URL and convert to JSON to be displayed in textArea
* //https://veads.veinteractive.com/adxml.php?a=5614
*
*/
$url = 'https://veads.veinteractive.com/adxml.php?a=5614';
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$xmlstring = file_get_contents($url, false, $context);
?>

<head>    
    <script type="text/javascript" src="jquery.js"></script>
    <ink rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
    <div id="header">
        <h1>VEInteractive Test</h1>
    </div>
    <div id="main">
        <form method="post">
        <table style="width:100%">
        <tr>
            <td><textarea id="xmlTextArea" cols="60" rows="30"><?php echo $xmlstring;?></textarea> </td>
            <td><textarea id="jsonTextArea" cols="60" rows="30"></textarea> </td>             
        </tr>
        <tr>
            <td align="left"><label for="lbl">Convert above XML to JSON:</label></td>            
            <td><button id="btnConvertJSON" onclick="JSONpopulate()" type="button">Convert to JSON</button></td> 
        </tr>
        <tr>
            <td align="left"><label for="lbl">Test2:</label>
            <input id="test2" type="button" value="Run" onclick="location.href='slideshow.php';" />
        </tr>
        </table>        
        <br/><br/><br/><br/>
        </form>
    </div>    
    <div id="footer">
        <br/><br/><br/><br/>
        By Gurmail Singh
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
