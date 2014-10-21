<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--[if IE]>         <html class="lt-ie"> <![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>calenderPage</title>
    <meta name="description" content="">
    <link rel="icon" href="#" type="image/x-icon" />
    <link rel="shortcut icon" href="http://themetalworks.ca/favicon.ico" type="image/x-icon" />


    <link rel="stylesheet" href="style/css/main.css">

        
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>

<div class="body_container">
</div>

<div class="calendar-title-container">
        Enter available dates
</div>

<div class="cal-ajax-container">

</div>
    
    
<a href="#" class="submit_btn">
    done!
</a>



<script type="text/javascript">

    var calID;

    function makeid()
    {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 5; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }


    var dateArray = [];
    var date = new Date();
    var init_month = date.getMonth()+1;

    $(document).ready(function() {
        $.post( "cal.php", { month: init_month})
            .done(function( data ) {
             $('.cal-ajax-container').html(data);
        });
            calID = makeid();
    });


    $( 'body' ).on('click', '.change-month-btn', function(e) {
        e.preventDefault();
        var dir = $(this).data('dir');
        if (dir === "next") {
            init_month++;
            $.post( "cal.php", { month: init_month})
                .done(function( data ) {
                 $('.cal-ajax-container').html(data);
                 $( "a.day-number" ).each(function( index ) {
                        console.log(index);
                        if (dateArray.indexOf($(this).data("date")) !== -1 ) {
                            console.log("found match!");
                            $(this).addClass("selected");
                        }
                });
            });
        } else {
            init_month--;
            $.post( "cal.php", { month: init_month})
                .done(function( data ) {
                 $('.cal-ajax-container').html(data);
                 $( "a.day-number" ).each(function( index ) {
                        if (dateArray.indexOf($(this).data("date"))!== -1 ) {
                            $(this).addClass("selected");
                        }
                });
            });
        }
    });

    var i = 0;
    $('body').on('click', 'a.day-number', function(e) {
        e.preventDefault();
        var $this = $(this);
        console.log("clicked!");
        if ($this.hasClass('selected')) {
            i = dateArray.indexOf($(this).data("date"));
            dateArray.splice(i, 1);
            $this.removeClass('selected');
        }
        else {
            $this.addClass('selected');
            dateArray.push($(this).data("date"));
            //console.log( index + ": " + $( this ).text() );
        }
    });

    $('body').on('click', 'a.submit_btn', function(e) {
        e.preventDefault();
        console.log("hello");
        $( "a.day-number.selected" ).each(function( index ) {
            
        });

        var elements = ["overlord", "firebender", "apple-123", "google"].join(',');
        dateArray = dateArray.join(',');
        console.log(elements);
        console.log(dateArray);
        
        $.post( "../newEvent.php", { passedArray: dateArray, passedSN: calID })
            .done(function( data ) {
             console.log( "Data Loaded: " + data );
             window.location = "contacts.php?id="+calID;
        });

    });

</script>

</body>

        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
        
        <script src="js/plugins.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="http://acuityplatform.com/Adserver/pxlj/7641413907434731004?" type="text/javascript" async ></script>
        <script src="js/jquery.swipeshow.js"></script>    
        <script src="js/jquery.scrollTo.js"></script>


        <script>
            function loadVideo() {
              var iframe = $('#player1')[0],
              player = $f(iframe);
              player.api('setColor', '997d3d');

              player.addEvent('ready', function() {
                $('.innerVideo').click(function() {
                  $('.hideMe').css('opacity', '1');
                  player.api('play');

                  $('.innerVideo').fadeOut(800);
                });

              player.addEvent('finish', onFinish);
              });

              function onFinish(id) {
                 $('.hideMe').css('opacity', '0');
                 $('.innerVideo').fadeIn(800);
              }

            } // loadVideo


            if ($('.innerVideo').length > 0) {
                loadVideo();
            }
        </script>

        <script>
            var _gaq=[['_setAccount','UA-*******'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>