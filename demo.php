<?php
// OPTIONS - PLEASE CONFIGURE THESE BEFORE USE!

$yourEmail = "info@perspectivedesign.co.uk"; // the email address you wish to receive these mails through
$yourWebsite = "Dominic Suddaby Walking Sticks"; // the name of your website
$thanksPage = ''; // URL to 'thanks for sending mail' page; leave empty to keep message on the same page 
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4
$requiredFields = "name,email,comments"; // names of the fields you'd like to be required as a minimum, separate each field with a comma


// DO NOT EDIT BELOW HERE
$error_msg = array();
$result = null;

$requiredFields = explode(",", $requiredFields);

function clean($data) {
	$data = trim(stripslashes(strip_tags($data)));
	return $data;
}
function isBot() {
	$bots = array("Indy", "Blaiz", "Java", "libwww-perl", "Python", "OutfoxBot", "User-Agent", "PycURL", "AlphaServer", "T8Abot", "Syntryx", "WinHttp", "WebBandit", "nicebot", "Teoma", "alexa", "froogle", "inktomi", "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory", "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot", "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz");

	foreach ($bots as $bot)
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
			return true;

	if (empty($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_USER_AGENT'] == " ")
		return true;

	return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isBot() !== false)
		$error_msg[] = "No bots please! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];

	// lets check a few things - not enough to trigger an error on their own, but worth assigning a spam score.. 
	// score quickly adds up therefore allowing genuine users with 'accidental' score through but cutting out real spam :)
	$points = (int)0;

	$badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

	foreach ($badwords as $word)
		if (
			strpos(strtolower($_POST['comments']), $word) !== false || 
			strpos(strtolower($_POST['name']), $word) !== false
		)
			$points += 2;

	if (strpos($_POST['comments'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
		$points += 2;
	if (isset($_POST['nojs']))
		$points += 1;
	if (preg_match("/(<.*>)/i", $_POST['comments']))
		$points += 2;
	if (strlen($_POST['name']) < 3)
		$points += 1;
	if (strlen($_POST['comments']) < 15 || strlen($_POST['comments'] > 1500))
		$points += 2;
	if (preg_match("/[bcdfghjklmnpqrstvwxyz]{7,}/i", $_POST['comments']))
		$points += 1;
	// end score assignments

	foreach($requiredFields as $field) {
		trim($_POST[$field]);

		if (!isset($_POST[$field]) || empty($_POST[$field]) && array_pop($error_msg) != "Please fill in all the required fields and submit again.\r\n")
			$error_msg[] = "Please fill in all the required fields and submit again.";
	}

	if (!empty($_POST['name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['name'])))
		$error_msg[] = "The name field must not contain special characters.\r\n";
	if (!empty($_POST['email']) && !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
		$error_msg[] = "That is not a valid e-mail address.\r\n";
	if (!empty($_POST['url']) && !preg_match('/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i', $_POST['url']))
		$error_msg[] = "Invalid website url.\r\n";

	if ($error_msg == NULL && $points <= $maxPoints) {
		$subject = "Automatic Form Email";

		$message = "You received this e-mail message through your website: \n\n";
		foreach ($_POST as $key => $val) {
			if (is_array($val)) {
				foreach ($val as $subval) {
					$message .= ucwords($key) . ": " . clean($subval) . "\r\n";
				}
			} else {
				$message .= ucwords($key) . ": " . clean($val) . "\r\n";
			}
		}
		$message .= "\r\n";
		$message .= 'IP: '.$_SERVER['REMOTE_ADDR']."\r\n";
		$message .= 'Browser: '.$_SERVER['HTTP_USER_AGENT']."\r\n";
		$message .= 'Points: '.$points;

		if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
			$headers   = "From: $yourEmail\n";
			$headers  .= "Reply-To: {$_POST['email']}";
		} else {
			$headers   = "From: $yourWebsite <$yourEmail>\n";
			$headers  .= "Reply-To: {$_POST['email']}";
		}

		if (mail($yourEmail,$subject,$message,$headers)) {
			if (!empty($thanksPage)) {
				header("Location: $thanksPage");
				exit;
			} else {
				$result = 'Your mail was successfully sent.';
				$disable = true;
			}
		} else {
			$error_msg[] = 'Your mail could not be sent this time. ['.$points.']';
		}
	} else {
		if (empty($error_msg))
			$error_msg[] = 'Your mail looks too much like spam, and could not be sent this time. ['.$points.']';
	}
}
function get_data($var) {
	if (isset($_POST[$var]))
		echo htmlspecialchars($_POST[$var]);
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="author" href="humans.txt" />
        <meta name="robots" CONTENT="NOINDEX, NOFOLLOW">
         
        <title>Dominic Suddaby Fine Hand Made Walking Sticks</title>
        <meta name="description" content="Dominic Suddaby has been hand-making walking sticks and demonstrating his craft at country shows for over 25 years. Based in his workshop in rural Lincolnshire.">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

		<!-- Fixed navbar -->
        <div class="navbar navbar-fixed-top">
        	<div>
        		<div class="box1">
        		</div>
        		<div class="box2">
        		</div>
        		<div class="box3">
        		</div>
        		<div class="box4">
        		</div>
        	</div>

            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand aligncenter" href="#"><h1><span class="italic">Dominic Suddaby</span><br><small>Fine Hand Made Walking Sticks</small></h1></a>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li class="menu1 active"><a href="#home">Home</a></li>
                            <li><a href="#process">The Process</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#sundries">Sundries</a></li>
                            <li><a href="#feedback">Feedback</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
                    			<?php
			if (!empty($error_msg)) {
				echo '<div class="container message"><div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error: </strong> '. implode("<br />", $error_msg) . "</div></div>";
			}
			if ($result != NULL) {
				echo '<div class="container message"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success: </strong>'. $result . "</div></div>";
			}
		?>
        </div>

		<!-- Introduction Section -->
		<section class="intro" id="home">
			<div class="container">
				
				<div class="row">
					<div class="span6">
						<h2>Welcome to Dominic Suddaby Hand Made Walking Sticks</h2>
						<p class="lead"><strong>Dominic Suddaby</strong> has been hand-making walking sticks and demonstrating his craft at country shows for over 25 years.</p>
						<p>Based in his workshop in rural Lincolnshire, Dominic collects, seasons and fashions a range of fine traditional sticks using natural materials such as rams’ horn, deer antler and natural wood formations such as gnarled roots and ‘twisties’.</p>
						<p>The sticks fall into five broad categories: shepherds’ crooks, thumb sticks, short sticks, knob sticks and staffs but each one is entirely unique due to the natural materials used and the care that Dominic applies to matching heads to shanks to produce balanced and beautiful pieces that feel good in the hand and are strong enough to withstand the rigours of country life.</p>
					</div>
					<div class="span6 alignright">
						<img src="img/dominic.jpg" alt="Dominic Suddaby" width="400" height="533">
					</div>
				</div>
			</div>
		</section>
		
		<!-- The Process Section -->
		<section class="process" id="process">
			<div class="container">
				<h2 class="italic">The Process</h2>
				<p class="lead">People often ask “How long does it take to make a stick?”. There is no straightforward answer to this because it is a process which takes over 2 years to complete and consists of various stages. These are:</p>
				<div class="row">
					<div class="span12">
						<div id="process-slider" class="carousel slide custom2">
							<ul class="carousel-indicators aligncenter row-fluid">
								<li data-target="#process-slider" data-slide-to="0" class="active span3">
									<div class="round bg-color blue"><span>1</span></div>
									<div class="desc">Cutting or Harvesting</div>
								</li>
								<li data-target="#process-slider" data-slide-to="1" class="span3">
									<div class="round bg-color blue">2</div>
									<div class="desc">Seasoning</div>
								</li>
								<li data-target="#process-slider" data-slide-to="2" class="span3">
									<div class="round bg-color blue">3</div>
									<div class="desc">Making the Stick</div>
								</li>
								<li data-target="#process-slider" data-slide-to="3" class="span3">
									<div class="round bg-color blue">4</div>
									<div class="desc">Finishing</div>
								</li>
							</ul>
							<div class="carousel-inner clearfix">
								<div class="active item clearfix">
									<div class="row-fluid clearfix">
										<div class="span7 aligncenter">
											<img src="http://placehold.it/450x300&text=Cutting or Harvesting" width="450">
										</div>
										<div class="span5">
											<h2>1. Cutting or Harvesting</h2>
											<p>During the winter months Dominic <strong>scours local woodlands</strong> for suitable saplings and ‘formations’. He likes to work with Hazel, Blackthorn, Ash and Holly, and keeps a particular look-out for what he calls <strong>“twisties”</strong> – these are spiral sticks created by Honeysuckle.</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row-fluid clearfix">
										<div class="span5">
											<h2>2. Seasoning</h2>
											<p>The sticks are <strong>bundled and stored</strong> in a brick barn near the workshop. They remain here <strong>for two years to allow the wood to season.</strong></p>
										</div>
										<div class="span7 aligncenter">
											<img src="http://placehold.it/450x300&text=Seasoning" width="450">
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row-fluid clearfix">
										<div class="span6 aligncenter">
											<img src="img/making.jpg" alt="Making the Stick" width="400" height="300">
										</div>
										<div class="span6">
											<h2>3. Making the Stick</h2>
											<p>This is where the stickmaker’s skill and experience really come to the fore.  Most sticks are made from two pieces, the head (handle) and the shank. Dominic will <strong>carefully match two pieces that complement each other</strong> and are balanced so that they look beautiful but also feel good in the hand. The <strong>shank will be straightened through steaming</strong>, and <strong>peeled</strong> or <strong>shaped</strong> as necessary, then <strong>joined to the head</strong>.  A <strong>brass ferrule is added</strong> to the end of each stick to save it from wear and tear.</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row-fluid clearfix">
										<div class="span5">
											<h2>4. Finishing</h2>
											<p>The stick will be <strong>finished by hand</strong>, sanding and shaping it to give a smooth finish.  Sometimes stains are used to enhance and bring out the natural colours in the wood. Finally, it is <strong>given several coats of yacht varnish</strong> to ensure it is truly weatherproof.</p>
										</div>
										<div class="span7 aligncenter">
											<img src="http://placehold.it/450x300&text=Finishing" width="450">
										</div>
									</div>
								</div>
							</div>
							<a class="carousel-control left" href="#process-slider" data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right" href="#process-slider" data-slide="next">&rsaquo;</a>
						</div>
					</div>
			</div>
		</section><!-- End The Process Section -->
		
		<!-- Gallery Section -->
		<section class="gallery" id="gallery">
			<div class="container">
				<h2>Gallery</h2>
				<p class="lead">There are five main categories, and within each category the shanks can be made from different woods, and be either ‘straight’ or ‘twisty’. The photos below show just some of the permutations (combinations) available.   The height of the sticks varies but a long stick can easily be shortened to suit.  Sadly, we cannot do the reverse!</p>
                <!-- Slider -->
                <div class="row">
                	<div class="span12" id="slider">
                    	<!-- Top part of the slider -->
                        <div class="row">
                        	<div class="span12" id="carousel-bounding-box">
                            	<div id="myCarousel" class="carousel slide">
                                	<!-- Carousel items -->
                                    <div class="carousel-inner aligncenter">
                                    	<div class="active item" data-slide-number="0">
                                    		<img src="img/crooks.jpg" alt="Shepherds' Crooks" width="930" height="600">
                                    		<div class="carousel-caption">
	                                    		<h3>Shepherds' Crooks</h3>
	                                    		<p>A short description of shepherds crooks</p>
                                    		</div>
                                    	</div>
                                        <div class="item" data-slide-number="1">
                                        	<img src="img/thumbs.jpg" alt="Thumb Sticks" width="930" height="600">
                                        	<div class="carousel-caption">
	                                    		<h3>Thumb Sticks</h3>
	                                    		<p>A short description of thumb sticks</p>
                                    		</div>
                                        </div>
                                        <div class="item" data-slide-number="2">
                                        	<img src="http://placehold.it/930x400&text=Staffs" width="930" />
                                        	<div class="carousel-caption">
	                                    		<h3>Staffs</h3>
	                                    		<p>A short description of staffs</p>
                                    		</div>
                                        </div>
                                        <div class="item" data-slide-number="3">
                                        	<img src="img/shorts.jpg" alt="Short Sticks" width="930" height="600">
                                        	<div class="carousel-caption">
	                                    		<h3>Short Sticks</h3>
	                                    		<p>A short description of short sticks</p>
                                    		</div>
                                        </div>
                                    </div>
									<div class="visible-phone">
		                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
		                                <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
									</div>
	                            </div>
	                        </div>
						</div>
	                </div>
                </div> <!--/Slider-->

                <div class="row hidden-phone" id="slider-thumbs">
                	<div class="span10 offset2">
	                	<!-- Bottom switcher of slider -->
	                    <ul class="thumbnails">
	                    	<li class="span2">
	                            <a class="thumbnail" id="carousel-selector-0">
	                            	<img src="img/crooks-sm.jpg" alt="Shepherds' Crooks" width="170" height="100">
	                            	<div class="sliderthumb-caption">
	                                    <h4>Shepherds' Crooks</h4>
                                    </div>
	                            </a>
	                        </li>
	                        <li class="span2">
	                            <a class="thumbnail" id="carousel-selector-1">
	                            	<img src="img/thumbs-sm.jpg" alt="Thumb Sticks" width="170" height="100">
	                            	<div class="sliderthumb-caption single">
	                                    <h4>Thumb Sticks</h4>
                                    </div>
	                            </a>
	                        </li>
	                        <li class="span2">
	                            <a class="thumbnail" id="carousel-selector-2">
	                                <img src="http://placehold.it/170x100" />
	                                <div class="sliderthumb-caption single">
	                                    <h4>Staffs</h4>
                                    </div>
	                            </a>
	                        </li>
	                        <li class="span2">
	                            <a class="thumbnail" id="carousel-selector-3">
	                            	<img src="img/shorts-sm.jpg" alt="Short Sticks" width="170" height="100">
	                            	<div class="sliderthumb-caption single">
	                                    <h4>Short Sticks</h4>
                                    </div>
	                            </a>
	                        </li>
	                    </ul>
                	</div>
                </div>
			</div>
		</section><!-- End Gallery Section -->
		
		<!-- Sundries Section -->
		<section class="sundries" id="sundries">
			<div class="container">
				<div class="intro">
					<h2 class="italic">Sundries</h2>
					<p class="lead">For anyone who would like to make their own stick, we can supply various component pieces, and for those who don’t have too much time to spare, Dominic has prepared some sticks that are ‘made’ but need finishing (that is the final sanding and varnishing). Please enquire if you are interested in buying any of the following materials.</p>
					<div class="aligncenter">
						<a class="btn btn-large btn-primary" type="button" href="#contact">Get in touch</a>
					</div>
				</div>
				<div class="row">
					<div class="span2 offset1">
						<div class="aligncenter">
							<img src="http://placehold.it/200x200&text=image" class="img-circle">
							<h3>Antler Pieces</h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="img/sundries/ramshorn.jpg" alt="Rams' horn" width="200" height="200" class="img-circle">
							<h3>Rams’ horn</h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="http://placehold.it/200x200&text=image" class="img-circle">
							<h3>Buffalo horn</h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="img/sundries/wooden-handles.jpg" alt="Wooden handles" width="200" height="200" class="img-circle">
							<h3>Wooden handles</h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="img/sundries/shanks.jpg" alt="Stick Shanks" width="200" height="200" class="img-circle">
							<h3>Stick shanks</h3>
							<p>various types of wood, ie. hazel, ash, blackthorn</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span2 offset1">
						<div class="aligncenter">
							<img src="img/sundries/antler-thumbs.jpg" alt="Antler thumb heads" width="200" height="200" class="img-circle">
							<h3>Wooden and antler thumb heads</h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="img/sundries/ferrules.jpg" alt="Ferrules" width="200" height="200" class="img-circle">
							<h3>Ferrules</h3>
							<p>brass, rubber & alpine</p>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="http://placehold.it/200x200&text=image" class="img-circle">
							<h3>Ready made sticks for finishing </h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="img/sundries/whistles.jpg" alt="Antler Wistles" width="200" height="200" class="img-circle">
							<h3>Antler Whistles</h3>
						</div>
					</div>
					<div class="span2">
						<div class="aligncenter">
							<img src="http://placehold.it/200x200&text=image" class="img-circle">
							<h3>Leather Aprons</h3>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End Sundries Section -->
		
		<section class="feedback" id="feedback">
			<div class="container">
				<h2 class="italic">Feedback from Customers</h2>
				<div class="row">
					<div class="span7">
						<blockquote>
							<p>Do tonx sunt assumenda, consequat fingerstache minim single-origin coffee pariatur street art pickled cillum. Truffaut cupidatat keytar scenester readymade.</p>
							<small>John Smith <cite title="Source Title">Derbyshire</cite></small>
						</blockquote>
						
						<blockquote>
							<p>Do tonx sunt assumenda, consequat fingerstache minim single-origin coffee pariatur street art pickled cillum. Truffaut cupidatat keytar scenester readymade.</p>
							<small>John Smith <cite title="Source Title">Derbyshire</cite></small>
						</blockquote>
						
						<blockquote>
							<p>Do tonx sunt assumenda, consequat fingerstache minim single-origin coffee pariatur street art pickled cillum. Truffaut cupidatat keytar scenester readymade.</p>
							<small>John Smith <cite title="Source Title">Derbyshire</cite></small>
						</blockquote>
					</div>
					<div class="span5 aligncenter">
						<img src="img/workshop.jpg" alt="Workshop" width="300" height="300">
					</div>
			</div>
		</section><!-- End Feedback Section -->
		
		<!-- Contact Section -->
		<section class="contact" id="contact">
			<div class="container">
				<h2 class="italic">Contact Us</h2>
				<p class="lead">We would love to hear from you</p>
			</div>
			<div class="contact-details">
				<div class="container">
					<div class="row">
						<div class="span4 aligncenter">
							<img src="img/hammer.jpg" alt="Hammer" width="300" height="200">
						</div>
						<div class="span4">
							<span class="icon-stack icon-3x pull-left">
								<i class="icon-circle icon-stack-base"></i>
								<i class="icon-home icon-light"></i>
							</span>
							<h3>Address</h3>
							<address>
								<strong>Dominic Suddaby</strong><br>
								Coppice House<br>
								Brigg Road<br>
								MOORTOWN<br>
								Lincs<br>
								LN7 6JA<br>
							</address>
						</div>
						<div class="span4">
							<span class="icon-stack icon-3x pull-left">
								<i class="icon-circle icon-stack-base"></i>
								<i class="icon-phone icon-light"></i>
							</span>
							<h3>Phone</h3>
							<address>
								Tel. 01652 678442
							</address>
							<br>
							<span class="icon-stack icon-3x pull-left">
								<i class="icon-circle icon-stack-base"></i>
								<i class="icon-envelope icon-light"></i>
							</span>
							<h3>Email</h3>
							<address>
								<a href="mailto:info@dominicsuddaby.co.uk">info@dominicsuddaby.co.uk</a>
							</address>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<!-- Contact Form -->
					<div class="span8">
						<div class="row">
							<div class="span6 offset2">
								<h2>Send Us a Message</h2>
							</div>
						</div>
						<form id="myform" class="contact_form" action="<?php echo basename(__FILE__); ?>" method="post" name="contact_form">
							<noscript>
								<p><input type="hidden" name="nojs" id="nojs" /></p>
							</noscript>
							<div class="row">
							    <label class="control-label span2" for="name">Name:</label>
							    <div class="controls span6">
									<input data-toggle="tooltip" title="first tooltip" type="text" name="name" id="name" value="<?php get_data("name"); ?>" placeholder="John Doe" required />
								</div>
							</div>
							<div class="row">
								<label class="control-label span2" for="email">E-mail:</label>
							   	<div class="controls span6">
							   		<input type="email" name="email" id="email" value="<?php get_data("email"); ?>" placeholder="john_doe@example.com" data-toggle="popover" title="" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title" required />
							   		<div class="popover fade right in"><div class="arrow"></div><h3 class="popover-title">A Title</h3><div class="popover-content">And here's some amazing content. It's very engaging. right?</div></div>
							        <!--<span class="form_hint">Proper format "name@something.com"</span>-->
							   	</div>
							</div>
							<div class="row">
							   	<label class="control-label span2" for="comments">Comments:</label>
							   	<div class="controls span6">
							   		<textarea name="comments" id="comments" rows="8" required ><?php get_data("comments"); ?></textarea>
							   	</div>
						    </div>
							<div class="row">
								<div class="controls span2 offset2">
									<button id="submit" type="submit" class="btn btn-submit" name="submit" value="submit" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?>>Send Message</button>
									<!--<input id="submit" class="submit" type="submit" name="submit" value="Submit" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?>>-->
								</div>
						    </div>
						</form><!-- End of Contact Form -->
					</div>
					<div class="span4">
						<img src="img/making2.jpg" alt="Dominic Suddaby" width="300" height="350">
					</div>	
				</div>
			</div>	
		</section><!-- End Contact Section -->
		
		<!-- Footer Section -->
        <footer>
        	<div class="container">
        		<p>&copy; Copyright 2013 <a href="http://www.perspectivedesign.co.uk" target="new">Perspective Design</a></p>
        	</div>
        </footer><!-- End Footer Section -->
          
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
         <script src="js/vendor/jquery.inview.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
        <script>
		  jQuery(document).ready(function($) {
		 
		        $('#process-slider').carousel({
		                interval: 20000
		        });
		 
		        //Handles the carousel thumbnails
		        $('[id^=carousel-selector-]').click( function(){
		                var id_selector = $(this).attr("id");
		                var id = id_selector.substr(id_selector.length -1);
		                var id = parseInt(id);
		                $('#myCarousel').carousel(id);
		        });		 
		});
		</script>
		
		<script>
		    $('.container').bind('inview', function(event, visible) {
		      if (visible) {
		        $(this).stop().animate({ opacity: 1 });
		      } else {
		        $(this).stop().animate({ opacity: 0 });
		      }
		    });
		</script>
		  
		<script>
		$('#myform').on('submit', function(ev) {
	    	$('#myModal').modal('show'); 
	
	    var data = $(this).serializeObject();
	    json_data = JSON.stringify(data);
	    $("#results").text(json_data); 
	    $(".modal-body").text(json_data); 
	
	    // $("#results").text(data);
	
	    ev.preventDefault();
	    });
	    </script>

    </body>
</html>
