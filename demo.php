<?php include 'form.php'; ?>

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
                    <a class="brand aligncenter" href="#"><h1><span class="italic branditalic">Dominic Suddaby</span><br><small>Fine Hand Made Walking Sticks</small></h1></a>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li class="menu1 active"><a href="#home">Home</a></li>
                            <li><a href="#process">The Process</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#sundries">Sundries</a></li>
                            <li><a href="#shows">Shows</a></li>
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
						<p class="lead"><strong>Dominic Suddaby</strong> has been hand-making walking sticks and demonstrating his craft at country shows for over 25 years, supplying sticks to numerous UK and international customers.</p>
						<p>Based in his workshop in rural Lincolnshire, Dominic collects, seasons and fashions a range of fine traditional sticks using natural materials such as rams’ horn, deer antler and natural wood formations such as gnarled roots and ‘twisties’.</p>
						<p>The sticks fall into four broad categories: shepherds’ crooks, thumb sticks, staffs and short sticks with each stick being entirely unique due to the natural materials used. Dominic carefully matches each head and shank to produce balanced and beautiful pieces that feel good in the hand and are strong enough to withstand the rigours of country life.</p>
					</div>
					<div class="span6 alignright">
						<img src="img/dominic-captioned.png" alt="Dominic Suddaby" width="400" height="623">
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
											<img class="sizefix" src="img/harvesting.jpg" alt="Harvesting" width="450" height="300">
										</div>
										<div class="span5">
											<h2>1. Cutting or Harvesting</h2>
											<p>During the winter months Dominic scours local woodlands for suitable saplings and ‘formations’, coppicing carefully to ensure sustainability. He likes to work with Hazel, Blackthorn, Ash and Holly, and keeps a particular look-out for what he calls “twisties” – these are spiral sticks created when Honeysuckle grows around a young sapling.</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row-fluid clearfix">
										<div class="span5">
											<h2>2. Seasoning</h2>
											<p>The sticks are bundled and stored in a brick barn near the workshop. They remain here for two years to allow the wood to season.</p>
										</div>
										<div class="span7 aligncenter">
											<img class="sizefix" src="img/seasoning.jpg" alt="Seasoning" width="450" height="300">
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row-fluid clearfix">
										<div class="span6 aligncenter">
											<img class="sizefix" src="img/making.jpg" alt="Making the Stick" width="400" height="300">
										</div>
										<div class="span6">
											<h2>3. Making the Stick</h2>
											<p>This is where the stickmaker’s skill and experience really come to the fore.  Most sticks are made from two pieces, the head (handle) and the shank. Dominic will carefully match two pieces that complement each other and are balanced so that they look beautiful but also feel good in the hand. The shank is straightened through steaming, and peeled or shaped as required. A ferrule (usually brass) is added to the end of each stick to save it from wear and tear.</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row-fluid clearfix">
										<div class="span5">
											<h2>4. Finishing</h2>
											<p>The stick is finished by hand, sanding and shaping it to give a smooth finish.  Sometimes stains are used to enhance and bring out the natural colours in the wood. Finally, it is given several coats of yacht varnish to ensure it is truly weatherproof.</p>
										</div>
										<div class="span7 aligncenter">
											<img class="sizefix" src="img/finishing.jpg" alt="Finishing" width="450" height="300">
										</div>
									</div>
								</div>
							</div>
							<a class="carousel-control left" href="#process-slider" data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right" href="#process-slider" data-slide="next">&rsaquo;</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End The Process Section -->

		<!-- Gallery Section -->
		<section class="gallery" id="gallery">
			<div class="container">
				<h2>Gallery</h2>
				<p class="lead">There are four main categories, and within each category the shanks can be made from different woods, and be either ‘straight’ or ‘twisty’. The height of the sticks varies but a long stick can easily be shortened to suit. The photos below show just some examples.</p>
                <!-- Slider -->
                <div class="row">
                	<div class="span12" id="slider">
                    	<!-- Top part of the slider -->
                        <div class="row">
                        	<div class="span8" id="carousel-bounding-box">
                            	<div id="myCarousel" class="carousel slide">
                                	<!-- Carousel items -->
                                    <div class="carousel-inner">
                                    	<div class="active item gallery" data-slide-number="0"><img src="img/gallery/crooks.jpg" alt="Crooks" width="770" height="517"></div>
                                        <div class="item gallery" data-slide-number="1"><img src="img/gallery/thumbs.jpg" alt="Thumb Sticks" width="770" height="517"></div>
                                        <div class="item gallery" data-slide-number="2"><img src="img/gallery/staffs.jpg" alt="Staffs" width="770" height="517"></div>
                                        <div class="item gallery" data-slide-number="3"><img src="img/gallery/shorts.jpg" alt="Shorts" width="770" height="517"></div>
                                    </div>
                                    <!-- Carousel nav -->
                                    <a class="carousel-control left visible-phone" href="#myCarousel" data-slide="prev">‹</a>
                                    <a class="carousel-control right visible-phone" href="#myCarousel" data-slide="next">›</a>
								</div>
							</div>
							<div class="span4" id="carousel-text"></div>
							<div style="display: none;" id="slide-content">
								<div id="slide-content-0">
									<h2>Shepherds' Crooks</h2>
									<p>As the name suggests, these are sticks with 'crook' handles originally used by shepherds but popular today with farmers, shooters and walkers. The head can be wooden (turned or natural) or made from rams' horn, or black buffalo horn.</p>
								</div>
								<div id="slide-content-1">
									<h2>Thumb Sticks</h2>
									<p>These have a "V" shaped head and are also known as 'snake sticks'. Dominic likes to make the head from natural wooden pieces or deer antler but a few are also made from turned wood and buffalo horn. Occasionally, a piece lends itself to having one half of the 'V' made into a whistle.</p>
								</div>
								<div id="slide-content-2">
									<h2>Staffs</h2>
									<p>The traditional hiking stick of the countryman usually has a knob or antler head. They vary in height from the waist to, most typically, the chest.</p>
								</div>
								<div id="slide-content-3">
									<h2>Short Sticks</h2>
									<p>These tend to be sticks up to waist height with a knob or horizontal handle, used to give support when walking. They can be made with wooden handles (either natural pieces or turned polished tops), deer antler, rams' horn and buffalo horn.</p>
								</div>
							</div>
						</div>

					</div>
				</div> <!--/Slider-->
			</div>
		
		<div class="gallery-selector">
			<div class="container">						
				<div class="row hidden-phone" id="slider-thumbs">		
					<!-- Bottom switcher of slider -->
					<div class="span3">
                        <a class="thumbnail" id="carousel-selector-0">
                        	<img src="img/gallery/crooks-sm.jpg" alt="Shepherds' Crooks" width="170" height="100">
                        	<div class="sliderthumb-caption">
                                <h4>Shepherds' Crooks</h4>
                            </div>
                        </a>
					</div>
					<div class="span3">
                        <a class="thumbnail" id="carousel-selector-1">
                        	<img src="img/gallery/thumbs-sm.jpg" alt="Thumb Sticks" width="170" height="100">
                        	<div class="sliderthumb-caption">
                                <h4>Thumb Sticks</h4>
                            </div>
                        </a>
					</div>
					<div class="span3">
                        <a class="thumbnail" id="carousel-selector-2">
                            <img src="img/gallery/staffs-sm.jpg" alt="Staffs" width="170" height="100">
                            <div class="sliderthumb-caption">
                                <h4>Staffs</h4>
                            </div>
                        </a>
					</div>
					<div class="span3">
                        <a class="thumbnail" id="carousel-selector-3">
                        	<img src="img/gallery/shorts-sm.jpg" alt="Short Sticks" width="170" height="100">
                        	<div class="sliderthumb-caption">
                                <h4>Short Sticks</h4>
                            </div>
                        </a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="gallery-footer">
			<div class="container">
				<div class="row disclaimer">
					<div class="span12">
	                	<p class="lead">Because our sticks are all unique we do not offer online shopping, but if you would like to buy a stick, please contact us. We can then discuss your requirements and show you a selection of photographs to help you choose your ideal stick.</p>
					</div>
					<div class="aligncenter">
						<a class="btn btn-large btn-gallery" type="button" href="#contact">Get in touch</a>
					</div>
				</div>
			</div>
		</div>
		
		</section><!-- End Gallery Section -->
		
		<!-- Sundries Section -->
		<section class="sundries" id="sundries">
			<div class="container">
				<div class="intro">
					<h2 class="italic">Sundries</h2>
					<p class="lead">For anyone who would like to make their own stick, we have a limited supply of component pieces, and for those who don’t have too much time to spare, Dominic has prepared some sticks that are ‘made’ but need finishing (that is the final sanding and varnishing). Please enquire if you are interested in buying any of the following materials.</p>
				</div>
				<div class="row">
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/shanks2.jpg" alt="Stick Shanks" width="200" height="200" class="img-circle">
							<h3>Shanks</h3>
							<p class="sub">(straight, twisty, hazel, ash, blackthorn)</p>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/ready-made.jpg" alt="ready-made" width="200" height="200" class="img-circle">
							<h3>Part-made sticks for finishing</h3>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/whistles.jpg" alt="Antler Wistles" width="200" height="200" class="img-circle">
							<h3>Antler whistles</h3>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/aprons.jpg" alt="aprons" width="200" height="200" class="img-circle">
							<h3>Suede aprons</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/leather-straps.jpg" alt="Leather straps" width="200" height="200" class="img-circle">
							<h3>Leather straps</h3>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/ferrules2.jpg" alt="Ferrules" width="200" height="200" class="img-circle">
							<h3>Ferrules</h3>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/wooden-handles2.jpg" alt="Wooden handles" width="200" height="200" class="img-circle">
							<h3>Wooden handles</h3>
							<p class="sub">(turned)</p>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/antler-heads.jpg" alt="Antler heads" width="200" height="200" class="img-circle">
							<h3>Antler heads</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/buffalo-horn.jpg" alt="Buffalo horn" width="200" height="200" class="img-circle">
							<h3>Buffalo & Cow horn pieces</h3>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/ramshorn.jpg" alt="Rams' horn" width="200" height="200" class="img-circle">
							<h3>Rams’ horn</h3>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/thumb-heads.jpg" alt="Thumb heads" width="200" height="200" class="img-circle">
							<h3>Thumb heads</h3>
							<p class="sub">(natural wood & antler)</p>
						</div>
					</div>
					<div class="span3">
						<div class="aligncenter">
							<img src="img/sundries/antler.jpg" alt="Antler pieces" width="200" height="200" class="img-circle">
							<h3>Miscellaneous Antler pieces</h3>
							<p class="sub">(full antlers to small tines)</p>
						</div>
					</div>
					<div class="aligncenter">
						<a class="btn btn-large btn-primary" type="button" href="#contact">Get in touch</a>
					</div>
				</div>
			</div>
		</section><!-- End Sundries Section -->

		<!-- Shows Section -->
		<section class="shows" id="shows">
			<div class="container">
				<h2 class="italic">Shows</h2>
				<p class="lead">Dominic has been demonstrating his craft at country shows and game fairs for over 25 years. These are just some of the shows he has attended.</p>
				<div class="row">
					<div class="span6">
						<ul>
							<li>CLA Game Fair</li>
							<li>Badminton Horse Trials</li>
							<li>Burleigh Horse Trials</li>
							<li>Chatsworth Country show</li>
							<li>Ely Cathedral Christmas Craft show</li>
							<li>The Great Yorkshire show</li>
							<li>Henley show</li>
							<li>Herts County show </li>
							<li>Holkham Hall Game Fair</li>
							<li>Malvern Autumn Fair</li>
							<li>Newbury show</li>
							<li>Royal Norfolk show</li>
							<li>Royal Welsh show</li>
							<li>Rutland show</li>
							<li>South of England show (Ardingly)</li>
							<li>Stonor Park Craft Fair</li>
							<li>Suffolk show</li>
						</ul>
					</div>
					<div class="span6 aligncenter">
						<img src="img/shows2.jpg" alt="Dominic Suddaby" width="300" height="350">
					</div>
			</div>
		</section><!-- End of Shows Section -->

		<!-- Feedback Section -->
		<section class="feedback" id="feedback">
			<div class="container">
				<h2 class="italic">Feedback from Customers</h2>
				<div class="row">
					<div class="span7">
						<blockquote>
							<p>I am writing to thank you for sending the walking stick in time for my grandfather’s birthday. He is over the moon with it and although 75 years old he still walks our two dogs up and around the mountain every day. And, believe me, a walking stick is vital on the slippery slopes. I would also like to stress that it is great to be able to have a proper walking stick made by a craftsman – not one of those shiny things or, even worse, those soul-less metal extendable things!</p>
							<small>L Jones, <cite title="Source Title">Wales</cite></small>
						</blockquote>
						
						<blockquote>
							<p>I have just received the walking stick and I am absolutely delighted with it! It is perfect in every way, thank you so much. I shall recommend you to others.</p>
							<small>K. Pirkis, <cite title="Source Title">Suffolk</cite></small>
						</blockquote>
						
						<blockquote>
							<p>Thank you for the sticks which have been a success and a surprise.   Everyone was very happy to receive such unusual objects and I think I will order a few more next year.</p>
							<small>E Lepic, <cite title="Source Title">France</cite></small>
						</blockquote>
						
						<blockquote>
							<p>Thank you for such a beautiful walking stick.  My husband was delighted with the gift, particularly as it has already caused much comment among his friends, and is also thoroughly sturdy over rough ground.</p>
							<small>S MacDonald, <cite title="Source Title">Lincolnshire</cite></small>
						</blockquote>
						
						<blockquote>
							<p>Your walking sticks are so beautiful.</p>
							<small>Henley Show Manager</small>
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
								</div>
						    </div>
						</form><!-- End of Contact Form -->
					</div>
					<div class="span4">
						<img src="img/shows.jpg" alt="shows" width="300" height="420">
					</div>	
				</div>
			</div>	
		</section><!-- End Contact Section -->
		
		<!-- Footer Section -->
        <footer>
        	<div class="container">
        		<div class="row">
        			<div class="span6">
        				<p class="accred">Images by<br><span class="white">Jane Rayner Photography / </span><a href="http://www.nh97.com/wp/" target="new">Neil Holmes Photography</a></p>
        			</div>
        			<div class="span6">
        				<p class="perspec">&copy; Copyright 2013 <a href="http://www.perspectivedesign.co.uk" target="new">Perspective Design</a></p>
        			</div>
        		</div>
        	</div>
        </footer><!-- End Footer Section -->
        
        <script src="js/scripts-ck.js"></script>

		<!-- Google Analytics Code -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
