<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	
	<title>Sam Penrose</title>

	<link rel="apple-touch-icon-precomposed" href="/icon.png" />
	<link rel="shortcut icon" href="/icon.png?<?php echo time(); ?>" />
	
	<link rel="stylesheet" href="/css/style.css" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	
	<script>
		$(document).ready(function() {

			$("a[rel=gallery]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">' + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
			
			$(".email-link").fancybox();
		
		});
		
	</script>
	
	<script type="text/javascript" src="http://use.typekit.com/eey0lsm.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body<?php echo (isset($pageID)) ? ' id="' . $pageID . '"' : null; ?>>

	<div id="header">
	
		<ul id="nav">
			
			<li class="nav-home"><a href="/">Home</a></li>
			<li class="nav-about"><a href="/about/">About</a></li>
			<li class="nav-portfolio"><a href="/portfolio/">Portfolio</a></li>
			<li><a href="/contact/" class="email-link">Contact</a></li>
			
		</ul>
	
	</div>
		
	<div id="content">