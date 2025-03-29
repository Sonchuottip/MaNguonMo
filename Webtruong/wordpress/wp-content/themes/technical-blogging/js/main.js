// Menu
function technical_blogging_openNav() {
  jQuery(".sidenav").addClass('show');
}
function technical_blogging_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function technical_blogging_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const technical_blogging_nav = document.querySelector( '.sidenav' );

      if ( ! technical_blogging_nav || ! technical_blogging_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...technical_blogging_nav.querySelectorAll( 'input, a, button' )],
        technical_blogging_lastEl = elements[ elements.length - 1 ],
        technical_blogging_firstEl = elements[0],
        technical_blogging_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && technical_blogging_lastEl === technical_blogging_activeEl ) {
        e.preventDefault();
        technical_blogging_firstEl.focus();
      }

      if ( shiftKey && tabKey && technical_blogging_firstEl === technical_blogging_activeEl ) {
        e.preventDefault();
        technical_blogging_lastEl.focus();
      }
    } );
  }
  technical_blogging_keepFocusInMenu();
} )( window, document );

(function ($) {

    $(window).load(function () {
        $("#pre-loader").delay(500).fadeOut();
        $(".loader-wrapper").delay(1000).fadeOut("slow");

    });

    $(document).ready(function () {

       // $(".toggle-button").click(function () {
       //      $(this).parent().toggleClass("menu-collapsed");
       //  });

        /*--- adding dropdown class to menu -----*/
        $("ul.sub-menu,ul.children").parent().addClass("dropdown");
        $("ul.sub-menu,ul.children").addClass("dropdown-menu");
        $("ul#menuid li.dropdown a,ul.children li.dropdown a").addClass("dropdown-toggle");
        $("ul.sub-menu li a,ul.children li a").removeClass("dropdown-toggle");
        $('nav li.dropdown > a, .page_item_has_children a').append('<span class="caret"></span>');
        $('a.dropdown-toggle').attr('data-toggle', 'dropdown');
      /*-- Mobile menu --*/
        if ($('#site-navigation').length) {
            $('#site-navigation .menu li.dropdown,li.page_item_has_children').append(function () {
                return '<i class="bi bi-caret-down-fill" aria-hd="true"></i>';
            });
            $('#site-navigation .menu li.dropdown .bi,li.page_item_has_children .bi').on('click', function () {
                $(this).parent('li').children('ul').slideToggle();
            });
        }

        /*-- tooltip --*/
        $('[data-toggle="tooltip"]').tooltip();

       /*-- scroll Up --*/
        jQuery(document).ready(function ($) {
            $(document).on('click', '.btntoTop', function (e) {
                e.preventDefault();
                $('html, body').stop().animate({ scrollTop: 0 }, 700);
            });

            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 200) {
                    $('.btntoTop').addClass('active');
                } else {
                    $('.btntoTop').removeClass('active');
                }
            });
        });


        /*-- Reload page when width is between 320 and 768px and only from desktop */
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
        $(window).on('resize', function () {
            var win = $(this); //this = window
            if (win.width() > 320 && win.width() < 991 && isMobile == false && !$("body").hasClass("elementor-editor-active")) {
                location.reload();
            }
        });
    });

})(this.jQuery);

// font
   document.addEventListener('DOMContentLoaded', function() {
    // Get the heading element
    var headingElement = document.querySelector('.ads-head');

    // Ensure the element exists before proceeding
    if (headingElement) {
        // Get the full text of the heading
        var fullText = headingElement.innerHTML.trim();

        // Split the text into words
        var words = fullText.split(' ');

        // Get the first word
        var firstWord = words.shift();

        // Join the remaining words
        var restOfText = words.join(' ');

        // Update the heading with styled first word and rest of the text
        headingElement.innerHTML = 
            '<span style="color: #ffffff;">' + firstWord + '</span> ' +
            '<span style="color: #E32988;">' + restOfText + '</span>';
    }
});

// slider section
jQuery('document').ready(function(){
    var slider_loop = jQuery('.slider1').attr('slider-loop');
  var owl = jQuery('.slider1 .owl-carousel');
    owl.owlCarousel({
    margin:0,
    nav: false,
    autoplay :true,
    lazyLoad: true,
    autoplayTimeout: 9000,
    loop: true,
    dots:true,
    navText : ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

// slider2
jQuery('document').ready(function(){
    var slider_loop = jQuery('.slider2').attr('slider-loop');
  var owl = jQuery('.slider2 .owl-carousel');
    owl.owlCarousel({
    margin:0,
    nav: false,
    autoplay :true,
    lazyLoad: true,
    autoplayTimeout: 9000,
    loop: true,
    dots:false,
    navText : ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});
// slider3
jQuery('document').ready(function(){
    var slider_loop = jQuery('.slider3').attr('slider-loop');
  var owl = jQuery('.slider3 .owl-carousel');
    owl.owlCarousel({
    margin:0,
    nav: false,
    autoplay :true,
    lazyLoad: true,
    autoplayTimeout: 9000,
    loop: true,
    dots:false,
    navText : ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});
// custom-header-text
(function( $ ) {
    // Update site title and description color in real-time
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( newval ) {
            if ( 'blank' === newval ) {
                $( '.site-title a, .site-description' ).css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $( '.site-title a, .site-description' ).css({
                    'clip': 'auto',
                    'position': 'relative',
                    'color': newval
                });
            }
        });
    });
})( jQuery );

// search form

    document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("search-icon");
    const searchForm = document.getElementById("search-form");

    if (searchIcon && searchForm) {
        searchIcon.addEventListener("click", function () {
            searchForm.style.display = searchForm.style.display === "block" ? "none" : "block";
        });
    }
    });