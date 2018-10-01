;(function() {

    $('header a').on('click', function(e) {

        if ($(this).attr('href')[0] === "#") {
            e.preventDefault()

            var target = $($(this).attr('href'))

            var pos = target.position().top

            $("html, body").animate({ scrollTop: pos + 'px' });
        }
    })

})();