/*
 CONTENT
 1. Page loading animation
 2. Helpers
 3. Contact form
 4. Comment form
 5. Type something in the 'Search...' field

*/

jQuery( document ).ready(function( $ ) {


	"use strict";


        // 1. Page loading animation

        $("#preloader").animate({
            'opacity': '0'
        }, 600, function(){
            setTimeout(function(){
                $("#preloader").css("visibility", "hidden").fadeOut();
            }, 300);
        });


        $(window).scroll(function() {
          var scroll = $(window).scrollTop();
          var box = $('.header-text').height();
          var header = $('header').height();

          if (scroll >= box - header) {
            $("header").addClass("background-header");
          } else {
            $("header").removeClass("background-header");
          }
        });

        if ($('.owl-clients').length) {
            $('.owl-clients').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                items: 1,
                margin: 30,
                autoplay: false,
                smartSpeed: 700,
                autoplayTimeout: 6000,
                responsive: {
                    0: {
                        items: 1,
                        margin: 0
                    },
                    460: {
                        items: 1,
                        margin: 0
                    },
                    576: {
                        items: 3,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 30
                    }
                }
            });
        }

        if ($('.owl-banner').length) {
            $('.owl-banner').owlCarousel({
                loop: true,
                nav: true,
                dots: true,
                items: 3,
                margin: 10,
                autoplay: false,
                smartSpeed: 700,
                autoplayTimeout: 6000,
                responsive: {
                    0: {
                      items: 1,
                      margin: 0
                    },
                    460: {
                        items: 1,
                        margin: 0
                    },
                    576: {
                        items: 1,
                        margin: 10
                    },
                    992: {
                      items: 3,
                      margin: 10
                    }
                }
            });
        }

// -------------------------------------------------- 2. Helpers

    // Show nessages from PHP
    function showMessage(val) {

        $('.' + val).fadeTo(300, 1).css({'display' : 'block'});
    }

    // Set class 'active' for the current main link in 'nav' menu
    $('.nav-item a').each(function() {
        if (this.href == window.location.href) {
            $(this).addClass('active-link');
        }
    });

    // Disable 'active' link
    $('.active-link').on('click', function(event) {
        event.preventDefault();
    });

    // Click an element and redirect
    $(document).on('click', '.blog-thumb', function(){
        let url = $(this).data('value');
        $(location).attr('href', url);
    });

    // Debug: console.log(); return false;

// -------------------------------------------------- 3. Contact form

// Click 'Send Message' btn
$('#send-message').on('click', function(event) {

    event.preventDefault();

    // Show 'load img'
    $('.contact-form-pop-up').css({'display' : 'block'});

    // Hide 'form-error' messages
    $('.form-error').fadeTo(300, 0).css({'display' : 'none'});

    // Set variables
    let name    = $('#name').val();
    let email   = $('#email').val();
    let subject = $('#subject').val();
    let message = $('#message').val();

    // Set timeout to show the 'load img' while the script is working
    setTimeout(function(){

        $.post('/contact-form', {

            name:    name,
            email:   email,
            subject: subject,
            message: message

        }, function(data) {

            // If something went wrong
            if (! data ) {

                showMessage('wrong');

                $('input, textarea').val('');

                $('.contact-form-pop-up').css({'display' : 'none'});

            // If ok
            } else if (data == 'ok') {

                showMessage('ok');

                $('input, textarea').val('');

                // Remove 'load img'
                $('.contact-form-pop-up').css({'display' : 'none'});

            // If there are errors
            } else {

                // We get 'data' as: 'bad-reg-email bad-reg-pass '...
                // Set 'data' object.
                var data = data.split(" ");

                // Show error messages
                Object.entries(data).forEach(([key, val]) => {

                    if (val) {

                        if (val == 'many-messages') {

                            $('input, textarea').val('');
                            showMessage(val);

                        } else {
                            showMessage(val);
                        }
                    }
                });

                // Remove 'load img'
                $('.contact-form-pop-up').css({'display' : 'none'});
            }
        });
    }, 300);
});

// -------------------------------------------------- 4. Comment form

// Click 'Submit' btn
$('#send-comment').on('click', function(event) {

    event.preventDefault();

    // Show 'load img'
    $('.comment-form-pop-up').css({'display' : 'block'});

    // Hide 'form-error' messages
    $('.form-error').fadeTo(300, 0).css({'display' : 'none'});

    // Set variables
    let name = $('#name').val();
    let comment = $('#comment').val();
    let postId = $('#post_id').data('value');

    // Set timeout to show the 'load img' while the script is working
    setTimeout(function(){

        $.post('/comment-form', {

            name: name,
            postId: postId,
            comment: comment

        }, function(data) {

            // If something went wrong
            if (! data ) {

                showMessage('wrong');

                $('input, textarea').val('');

                $('.comment-form-pop-up').css({'display' : 'none'});

            // If ok
            } else if (data == 'ok') {

                // Just reload the page to show a new comment
                location.reload();

                // Or show the message under the form
                /*
                showMessage('ok');
                // Remove 'load img'
                $('input, textarea').val('');
                $('.comment-form-pop-up').css({'display' : 'none'});
                */

            // If there are errors
            } else {

                // We get 'data' as: 'bad-reg-email bad-reg-pass '...
                // Set 'data' object.
                var data = data.split(" ");

                // Show error messages
                Object.entries(data).forEach(([key, val]) => {
                    if (val) {

                        if (val == 'many-comments') {

                            $('input, textarea').val('');
                            showMessage(val);

                        } else {
                            showMessage(val);
                        }
                    }
                });

                // Hide'load img'
                $('.comment-form-pop-up').css({'display' : 'none'});
            }
        });

    }, 300);
});

// --------------------------------- 5. Type something in the 'Search...' field
$('#search').on('keyup', function() {

    // Get value from the search field
    let data = $(this).val();

    // Check if there are 'bad' characters
    let checkData = data.match(/^[A-Za-z0-9 \-]+$/);

    // If 'data' has 'bad symbols' cut it to 1 sybmbol and stop the script
    if (! checkData) {
        $('#search').val(data.substring(0, 1));
        return false;
    }

    let dataLength = 2;

    // Start the script if the length of 'data' >= 2 and < 25
    if (data.length >= dataLength && data.length < 25) {

        $.post('/search-result', {

            data: data

        }, function(data) {

            // If something was found
            if (data) {

                // Append and show the found data
                $('.search-result').empty().html(data);

                $('.search-result').fadeTo(300, 1);

            // If nothing was found
            } else {

              setTimeout(function(){
                  $('.search-result').html("<a class='search-link nothing-found'>Nothing found</a>")
                  .fadeTo(100, 1);
              }, 100);
            }
        });

    } else if ( data.length < 2 ) { $('.search-result').empty().fadeTo(300, 0); }

  });
});
