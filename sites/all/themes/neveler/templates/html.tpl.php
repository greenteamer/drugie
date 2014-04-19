<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300&amp;subset=cyrillic,latin" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=cyrillic,latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="all" href="/sites/all/themes/neveler/whhg/css/whhg.css" />
  <link href="/sites/all/themes/neveler/js/mightySlider/src/css/mightyslider.css" rel="stylesheet">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php print $scripts; ?>
  <script type="text/javascript">
  (function($) {
      $(document).ready(function(){
        // $('#nav').localScroll(800);        

        $('#intro').parallax("50%", 0.1);
        $('#second').parallax("50%", 0.1);
        $('.bg').parallax("50%", 0.4);
        $('#third').parallax("50%", 0.3);

        //ВВОД ТОЛЬКО ЦИФР В ПОЛЕ ТЕЛЕФОНА
        $("#webform-component-phone .form-text").keydown(function(event) {
            // Разрешаем: backspace, delete, tab и escape
            if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || 
                 // Разрешаем: Ctrl+A
                (event.keyCode == 65 && event.ctrlKey === true) || 
                 // Разрешаем: home, end, влево, вправо
                (event.keyCode >= 35 && event.keyCode <= 39)) {
                     // Ничего не делаем
                     return;
            }
            else {
                // Обеждаемся, что это цифра, и останавливаем событие keypress
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                    event.preventDefault(); 
                }   
            }
        });

      })
    })(jQuery);
</script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <div class="page_top">
    <?php print $page_top; ?>
  </div>
  <div class="page_middle">
    <?php print $page; ?>
  </div>
  <div class="page_bottom">
    <?php print $page_bottom; ?>
  </div>  
  <script type="text/javascript" src="/sites/all/themes/neveler/js/mightySlider/src/js/mightyslider.js"></script>

        <script>
            jQuery(document).ready(function($) {

                var $win = $(window),
                isTouch = !!('ontouchstart' in window),
                clickEvent = isTouch ? 'tap' : 'click';

            // Modern Example
                (function(){
                    function calculator(width){
                        var percent = '50%';
                        if (width <= 768) {
                            percent = '100%';
                        }
                        else {
                            percent = '50%';
                        }
                        return percent;
                    };

                    var $carousel = $('#modern'),
                    $frame = $('.frame', $carousel);
                    $frame.mightySlider({
                        speed: 500,
                        autoScale: 1,
                        viewport: 'fill',
                        startAt: 1,

                        navigation: {
                            navigationType: 'forceCentered',
                            activateOn:     clickEvent,
                            horizontal: 1,
                            slideSize: calculator($win.width())
                        },

                        // Navigation
                        // navigation: {
                        //   horizontal:      1,               // Switch to horizontal mode.
                        //   navigationType:  'basic', // Slide navigation type. Can be: 'basic', 'centered', 'forceCentered'.
                        //   slideSelector:   '.slide_one',            // Select only slides that match this selector.
                        //   smart:           1,               // Repositions the activated slide to help with further navigation.
                        //   activateOn:      clickEvent,            // Activate an slide on this event. Can be: 'click', 'mouseenter', ...
                        //   // activateMiddle:  1,               // Always activate the slide in the middle of the FRAME. forceCentered only.
                        //   slideSize:       0,               // Sets the slides size. Can be: Fixed(500) or Percent('100%') number.
                        //   keyboardNavBy:   null             // Enable keyboard navigation by 'slides' or 'pages'.
                        // },

                        cycling: {
                            cycleBy:       'slides', // Enable automatic cycling by 'slides' or 'pages'.
                            pauseTime:     5000, // Delay between cycles in milliseconds.
                            pauseOnHover:  0,    // Pause cycling when mouse hovers over the FRAME.
                            startPaused:   0     // Whether to start in paused sate.
                          },

                        // Buttons options
                        buttons: {
                            prevPage: $('#modern_prev'),
                            nextPage: $('#modern_next')
                        }
                    });

                    var API = $frame.data().mightySlider;

                    $win.resize(function(){
                        API.set({
                            navigation: {
                                slideSize: calculator($win.width())
                            }
                        });
                    });
                })();
        // End of Modern Example
            });
    </script>
</body>
</html>
