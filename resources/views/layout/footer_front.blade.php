        <!-- Footer Area -->
        <footer class="footer-area repair-footer-area bg-fbf9f8" >


            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-widget">
                            <div class="logo">
                                <a href="{{route('front.index')}}">Nom Entreprise</a>
                            </div>
                            <p>Une Entreprise Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit, incidunt?</p>
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/waqfguinee/" target="_blank"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icofont-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icofont-linkedin"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCoYqIU47wzh7TOdh60SwY0A" target="_blank"><i class="icofont-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Nos liens</h3>

                            <ul class="services-list">
                                <li><a href="{{route('front.index')}}">Accueil</a></li>
                                <li><a href="{{route('front.presentation.propos')}}">A propos</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Contacts</h3>

                            <ul class="contact-list">
                                <li><span>Adresse:</span> Nom Entreprise</li>
                                <li><span>Site web:</span> <a href="#">https://nomentreprise.gn/</a></li>
                                <li><span>Email:</span> <a href="#">contact@nomentreprise.gn</a></li>
                                <li><span>Phone:</span> <a href="#">6000000000</a></li>
                                <li><span>Phone:</span> <a href="#">6000000000</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-widget">
                            <h3>HEURE</h3>

                            <ul class="working-hours">
                                <li><span>LUNDI - JEUDI:</span> 08:30  - 17: 00</li>
                                <li><span>VENDREDI:</span> 08:30  - 14: 00</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul>
                                <li><a href="#">Nom Entreprise</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-6 col-md-6 text-end">
                            <p>©Copyright {{date('Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->

        <div class="go-top"><i class="icofont-stylish-up"></i></div>

        <!-- jQuery Min JS -->
        <script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap Min JS -->
        <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Owl Carousel Min Js -->
        <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
		<!-- Owl Carousel Thumbs JS -->
        <script src="{{asset('front/assets/js/owl.carousel2.thumbs.min.js')}}"></script>
        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="{{asset('front/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <!-- Jquery Magnific Popup Min Js -->
        <script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Jquery Mixitup Min Js -->
        <script src="{{asset('front/assets/js/jquery.mixitup.min.js')}}"></script>
        <!-- Jquery Appear Min Js -->
        <script src="{{asset('front/assets/js/jquery.appear.min.js')}}"></script>
        <!-- Odometer Min Js -->
        <script src="{{asset('front/assets/js/odometer.min.js')}}"></script>
		<!-- ajaxChimp Min JS -->
        <script src="{{asset('front/assets/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{asset('front/assets/js/form-validator.min.js')}}"></script>
        <!-- Contact Form Min JS -->
        <script src="{{asset('front/assets/js/contact-form-script.js')}}"></script>
        <!-- WOW Min JS -->
        <script src="{{asset('front/assets/js/wow.min.js')}}"></script>
        <!-- Main JS -->
        <script src="{{asset('front/assets/js/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('preloader/preloader.js')}}"></script>
        <script type="text/javascript">
  (function($){
  "use strict";

   var tpj=jQuery;
			var revapi12;
			tpj(document).ready(function() {
				if(tpj("#rev_slider_12_1").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider_12_1");
				}else{
					revapi12 = tpj("#rev_slider_12_1").show().revolution({
						sliderType:"standard",
						sliderLayout:"fullwidth",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
                             mouseScrollReverse:"default",
							onHoverStop:"off",
							arrows: {
								style:"hermes",
								enable:true,
								hide_onmobile:false,
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1200,
								tmp:'<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div></div>',
								left: {
									h_align:"left",
									v_align:"center",
									h_offset:20,
                                    v_offset:0
								},
								right: {
									h_align:"right",
									v_align:"center",
									h_offset:20,
                                    v_offset:0
								}
							}
						},
						visibilityLevels:[1240,1024,778,480],
						gridwidth:1920,
						gridheight:860,
						lazyType:"none",
						shadow:0,
						spinner:"spinner3",
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,
						shuffle:"off",
						autoHeight:"off",
						disableProgressBar:"on",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				}
			});
    })(jQuery);
		</script>
        @toastr_js
        @toastr_render
    </body>
</html>
