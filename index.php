<?php
$page = $_SERVER['PHP_SELF'];
$sec = "58";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  <!-- Site made with Mobirise Website Builder v2.8.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v2.8.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>BEMS EECU</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise-slider/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<?php
//libxml_use_internal_errors(true);
error_reporting(E_ALL);
$uuid1=uuid();
$key1='http://bems.ee.eng.chula.ac.th/eng4/fl13/north/room_server/z1/sensor1/monitor/temperature';
$key2='http://bems.ee.eng.chula.ac.th/eng4/fl13/north/room_server/z1/sensor1/monitor/humidity';
$temp=fetchdata($key1,$uuid1);
//var_dump($temp);
$uuid2=uuid();
$humid=fetchdata($key2,$uuid2);
function fetchdata($keyid,$uuid){
$mydata=
"<?xml version='1.0' encoding='UTF-8'?>
<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/'>
<soapenv:Body>
<ns2:queryRQ xmlns:ns2='http://soap.fiap.org/'>
<transport xmlns='http://gutp.jp/fiap/2009/11/'>
<header>
<query id='".$uuid."' type='storage'>
<key id='$keyid' attrName='time' select='maximum' />
</query>
</header>
</transport>
</ns2:queryRQ>
</soapenv:Body>
</soapenv:Envelope>";
$url = "http://161.200.90.122/axis2/services/FIAPStorage";
 $headers = array(
    "Content-type: text/xml"
    ,"Content-length: ".strlen($mydata)
    ,"SOAPAction: http://soap.fiap.org/query"
    );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS,  $mydata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            $data = curl_exec($ch);
            if($data === false){
                $error = curl_error($ch);
                echo $error;
                die('error occured');
            }else{
				$xml = simplexml_load_string($data);
				$ns = $xml->getNamespaces(true);
				 $child =(string)
				$xml->children($ns['soapenv'])->
				Body->children($ns['ns2'])->
				queryRS->children($ns[''])->transport->body->point->value;
				$para[1]=$child;
				$child2 =(string)
				$xml->children($ns['soapenv'])->
				Body->children($ns['ns2'])->
				queryRS->children($ns[''])->transport->body->point->value->attributes();
				$para[2]=$child2;
					
            }
            curl_close($ch);
			return $para;
}


function uuid(){
  return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff), mt_rand( 0, 0xffff ),
    mt_rand( 0, 0x0fff ) | 0x4000,
    mt_rand( 0, 0x3fff ) | 0x8000,
    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff), mt_rand( 0, 0xffff ));
}

?>

<body>
<section class="engine"><a rel="nofollow" href="https://mobirise.com">Mobirise best web design software for mac</a></section>
<section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true" data-interval="10000" id="slider-0" style="background-color: rgb(255, 255, 255);">
    <div class="mbr-section__container">
        <div>
            <ol class="carousel-indicators">
                <li data-app-prevent-settings="" data-target="#slider-0" data-slide-to="0" class="active"></li><li data-app-prevent-settings="" data-target="#slider-0" class="" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height active" style="background-image: url(assets/images/renewable1-1160x402-64.png);">
                    <div class="mbr-box__magnet mbr-box__magnet--sm-padding">
                        <div class=" container">
                            
                            <div class="row"><div class="col-sm-8 col-sm-offset-2">
                                <div class="mbr-hero">
                                    <h2 class="mbr-hero__text" style='color: #157DEC;'><span style="font-weight: normal;">Location: 13th Floor Server room</span></h2>
                                    <h1 class="mbr-hero__text" style="color: #2B65EC;">Temperature:  <?php echo "<font color='green;'>$temp[1]</font>";?> Celcius</h1>
									<p class="mbr-hero__subtext2" style='color: #157DEC;'>Updated time: <?php echo str_replace('T','    ',$temp[2]); ?> </p>
                                </div>
                                
                            </div></div>
							
			<div class="mbr-section__container container mbr-section__container--std-top-padding">
			<div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-12 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img class="mbr-figure__img" src="assets/images/eecu-225x224-58.jpg"></figure>
                </div>
            </div>
            <div class="mbr-section__col col-xs-12 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img class="mbr-figure__img" src="assets/images/daad.png"></figure>
						</div>
					</div>
				</div>
			</div>
							
                        </div>
                    </div>
                </div><div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height" style="background-image: url(assets/images/iot2-1380x631-81.png);">
                    <div class="mbr-box__magnet mbr-box__magnet--sm-padding">
                        <div class=" container">
                            
                            <div class="row"><div class="col-sm-8 col-sm-offset-2">
                               <div class="mbr-hero">
                                    <h2 class="mbr-hero__text" style='color: #F535AA;'><span style="font-weight: normal;">Location: 13th Floor Server room</span></h2>
                                    <h1 class="mbr-hero__text" style="color: #F6358A;">Humidity:  <?php echo "<font color='green;'>$humid[1]</font>";?> %</h1>
									<p class="mbr-hero__subtext2" style='color: #F535AA;'>Updated time: <?php echo str_replace('T','    ',$humid[2]); ?> </p>
                                </div>
                                
                            </div></div>
							<div class="mbr-section__container container mbr-section__container--std-top-padding">
							<div class="mbr-section__row row">
							<div class="mbr-section__col col-xs-12 col-sm-6">
								<div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
									<figure class="mbr-figure"><img class="mbr-figure__img" src="assets/images/eecu-225x224-58.jpg"></figure>
								</div>
							</div>
							<div class="mbr-section__col col-xs-12 col-sm-6">
								<div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
									<figure class="mbr-figure"><img class="mbr-figure__img" src="assets/images/daad.png"></figure>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-0">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-0">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-parallax-background" id="features1-2" style="background-image: url(assets/images/bg3.jpg);">
    
    
    <div class="mbr-section__container container mbr-section__container--std-top-padding">
        <div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-12 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img class="mbr-figure__img" src="assets/images/eecu-225x224-58.jpg"></figure>
                </div>
                
                
                <div class="mbr-section__container mbr-section__container--last">
                    <div class="mbr-buttons mbr-buttons--center"><a href="http://www.ee.eng.chula.ac.th/" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default" target="_blank">Electrical engineering<br>Chulalongkorn University</a></div>
                </div>
            </div>
            <div class="mbr-section__col col-xs-12 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><img class="mbr-figure__img" src="assets/images/daad.png"></figure>
                </div>
                
                
                <div class="mbr-section__container mbr-section__container--last">
                    <div class="mbr-buttons mbr-buttons--center"><a href="http://www.fraunhofer.de/en.html" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default" target="_blank">Fraunhofer</a></div>
                </div>
            </div>
            
            
            
            
            
            
            
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>