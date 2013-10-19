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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script> 
	    <script src="http://malsup.github.com/jquery.form.js"></script> 
	 
	    <script> 
	        // wait for the DOM to be loaded 
	        $(document).ready(function() { 
	            // bind 'myForm' and provide a simple callback function 
	            $('#myForm').ajaxForm(function() { 
	                alert("Thank you for your comment!"); 
	            });
	        }); 
	    </script>
    </head>
    <body>
    	<form id="myForm" class="contact_form" name="contact_form" action="comment.php" method="post"> 
		    <noscript>
				<p><input type="hidden" name="nojs" id="nojs" /></p>
			</noscript>
		    Name: <input type="text" name="name" /> 
		    Comment: <textarea name="comment"></textarea> 
		    <input type="submit" value="Submit Comment" /> 
		</form>
			
			<div class="row">
			    <label class="control-label span2" for="name">Name:</label>
			    <div class="controls span6">
					<input data-toggle="tooltip" title="first tooltip" type="text" name="name" id="name" value="" placeholder="John Doe" required />
				</div>
			</div>
			<div class="row">
				<label class="control-label span2" for="email">E-mail:</label>
			   	<div class="controls span6">
			   		<input type="email" name="email" id="email" value="" placeholder="john_doe@example.com" data-toggle="popover" title="" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title" required />
			   		<div class="popover fade right in"><div class="arrow"></div><h3 class="popover-title">A Title</h3><div class="popover-content">And here's some amazing content. It's very engaging. right?</div></div>
			        <!--<span class="form_hint">Proper format "name@something.com"</span>-->
			   	</div>
			</div>
			<div class="row">
			   	<label class="control-label span2" for="comments">Comments:</label>
			   	<div class="controls span6">
			   		<textarea name="comments" id="comments" rows="8" required ></textarea>
			   	</div>
		    </div>
			<div class="row">
				<div class="controls span2 offset2">
					<button id="submit" type="submit" class="btn btn-submit" name="submit" value="submit" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?>>Send Message</button>
				</div>
		    </div>
		</form><!-- End of Contact Form -->
	</body>
</html>