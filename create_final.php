<html>
<head>
	<title>FLOP</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	 <link rel="stylesheet" href="style/css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<div class="contactContainer">

	<h1 class="end">You've successfully just created a <span class="flop_text">Flop!</span></h1>
	<div class="conclusion"><p>Click on the icon below to e-mail yourself the results link!</p></div>
	
	<a href="mailto:?Subject=FLOP%21%20Results&amp;Body=Hey%20there%21%0A%0ACongrats%20on%20creating%20a%20Flop%21%20View%20your%20results%20here%3A%0A%3Ca%20href%3D%22http%3A//atleusdigital.com/flop/sam/justin/results.html%3Fid%3Dx4751%22%3EView%20Flop%3C/a%3E%0A%0ANo%20Flopping%21" class="mail"><img src="img/envelope.png" width="100px"></a>
</div>

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

   	$('a.mail').each( function( index ) {
   		$(this).attr('href', 'mailto:?Subject=FLOP%21%20Results&Body=Hey%20there%21%0A%0ACongrats%20on%20creating%20a%20Flop%21%20View%20your%20results%20here%3A%0A%3Ca%20href%3D%22http%3A//atleusdigital.com/flop/results.html%3Fid%3D'+urlParams.id+'%22%3EView%20Flop%3C/a%3E%0A%0ANo%20Flopping%21');
   	})	

</script>
</body>
</html>