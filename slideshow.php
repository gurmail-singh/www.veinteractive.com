<?php
/*
*Extracts the details of the product images from the JSON feed, and displays them in a carousel using a jquery plugin with forward and backwards controls.
*
*/

$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$url = 'https://veads.veinteractive.com/adxml.php?a=5614';

$xml = file_get_contents($url, false, $context);
$xml = simplexml_load_string($xml);

$xml = simplexml_load_string( file_get_contents( $url ), 'SimpleXMLElement', LIBXML_NOCDATA );
$json = json_encode($xml);
$jsonArray = json_decode($json);
$baseURL = $jsonArray->general->rootfolder;
$stagewidth = $jsonArray->general->stagewidth;
$stageheight = $jsonArray->general->stageheight;
$image1 = $baseURL . $jsonArray->scenes->scene[0]->fgimage;
$image2 = $baseURL . $jsonArray->scenes->scene[1]->fgimage;
$image3 = $baseURL . $jsonArray->scenes->scene[2]->fgimage;
$dimensions = ' height="'. $stageheight .'" width="'.$stagewidth.'"';
?>

<head>    
    <script type="text/javascript" src="jquery.js"></script>
    <ink rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
    <div id="header">
        <h1>VEInteractive Test Slideshow</h1>
    </div>
    <div id="main">
        <div id=outside>
            <!-- prev/next links -->
            <div class=center>
                <span id=prev>&lt;&lt;Prev </span>
                <span id=next> Next&gt;&gt;</span>
            </div>
            <div class="cycle-slideshow"
                data-cycle-fx="scrollHorz"
                data-cycle-pause-on-hover="true"              
                data-cycle-prev="#prev"
                data-cycle-next="#next"
                data-cycle-speed="300">
                <img src="<?php echo $image1.$dimensions;?>">
                <img src="<?php echo $image2.$dimensions;?>">
                <img src="<?php echo $image3.$dimensions;?>">            
            </div>
        </div>
    </div>
    
    <div id="footer">
        By Gurmail Singh
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.cycle2.js"></script>
</body>
