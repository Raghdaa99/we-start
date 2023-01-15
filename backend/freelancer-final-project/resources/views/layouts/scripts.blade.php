<!-- Scripts
================================================== -->
<script src="{{ asset("/assets/frontsite/js/jquery-3.3.1.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/jquery-migrate-3.0.0.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/mmenu.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/tippy.all.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/simplebar.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/bootstrap-slider.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/snackbar.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/clipboard.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/counterup.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/magnific-popup.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/slick.min.js") }}"></script>
<script src="{{ asset("/assets/frontsite/js/custom.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->

<script>
    // Snackbar for user status switcher
    $('#snackbar-user-status label').click(function () {
        Snackbar.show({
            text: 'Your status has been changed!',
            pos: 'bottom-center',
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#383838'
        });
    });
</script>


<!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
        var options = {
            types: ['(cities)'],
            // componentRestrictions: {country: "us"}
        };

        var input = document.getElementById('autocomplete-input');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }

    // Autocomplete adjustment for homepage
    if ($('.intro-banner-search-form')[0]) {
        setTimeout(function () {
            $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
        }, 300);
    }

</script>

<!-- Google API -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="{{ asset("/assets/frontsite/js/chart.min.js") }}"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            // Information about the dataset
            datasets: [{
                label: "Views",
                backgroundColor: 'rgba(42,65,232,0.08)',
                borderColor: '#2a41e8',
                borderWidth: "3",
                data: [196, 132, 215, 362, 210, 252],
                pointRadius: 5,
                pointHoverRadius: 5,
                pointHitRadius: 10,
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointBorderWidth: "2",
            }]
        },

        // Configuration options
        options: {

            layout: {
                padding: 10,
            },

            legend: {
                display: false
            },
            title: {
                display: false
            },

            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        borderDash: [6, 10],
                        color: "#d8d8d8",
                        lineWidth: 1,
                    },
                }],
                xAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    },
                }],
            },

            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 13,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            }
        },


    });
</script>

@yield('scripts')

<script>
    const userId = "{{ Auth::id() }}";
</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

