<?php if (IS_LOGGED == true && $config->google_place_api !== '') { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $config->google_place_api; ?>&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        function initAutocomplete() {
            var input = document.getElementById('_location');
            if (input !== null) {
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();
                    $('#location').html(place.formatted_address);
                });
            }
//            start modify Community Devs LLC
            var input2 = document.getElementById('ulocation');
            if (input2 !== null) {
                var autocomplete = new google.maps.places.Autocomplete(input2);
                autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();
                    if ($('.form-general-settings').length > 0) {

                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({'address': place.formatted_address}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                console.log(status);
                                var lat = parseFloat(results[0].geometry.location.lat());
                                var lng = parseFloat(results[0].geometry.location.lng());
                                if (lat && lng) {
                                    init_address_complete_2(lat, lng);
                                }
                            }
                        });
                    }
                });

            }
        }


        function init_address_complete_2(lat, lng) {
            const latlng = {
                lat: lat,
                lng: lng,
            };
            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({location: latlng}, (results, status) => {
                if (status === "OK") {

                    $('.current-location-hidden').val(results[0]['formatted_address']);
                    var str = results[0]['formatted_address'];
                    var addr_arr = str.split(', ');
                    var addr = '';
                    if (addr_arr.length > 2) {
                        addr += addr_arr[addr_arr.length - 3] + ', ';
                        addr += addr_arr[addr_arr.length - 2] + ', ';
                        addr += addr_arr[addr_arr.length - 1];
                    } else {
                        addr += addr_arr[addr_arr.length - 2] + ', ';
                        addr += addr_arr[addr_arr.length - 1];
                    }


                    if (results[0]) {
                        var city = "";
                        var state = "";
                        var country = "";
                        for (var i = 0; i < results[0].address_components.length; i++) {
                            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
                                switch (results[0].address_components[i].types[b]) {
                                    case 'locality':
                                        city = results[0].address_components[i].long_name;
                                        break;
                                    case 'administrative_area_level_2':
                                        city = results[0].address_components[i].long_name;
                                        break;
                                    case 'administrative_area_level_1':
                                        state = results[0].address_components[i].long_name;
                                        break;
                                    case 'country':
                                        country = results[0].address_components[i].long_name;
                                        break;
                                }
                            }
                        }
    //                replace israel to palestine
                        if (country == 'Israel') {
                            country = 'Palestine';
                        }

                        var address = {
                            "city": city,
                            "state": state,
                            "country": country,
                        };

                        fetch_address_steps_2(address, addr);
                    }

                } else {
                    console.log("Geocoder failed due to: " + status);
                }
            });
        }
        function fetch_address_steps_2(address, formatted_address) {
            let url = window.ajax + 'custom_ajax/address';
            $.ajax({
                url: url,
                type: "POST",
                data: address,
                dataType: 'json',
                success: function (result) {
                    if (result.status == 200) {
                        //replaced israel to palestine
                        var $addr = formatted_address.replace('Israel', 'Palestine');

                        $('input[name="incomplete_address"]').val($addr);

                        if (result.address.country) {
                            $('select[name="country_id"]').val(result.address.country.id);
                            fetchStates(result.address.country.id, true, result.address.state.id);
                        }
                        if (result.address.state) {
                            fetchCities(result.address.state.id, true, result.address.city.id);
                        }
                    }
                }
            });
        }
//        end by Community Devs LLC

    </script>
<?php } ?>
<script>
    function bindAjaxElement(item, e) {
        if ($(item).attr('id') !== 'notificationbtn') {
            $("#loader").css("display", "block");
        }
        var url = "";
        var data_ajax = $(item).attr('data-ajax');
        var data_ajax_post = $(item).attr('data-ajax-post');
        var data_ajax_callback = $(item).attr('data-ajax-callback');

        // var data_replace_text = $(item).attr('data-replace-text');
        // var data_replace_dom = $(item).attr('data-replace-dom');
        // if (typeof data_replace_text !== typeof undefined && data_replace_text !== false) {
        //     if (typeof data_replace_dom !== typeof undefined && data_replace_dom !== false) {
        //         $(data_replace_dom).html(data_replace_text);
        //     }
        // }

        window.itm = $(item).attr('id');
<?php if (IS_LOGGED === true) { ?>

            if (typeof data_ajax !== typeof undefined && data_ajax !== false) {
                e.preventDefault();
                url = $(item).attr('data-ajax');
                window.current_page = url;
                $.ajax({
                    url: window.site_url + url + window.maintenance_mode,
                    data: 'url=' + url + '&ajax=true',
                    type: "POST",
                    timeout: 60000,
                    success: function (result) {
                        $('body').css({'overflow': 'inherit'});
                        $("#loader").css("display", "none");

                        var is_user_logged_in = $(result).filter('.is_user_logged_in').html();
                        if (typeof is_user_logged_in !== "undefined") {
                            if (is_user_logged_in !== "1") {
                                window.location.href = "<?php echo $config->uri; ?>/login";
                            }
                        }
                        var title = $(result).filter('.page_title').html();
                        var page_name = $(result).filter('.page_name').html();
                        window.current_page = page_name;

                        if (page_name !== 'profile') {
                            $('meta[name=robots]').remove();
                            $('meta[name=googlebot]').remove();
                        }
                        $('#container').html(result);
                        window.history.pushState({state: 'new'}, '', window.site_url + url);


                        $("html, body").animate({scrollTop: 0}, 150);
                        custom_footer_js(page_name);
                        console.log('ajax');
                        //added by Community Devs LLC
                        init_custom_changes_hook();
                        // end by Community Devs LLC
                        document.title = decodeHtml(title);
                        window.title = decodeHtml(title);
                        document.getElementsByTagName('title')[0].innerHTML = decodeHtml(title);

                        M.updateTextFields();

                        window.onpopstate = function (event) {
                            $(window).unbind('popstate');
                            window.location.href = document.location;
                        };

                        event_runner(true);
                    },
                    error: function (result) {
                        console.warn(result);
                    }
                });
            }
<?php } ?>

        if (typeof data_ajax_post !== typeof undefined && data_ajax_post !== false) {

            url = window.ajax + $(item).attr('data-ajax-post') + window.maintenance_mode;
            var params = $(item).attr('data-ajax-params');
            var callback = $(item).attr('data-ajax-callback');
            var formData = new FormData();
            var data_ajax_template = $(item).attr('data-ajax-template');

            if (params !== '') {
                params.split("&").forEach(function (item) {
                    var s = item.split("="), k = s[0], v = s[1];
                    formData.append(k, decodeURIComponent(s[1]));
                });
            }

            if (typeof data_ajax_template !== typeof undefined) {
                formData.append('data_ajax_template', data_ajax_template);
            }
            window.ajaxsend = false;
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    //     window.ajaxsend = true;
                    //     console.log('fuck1')
                }
            }).done(function (result) {
                window.ajaxsend = true;
                if (result.can_send == 1) {
                    SendMessages();
                }
                var fn = window[callback];
                if (typeof fn === "function")
                    fn(result);

            }).fail(function (data) {
                window.ajaxsend = true;
                if (data.responseJSON.spam == true) {
                    //$('.chat_foot').remove();

                    $('#chat_declined_modal').modal();
                    $('#chat_declined_modal #chat_declined_modal_container').html(data.responseJSON.message);
                    $('#chat_declined_modal').modal('open');
                }
            });
        }


        if (typeof data_ajax_post === typeof undefined && typeof data_ajax === typeof undefined) {
            $("#loader").css("display", "none");
        }

    }
    window.onload = function () {

        $("body").on("click", "a,button,span", function (e) {
            bindAjaxElement(this, e);
        });

        $(document).ajaxStart(function () {
        }).ajaxSuccess(function () {
            $("#loader").css("display", "none");
        });

    };
</script>
