 <footer id="footer" class="cover-padding-no">
        <div class="footer-widgets headline-bg-transparent">
            <div class="container">
                <div class="row-fluid">
                    <div class="footer-widget-container row-fluid">
                        <div id="text-2" class="widget widget_meta widget_text span3">
                            <h4>Get in touch</h4>
                            <div class="textwidget">
                                B-23, Wall Street, Analysis Cafe, Australia <br />
                                <br/> E: info@domain.com
                                <br/> T: 079 - 23543499
                                
                            </div>
                        </div>
                        <div id="recent-posts-3" class="widget widget_meta widget_recent_entries span3">
                            <h4>Company Info</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">How it Works</a></li>
								<li><a href="#">Terms of service</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Trust & Safety</a></li>
                            </ul>
                        </div>
                        <div id="recent-posts-3" class="widget widget_meta widget_recent_entries span3">
                            <h4>Get in touch</h4>
                            <ul>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">FAQ's</a></li>
								<li><a href="#">Contact Us</a></li>
                                <li><a href="<?php echo WebUrl;?>feedback.php">Feedback</a></li>
                            </ul>
                        </div>
                        <div id="text-2" class="widget widget_meta widget_text span3">
                            <h4>Follow Us</h4>
                            <div class="textwidget">
                                <div class="gap" style="height:10px">
                                </div>
                                <ul id="brad_icons_1" class="brad-icons medium style1 icons-align-">
									<li><a href="#" title="Facebook" target="_self"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="Twitter" target="_self"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="Google" target="_self"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="copyright">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="copyright-text copyright-left">
                            Copyright @ <?php echo date('Y');?>. Webzira.com. All Rights Reserved
                        </div>
                        <div class="textright copyright-right">
                            <a class="go-top readmore" href="#"><span>Go to Top</span><span class="brad-icon"><i class="fa fa-caret-up"></i></span></a>
                            <!-- Top Bar Social Icons END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end copyright -->
	
	<script type='text/javascript' src='<?php echo WebUrl; ?>js/jquery/jquery.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>revslider/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>revslider/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/jquery.flexslider-min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/frontend/add-to-cart.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/jquery-blockui/jquery.blockUI.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/frontend/woocommerce.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/jquery-cookie/jquery.cookie.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/frontend/cart-fragments.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/brad-love.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/modernizr.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/fitvids.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/prettyPhoto.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/skrollr.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/imagesloaded.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/jquery.scrollTo.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/waypoints.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/isotope.pkgd.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/bxslider.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/caroufred.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/main.min.js'></script>
    <script type='text/javascript' src='<?php echo WebUrl; ?>js/contact-form.js'></script>


    <script type="text/javascript">
        /******************************************
			-	PREPARE PLACEHOLDER FOR SLIDER	-
		******************************************/
        var setREVStartSize = function() {
            var tpopt = new Object();
            tpopt.startwidth = 1150;
            tpopt.startheight = 600;
            tpopt.container = jQuery('#rev_slider_1_1');
            tpopt.fullScreen = "off";
            tpopt.forceFullWidth = "off";
            tpopt.container.closest(".rev_slider_wrapper").css({
                height: tpopt.container.height()
            });
            tpopt.width = parseInt(tpopt.container.width(), 0);
            tpopt.height = parseInt(tpopt.container.height(), 0);
            tpopt.bw = tpopt.width / tpopt.startwidth;
            tpopt.bh = tpopt.height / tpopt.startheight;
            if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw;
            if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh;
            if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw;
            if (tpopt.bh > 1) {
                tpopt.bw = 1;
                tpopt.bh = 1
            }
            if (tpopt.bw > 1) {
                tpopt.bw = 1;
                tpopt.bh = 1
            }
            tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
            if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight;
            if (tpopt.fullScreen == "on") {
                tpopt.height = tpopt.bw * tpopt.startheight;
                var cow = tpopt.container.parent().width();
                var coh = jQuery(window).height();
                if (tpopt.fullScreenOffsetContainer != undefined) {
                    try {
                        var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                        jQuery.each(offcontainers, function(e, t) {
                            coh = coh - jQuery(t).outerHeight(true);
                            if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight
                        })
                    } catch (e) {}
                }
                tpopt.container.parent().height(coh);
                tpopt.container.height(coh);
                tpopt.container.closest(".rev_slider_wrapper").height(coh);
                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
                tpopt.container.css({
                    height: "100%"
                });
                tpopt.height = coh;
            } else {
                tpopt.container.height(tpopt.height);
                tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
            }
        };
        /* CALL PLACEHOLDER */
        setREVStartSize();
        var tpj = jQuery;
        tpj.noConflict();
        var revapi1;
        tpj(document).ready(function() {
            if (tpj('#rev_slider_1_1').revolution == undefined) {
                revslider_showDoubleJqueryError('#rev_slider_1_1');
            } else {
                revapi1 = tpj('#rev_slider_1_1').show().revolution({
                    dottedOverlay: "none",
                    delay: 9000,
                    startwidth: 1150,
                    startheight: 600,
                    hideThumbs: 200,
                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 3,
                    simplifyAll: "off",
                    navigationType: "bullet",
                    navigationArrows: "solo",
                    navigationStyle: "round",
                    touchenabled: "on",
                    onHoverStop: "on",
                    nextSlideOnWindowFocus: "off",
                    swipe_threshold: 0.7,
                    swipe_min_touches: 1,
                    drag_block_vertical: false,
                    keyboardNavigation: "off",
                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 20,
                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 0,
                    soloArrowLeftVOffset: 0,
                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 0,
                    soloArrowRightVOffset: 0,
                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",
                    spinner: "spinner0",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    forceFullWidth: "off",
                    hideTimerBar: "on",
                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0
                });
            }
        }); /*ready*/
    </script>

	<!-- Custom Scripts -->
	<script type="text/javascript">
		(function($){
		    'use strict';
			jQuery(document).ready(function($){ 
			  var retina = window.devicePixelRatio > 1 ? true : false;
		                 if(retina) {
		        	jQuery('#logo .default-logo').attr('src', 'images/logo_2x.png');
		        	jQuery('#logo img').css('max-width', '110px');
								jQuery('#logo .white-logo').attr('src', 'images/logowhite_2x.png');
								        }
				/* ------------------------------------------------------------------------ */
				/* Add PrettyPhoto */
				/* ------------------------------------------------------------------------ */
				var lightboxArgs = {			
								animation_speed: 'fast',
								overlay_gallery: true,
					autoplay_slideshow: false,
								slideshow: 5000, /* light_rounded / dark_rounded / light_square / dark_square / facebook */
											theme: 'pp_default', 
											opacity: 0.8,
								show_title: true,
								deeplinking: false,
					allow_resize: true, 			/* Resize the photos bigger than viewport. true/false */
					counter_separator_label: '/', 	/* The separator for the gallery counter 1 "of" 2 */
					default_width: 1200,
					default_height:640
				};
				jQuery("a[data-gal^='prettyPhoto']").prettyPhoto(lightboxArgs);
					});
		}(jQuery))	
	</script>
	<script language="javascript" type="text/javascript">
function openwindow(path)
{
artclasses = window.open (  path, "artclasses", " location = 1, resizable = yes, status = 1, scrollbars = 1, width = 500, height=300 ");
artclasses.moveTo (200,100);
}
</script>