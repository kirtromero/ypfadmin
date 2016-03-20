<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YPF Registration Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- MetisMenu CSS -->
    <link href="http://youpornflix.com/ypf/public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://youpornflix.com/ypf/public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form class="smart-form client-form form-horizontal"
                            method="post"
                            data-bv-message="This value is not valid"
                            data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                            data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                            data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
                            action="/auth/register">

                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <header>
                                    User Registration
                                </header>

                                <fieldset>

                                    <section>
                                        <label class="label">Email</label>
                                        <input type="text" class="form-control" name="email"

                                        autocomplete="off"
                                        data-bv-notempty="true"
                                        data-bv-notempty-message="The email field is required and cannot be empty."
                                        data-bv-emailaddress="true"
                                        data-bv-emailaddress-message="The value is not a valid email address."
                                        />
                                    </section>

                                    <section>
                                        <label class="label">Password</label>
                                        <input type="password" class="form-control" name="password"

                                        autocomplete="off"
                                        data-bv-notempty="true"
                                        data-bv-notempty-message="The password field is required and cannot be empty."
                                        data-bv-stringlength="true"
                                        data-bv-stringlength-min="8"
                                        data-bv-stringlength-max="20"
                                        data-bv-stringlength-message="Password must be between 8 to 12 characters in length."
                                        />
                                    </section>

                                    <section>
                                        <label class="label">Repeat Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"

                                        autocomplete="off"
                                        data-bv-identical="true"
                                        data-bv-identical-field="password"
                                        data-bv-identical-message="You have entered a different value than tha password field."
                                        data-bv-notempty="true"
                                        data-bv-notempty-message="The password field is required and cannot be empty"
                                        />
                                    </section>

                                    <section>
                                        <label class="label">Name</label>
                                        <input type="text" class="form-control" name="name"

                                        autocomplete="off"
                                        data-bv-notempty="true"
                                        data-bv-notempty-message="The first name field is required and cannot be empty."
                                        />
                                    </section>

                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </footer>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://youpornflix.com/ypf/public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://youpornflix.com/ypf/public/dist/js/sb-admin-2.js"></script>

</body>

</html>
