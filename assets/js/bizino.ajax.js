/*

[Main Script]

Project: Vecurosoft
Version: 1.0
Author : bizino.com

*/
;(function ($) {
    "use strict";
    /* ------------------------------------------------------------------------- *

        * Mail Chimp ajax

        * ------------------------------------------------------------------------- */

    var $widgetsubscribeForm = $('form.subscribe-us');

    // Subscribe Shortcode MailChimp ajax
    $widgetsubscribeForm.on('submit', function (e) {
        let $emailAdd = $(this).find('input[type="email"]').val();
        $.ajax({
            type: 'POST',
            url: bizinoajax.action_url,
            data: {
                sectsubscribe_email: $emailAdd,
                security: bizinoajax.nonce,
                action: 'bizino_subscribe_ajax'
            },

            success: function (data) {
                $('form.subscribe-us input[type="email"]').val('');
                $('.subscribe-us').append(data);
            },

            error: function () {
                $('.subscribe-us').append('<div class="alert alert-danger mt-2" role="alert">Something Goes Wrong</div>');

            }
        });
        e.preventDefault();
    });

})(jQuery);