<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]--><head>

        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>Hela <?php
if (isset($projects)) {
     if (sizeof($projects) > 0){
		echo $county[0];
	}
}
?></title>   

        <meta name="description" content="Insert Your Site Description" /> 
		<link href="<?php echo base_url(); ?>application/.htaccess">
        <!-- Mobile Specifics -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="true"/>
        <meta name="MobileOptimized" content="320"/>   

        <!--Internet Explorer -->

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Main Style -->
        <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">

        <!-- Supersized -->
        <link href="<?php echo base_url(); ?>css/supersized.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/supersized.shutter.css" rel="stylesheet">

        <!-- FancyBox -->
        <link href="<?php echo base_url(); ?>css/fancybox/jquery.fancybox.css" rel="stylesheet">

        <!-- Font Icons -->
        <link href="<?php echo base_url(); ?>css/fonts.css" rel="stylesheet">

        <!-- Shortcodes -->
        <link href="<?php echo base_url(); ?>css/shortcodes.css" rel="stylesheet">

        <!-- Responsive -->
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">

        <!-- Supersized -->
        <link href="<?php echo base_url(); ?>css/supersized.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/supersized.shutter.css" rel="stylesheet">

        <!-- Google Font -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

        <!-- Fav Icon -->
        <link rel="shortcut icon" href="#">
        
        <link href="http://foo.com/bar.html#disqus_thread">

        <link rel="apple-touch-icon" href="#">
        <link rel="apple-touch-icon" sizes="114x114" href="#">
        <link rel="apple-touch-icon" sizes="72x72" href="#">
        <link rel="apple-touch-icon" sizes="144x144" href="#">

        <!-- Modernizr -->
        <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $( "#search" ).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/hela/search/",
                        data: { term: $("#search").val()},
                        dataType: "json",
                        type: "POST",
                        success: function(data){
                            var resp = $.map(data,function(obj){
                                return obj.tag;
                            }); 

                            response(resp);
                        }
                    });
                },
                minLength: 2
            });
        </script>

        <!-- Analytics -->
        <script type="text/javascript">
            
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'Insert Your Code']);
            _gaq.push(['_trackPageview']);
            
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
            
        </script>
        

        <!-- End Analytics -->
        
        
        <link href="<?php echo base_url(); ?>img/icon.ico" rel="icon" type="image/x-icon" />

    </head>





    <body>
    <!-- Header -->
    <header>
        <div class="sticky-nav">
            <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

            <div id="logo">
                <a id="goUp" href="#" title="hela.or.ke"></a>
            </div>

            <nav id="menu">
                <ul id="menu-nav">
                    <li class="current"><a href="#home-slider">Search County</a></li>
                    <li><a href="#work">Projects</a></li>
                    <!--li><a href="#about">Impact</a></li-->
                    <li><a href="#mdg">MDG Affiliation</a></li>

                    <li><a href="#feedback">Your Feedback</a></li>

                </ul>
            </nav>

        </div>
        
    
    <!--Search Bar -->
     	      <div id="bar" >
              <br/>
              <br/>
              <br/>
              <h2 style="margin-left:220px" >Enter Your County Name:</h2>
                <form action="<?php echo base_url(); $county[0];?>" method="POST"  enctype="multipart/form-data" contenteditable="true">
                    <input id="search" name="search" type="text" list="" placeholder="county name" align="middle" value=""/>
                    <input id="submit" name="submit" type="submit" value="Go" align="middle" formaction="<?php echo base_url(); ?># "/>
                </form>  
                    
          </div>
          
    <!-- End Search Bar -->
    </header>
    <!-- End Header -->
    <div id=" ">
    </div>
    <!-- Projects Section --> 
    <div id="work" class="page"  >
        <div class="container" >
        
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page" style="padding-bottom:30px;">
                        <h2 class="title">Projects</h2>
                        <h3 class="title-description">Funded Projects in <a href="#"><?php echo $county[0];?></a>.</h3>
                       </div>
                </div>
               </div>
            <!-- End Title Page -->
            <!--call projects viz here-->
         <div class="span10" id="wrap">
            <!--Number of Projects-->
            <div class="span4" align="right">
            <h3 align="center">Number of Projects</h3>
			<?php foreach ($projects as $project): ?>
				<div style = "background-color:#ffffff; margin-top:65px; width:300px; height:80px;">
					<table>
						<tr>
						<td><?php echo $project->projects;?></td>
                        <?php if($project->projects > 0):?>
							<?php for($i=1;$i<=$project->projects;$i++) : ?>
                            <td class="sector" style = "border-spacing:1; border: 4px solid #ffffff; background-color:<?php echo $project->color; ?>; margin-right:10px; margin-left:10px; width:20px; height:80px; margin-bottom:55px;" ></td>
                            <?php endfor; ?>
                        <?php else: ?> 
                           <td class="sector" style = "border-spacing:1; border: 4px solid #ffffff; background-color:#ffffff; margin-right:10px; margin-left:10px; width:20px; height:80px; margin-bottom:55px;" ></td>
                        <?php endif; ?>
						</tr>
					</table>
				</div>
			<?php endforeach;?>
            </div>
			<!--End Number of Projects-->
            
            <!--sectors-->
            <div class="span1">
            <h3 align="center">Sectors</h3>
			<?php foreach ($projects as $project): ?>
				<div style = "background-color:#ffffff; margin-top:65px; width:100px; height:80px;">
					<img src="<?php echo base_url(); ?>img/<?php echo $project->image; ?>" style="margin-bottom:55px" title="<?php echo $project->sector; ?>" />
				</div>
			<?php endforeach;?>
            </div>
            <!--End sectors-->
            
            <!--Amount in Funding-->
            <div class="span4" >
            <h3 align="center">Amount in Funding</h3>
			<?php foreach ($projects as $project): ?>
            
				<div align="left" style= "background-color:transparent; margin-top:65px; width:2000px; height:80px; ">
				<table>
					<tr>
					<?php if($project->amount == 0):?>
                    <td class="sector" style = "border-spacing:1; border: 4px solid #ffffff; background-color:#ffffff; margin-right:10px; width:10px; height:80px; margin-bottom:55px;" ></td>
                    <?php endif; ?>
                    <?php if($project->amount < 100000000):?>
                    <td class="sector" align="left" style = "border-spacing:1; border: 4px solid #ffffff; background-color:<?php echo $project->color; ?>; margin-right:1px;width:1px; height:80px; margin-bottom:55px;"></td>
                    <?php endif; ?>
                    <?php if($project->amount < 7000000000):?>
					<?php for($i=1;$i<=$project->amount/100000000;$i++) : ?>
					<td class="sector" align="left" style = "border-spacing:1; border: 4px solid #ffffff; background-color:<?php echo $project->color; ?>; margin-right:1px;width:1px; height:80px; margin-bottom:55px;"></td>
					<?php endfor; ?>
                    <?php endif; ?>
                   	<?php if($project->amount > 7000000000): ?>
                    <?php for($i=1;$i<=65; $i++) : ?>
                    <td class="sector" align="left" style = "border-spacing:1; border: 4px solid #ffffff; background-color:<?php echo $project->color; ?>; margin-right:1px;width:1px; height:80px; margin-bottom:55px;"></td>
                    <?php endfor; ?>
                    <?php endif; ?>
                    
					<td><?php echo "KES ".number_format($project->amount,0); ?></td>
					</tr>
				</table>
				</div>
			<?php endforeach;?>
            </div>
            <!--End Amount in Funding-->
            </div>
            <!--end Projects viz-->
            			
            </div>
            </div>
            <!--End Projects Section-->

            <!-- Sectors Section -->
            <div id="mdg" class="page">
                <div class="container">
                
                    <!-- Title Page -->
                    <div class="row">
                        <div class="span12">
                            <div class="title-page" style="padding-bottom:30px;">
                                <h2 class="title">MDG Affiliation</h2>
                                <h3 class="title-description">Amount in Funding Per MDG in <a><?php echo $county[0];?></a>.</h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Title Page -->
                    <!--call mdg viz here-->
                    <div class="span10" id="wrap" >
                    				
					<?php foreach ($mdgs as $mdg):?>
						<div class="span1"  >
						<img src="<?php echo base_url(); ?>img/<?php echo $mdg->image; ?>" title="<?php echo $mdg->mdg; ?>"/>
						<div class="mdg" style = "background-color:<?php echo $mdg->color; ?>; width:75px; height:<?php echo $mdg->amount/20000000;?>px;"></div>
						<div align="center">
						<?php echo "".number_format($mdg->amount,0); ?>
						</div>
						</div>
					<?php endforeach;?>
                    </div>

                    </div>
                    </div>
                    <!-- End Sectors Section -->


                    <!-- feedback Section -->
                    <div id="feedback" class="page" >
                        <div class="container">
                            <!-- Title Page -->
                            <div class="row">
                                <div class="span12">
                                    <div class="title-page" style="padding-bottom:30px;">
                                        <h2 class="title">Have Your Say</h2>
                                        <h3 class="title-description">What do you have to say about funded projects in <a><?php echo $county[0];?></a>?</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- End Title Page -->

                            <!-- feedback Form -->
                            <div  style=" background-color:#FFF; padding:10px; width:1000px; margin-left:30px;-moz-box-shadow:0px 0px 10px 7px #cfcfcf;
	-webkit-box-shadow:0px 0px 10px 7px #cfcfcf; box-shadow:0px 0px 10px 7px #cfcfcf;">
                              <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'hela'; // required: replace example with your forum shortname
		

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    </div>
    </div></div>
    
								
                    <!-- End feedback Section -->



                    <!-- Socialize -->
                    <div id="social-area" class="page">
                        <div class="container">
                            <div class="row">
                                <div class="span12" style="padding-bottom:50px; padding-top:50px;">
                                    <nav id="social">
                                        <ul>
                                            <li><a href="https://twitter.com/hela.co.ke" title="Follow Me on Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                                             <li><a href="https://www.facebook.com/hela.co.ke" title="Follow Me on Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                                            <li><a href="https://plus.google.com/" title="Follow Me on Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a></li>
                                            <li><a href="http://www.linkedin.com/in/hela.co.ke" title="Follow Me on LinkedIn" target="_blank"><span class="font-icon-social-linkedin"></span></a></li>
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="span10" id="wrap"  >
        	<p>AN INITIATIVE OF THE NATIONAL TREASURY<br/> ePROMIS DEPARTMENT<br/>
                                <img src="<?php echo base_url(); ?>img/gok.jpg" /></p>
                                
                               
            <p> SUPPORTED BY:<br/>
            <a href="http://wbi.worldbank.org/wbi/open-aid-partnership/" target="_blank"><img src="<?php echo base_url(); ?>img/OpenAid.png"  style="margin-left:50px;"/></a>
            <a href="http://africanmediainitiative.org/" target="_blank"><img src="<?php echo base_url(); ?>img/ami-logo.png"/></a>
            <a href="http://wbi.worldbank.org/wbi/" target="_blank"><img src="<?php echo base_url(); ?>img/WBI.png" /></a>
                                            <br/> 
        					</div> 
                        </div>
                    </div>
                    <!-- End Socialize -->
                    <!-- Footer -->
                    <footer>
                        <p class="credits"><a href="http://openinstitute.com" target="new"><img src="<?php echo base_url(); ?>img/oi.png" style="padding-left:1000px"  /></a>
            </p>
                    </footer>
                    <!-- End Footer -->

                    <!-- Back To Top -->
                    <a id="back-to-top" href="#">
                        <i class="font-icon-arrow-simple-up"></i>
                    </a>
                    <!-- End Back to Top -->


                    <!-- Js -->
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
                    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
                    <script src="<?php echo base_url(); ?>js/supersized.3.2.7.min.js"></script> 
                    <script src="<?php echo base_url(); ?>js/waypoints.js"></script> 
                    <script src="<?php echo base_url(); ?>js/waypoints-sticky.js"></script> 
                    <script src="<?php echo base_url(); ?>js/jquery.isotope.js"></script> 
                    <script src="<?php echo base_url(); ?>js/jquery.fancybox.pack.js"></script> 
                    <script src="<?php echo base_url(); ?>js/jquery.fancybox-media.js"></script> 
                    <script src="<?php echo base_url(); ?>js/jquery.tweet.js"></script> 
                    <script src="<?php echo base_url(); ?>js/plugins.js"></script> 
                    <script src="<?php echo base_url(); ?>js/main.js"></script> 
                    <script src="<?php echo base_url(); ?>http://d3js.org/d3.v3.min.js" charset="utf-8"></script> 
                    <script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
                    <!-- End Js -->

                    </body>
                    </html>