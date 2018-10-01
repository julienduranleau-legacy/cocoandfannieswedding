;(function() {

    var nInputs = 1
    var MAX_INPUTS = 5

    $('.add-name').on('click', function(e) {
        e.preventDefault()

        if (nInputs < MAX_INPUTS) {
            nInputs++
            $('.name.name'+nInputs).addClass('active')

            if (nInputs === MAX_INPUTS) {
                $(this).hide()
            }
        }
    })

    $('.submit').on('click', function(e) {
        e.preventDefault()

        var name1 = $('.name.name1').val()
        var name2 = $('.name.name2').val()
        var name3 = $('.name.name3').val()
        var name4 = $('.name.name4').val()
        var name5 = $('.name.name5').val()
        var comments = $('.comments').val()
        var available = $("input[name='available']:checked").val() === "yes"

        if ( ! name1) {
            return
        }

        $.ajax({
            type: 'post',
            url: '../save.php',
            data: {
                name1: name1,
                name2: name2,
                name3: name3,
                name4: name4,
                name5: name5,
                comments: comments,
                available: available
            },
            success: function() {
                $('.form').addClass('hidden')
                setTimeout(function() {
                    $('.form-complete').removeClass('hidden')
                }, 800)
            }
        })
    })

})();