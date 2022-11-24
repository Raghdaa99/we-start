@extends('admin.master')


@section('title','')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>


@endsection

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div id="calendar"></div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var booking = @json($events);
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: booking,
                selectable: true,
                selectHelper: true,

            });

        });

    </script>


    <!-- jQuery -->
    {{--    <script src="{{ asset("/assets/admin/plugins/jquery/jquery.min.js") }}"></script>--}}
    {{--    <!-- Bootstrap -->--}}
    {{--    <script src="{{ asset("/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>--}}
    {{--    <!-- jQuery UI -->--}}
    {{--    <script src="{{ asset("/assets/admin/plugins/jquery-ui/jquery-ui.min.js") }}"></script>--}}
    {{--    <!-- AdminLTE App -->--}}
    {{--    <script src="{{ asset("/assets/admin/dist/js/adminlte.min.js") }}"></script>--}}

    {{--    <script src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>--}}
    {{--    <script src="{{asset('assets/admin/plugins/fullcalendar/main.js')}}"></script>--}}

    {{--    <!-- AdminLTE for demo purposes -->--}}
    {{--    <script src="{{ asset("/assets/admin/dist/js/demo.js") }}"></script>--}}
@endsection
