<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<div class="container">

    <div class="mt-5" style="padding-top: 10vh;">
        <div class="col-sm-4 m-auto">

            <div class="card">
                <article class="card-body">
                    {{--                        <a href="{{ route('register') }}" class="float-right btn btn-outline-primary">Sign up</a>--}}
                    <h4 class="card-title mb-4 mt-1">Sign in</h4>

                    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Your email</label>
                            <input name="username" class="form-control" placeholder="username" type="text" autocomplete="off">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            {{--                                <a class="float-right" href="#">Forgot?</a>--}}
                            <label>Your password</label>
                            <input class="form-control" name="password" placeholder="******" type="password" autocomplete="off">
                        </div> <!-- form-group// -->
                        {{--                            <div class="form-group">--}}
                        {{--                                <div class="checkbox">--}}
                        {{--                                    <label> <input type="checkbox"> Save password </label>--}}
                        {{--                                </div> <!-- checkbox .// -->--}}
                        {{--                            </div> <!-- form-group// -->--}}
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->

        </div> <!-- col.// -->

    </div> <!-- row.// -->

</div>
<!--container end.//-->

<br><br><br>

</body>
</html>
