<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/plugins/iCheck/square/blue.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <!--    <a href="{{url('/')}}"><b>Amr</b></a>-->
            </div>

            @yield('content')
        </div>
        <!-- jQuery 2.1.4 -->
        <script src="{{asset('bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('bower_components/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
        <script>
$(function () {

    $("button.resetPassword").removeAttr('disabled');
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });


    $("button.resetPassword").on("click", function () {
        var email = $("#email").val();
        if (email == "") {
            alert("You must provide an email");
            return;
        }
        $(this).attr('disabled', 'disabled');
        $("p.wait-rest").removeClass("hidden");
        $.get("{{url('/forget-password')}}", {email: email}, function (response) {
            $("button.resetPassword").removeAttr('disabled');
            var data = JSON.parse(JSON.stringify(response));
            $("p.wait-rest").addClass("hidden");
            if (typeof (data.messages) == "undefined") {

                $("p.success-rest").removeClass('hidden');
                window.setTimeout(function () {
                    $("p.success-rest").addClass('hidden');
                    $("#email").val("");
                }, 8000);

            } else {
                $("p.error-rest").removeClass('hidden');
                window.setTimeout(function () {
                    $("p.error-rest").addClass('hidden');
                    $("#email").val("");
                }, 8000);
            }
        });
    });

});
        </script>
    </body>
</html>