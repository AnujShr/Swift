if (activeRoute === 'admin.users') {
    $(function () {
        /* --AJAX pagination-- */
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            let myurl = $(this).attr('href');
            let page = $(this).attr('href').split('page=')[1];
            getData(page);
            window.history.pushState("", "", myurl);
        });


        function getData(page) {
            $.ajax({
                url: '?page=' + page,
                type: "get",
                datatype: "html",
            })
                .done(function (data) {
                    $('.tables').html($(data).find('.tables').html());
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

        /* --Search -- */
        let timer;
        let x;
        let userSearch = $("#user_search");
        userSearch.keyup(function () {
            if (x) { x.abort() } // If there is an existing XHR, abort it.
            clearTimeout(timer); // Clear the timer so we don't end up with dupes.
            timer = setTimeout(function() { // assign timer a new timeou
                x = $.ajax({
                    url: '/admin/users',
                    data: '_token=' + $('meta[name="_token"]').attr('content') + '&user_search=' + userSearch.val(),
                    type: 'get',
                    dataType: 'json',
                    success:function (response) {
                        $('.tables').html($(response).find('.tables').html());
                    }
                }); // run ajax request and store in x variable (so we can cancel)
            }, 2000); // 2000ms delay, tweak for faster/slower
        });



    })
}