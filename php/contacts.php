<html>
<head>
	<title>FLOP</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="styles/main.css">
</head>
<body>

<ul class="contact-list">
	<li><a class="contact-slide">Samuel Wu</a></li>
	<li><a class="contact-slide">Pansy Cheung</a></li>
	<li><a class="contact-slide">Justin Cuaresma</a></li>
	<li><a class="contact-slide">Barack Obama</a></li>
	<li><a class="contact-slide">Rayhan Vevaina</a></li>
	<li><a class="contact-slide">Kanye West</a></li>
	<li><a class="contact-slide">Miley Cyrus</a></li>
</ul>

<script type="text/javascript">
	// find out url query params
	var urlParams;
	(window.onpopstate = function() {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query)) {
       urlParams[decode(match[1])] = decode(match[2]);
   	}

   		})();

   	$('a.contact-slide').each( function( index ) {
   		$(this).attr('href', 'mailto:justincuaresma@gmail.com?Subject=FLOP%21%20New%20event%21&Body=Hey%20there%21%0A%0AI%20created%20a%20new%20event%21%20Let%20me%20know%20which%20days%20work%20for%20you%21%0A%3Ca%20href%3D%22http%3A//atleusdigital.com/flop/sam/justin/inivitee.html%3Fid%3D'+urlParams.id+'%22%3EView%20Flop%3C/a%3E%0A%0ANo%20Flopping%21');
   	})
</script>

</body>
</html>