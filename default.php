<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0)
{
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>.:* Admin LK3 Petrokimia Gresik *:.</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../../../html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

</head>

<body>
<div id="login_page"> 
  <!-- Login page -->
  <div id="login">
    <div class="row-fluid fluid">
      <div class="span5"> <img src="img/user.png" /> </div>
      <div class="span7">
        <div class="title"><span class="name">Login</span><span class="subtitle"></span></div>
		
        <form class="form-search" action="ceklogin.php" method="post">
			<div class="input-append row-fluid">
				<input type="text" name="username"class="row-fluid search-query" placeholder="Username"></br>
			</div>
			<div class="input-append row-fluid">
				<input type="password" name="password" class="row-fluid search-query" placeholder="Password">
				<div>
					<input type="submit"class="btn color_4" value="ok">
					<!--<a href="#" class="btn color_4">Got</a>--> 
				</div>
			</div>
        </form>
        <div style="color:white;">
          admin <br>
          - id : admin   <br>
          - pass : admin <br>
          user  <br>
          - id : user <br>
          - pass : user <br>

        </div>

      </div>
    </div>
  </div>
  <!-- End #login --> 
  <!-- <img src="img/ajax-loader.gif"> --> 
</div>
<!-- End #loading --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<!-- Flip effect on login screen --> 
<!--<script type="text/javascript" src="../../../ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min"></script> 
<script type="text/javascript" src="js/plugins/jquerypp.custom.js"></script> 
<script type="text/javascript" src="js/plugins/jquery.bookblock.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script type="text/javascript">
      $(function() {
        var Page = (function() {

          var config = {
              $bookBlock: $( '#bb-bookblock' ),
              $navNext  : $( '#bb-nav-next' ),
              $navPrev  : $( '#bb-nav-prev' ),
              $navJump  : $( '#bb-nav-jump' ),
              bb        : $( '#bb-bookblock' ).bookblock( {
                speed       : 800,
                shadowSides : 0.8,
                shadowFlip  : 0.7
              } )
            },
            init = function() {

              initEvents();
              
            },
            initEvents = function() {

              var $slides = config.$bookBlock.children(),
                  totalSlides = $slides.length;

              // add navigation events
              config.$navNext.on( 'click', function() {
              $("#arrow_register").fadeOut();
              $(".not-member").slideUp();
              $(".already-member").slideDown();
                config.bb.next();
                return false;

              } );

              config.$navPrev.on( 'click', function() {

                 $(".not-member").slideDown();
                $(".already-member").slideUp();
                config.bb.prev();
                return false;

              } );

              config.$navJump.on( 'click', function() {
                
                config.bb.jump( totalSlides );
                return false;

              } );
              
              // add swipe events
              $slides.on( {

                'swipeleft'   : function( event ) {
                
                  config.bb.next();
                  return false;

                },
                'swiperight'  : function( event ) {
                
                  config.bb.prev();
                  return false;
                  
                }

              } );

            };

            return { init : init };

        })();

        Page.init();

      });
    </script> 
<script type='text/javascript'>
 
    $(window).load(function() {
     $('#loading1').fadeOut();
    });
      $(document).ready(function() {
           $("input:checkbox, input:radio, input:file").uniform();


      $('[rel=tooltip]').tooltip();
      $('body').css('display', 'none');
      $('body').fadeIn(500);

      $("#logo a, #sidebar_menu a:not(.accordion-toggle), a.ajx").click(function() {
        event.preventDefault();
        newLocation = this.href;
        $('body').fadeOut(500, newpage);
        });
        function newpage() {
        window.location = newLocation;
        }
      });
      
    

    </script>
</body>
</html>
<?php 
	} 
	else
	{
		echo "<script>window.location='index.php'</script>";
	} 

?>