<!doctype html>
<html lang="en" ng-app>
    <head>
        <title>The Thirsty Terp</title>
        <LINK REL="icon" HREF="favicon.ico">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="/favicon.ico">

        <style>
            html,body{
                height:100%;
                margin: 0;
                padding:0;
            }
            *:focus {
                outline: 0;
            }
            body {
                font-family: 'Lato';
            }
            /* Everything but the jumbotron gets side spacing for mobile first views */
            .header,
            .footer {
              padding-right: 15px;
              padding-left: 15px;
            }

            /* Custom page header */
            .header {
              padding-bottom: 20px;
              border-bottom: 1px solid #e5e5e5;
            }
            /* Make the masthead heading the same height as the navigation */
            .header h3 {
              margin-top: 0;
              margin-bottom: 0;
              line-height: 40px;
            }

            /* Custom page footer */
            .footer {
              padding-top: 19px;
              color: #777;
              border-top: 1px solid #e5e5e5;
            }

            /* Customize container */
            @media (min-width: 768px) {
              .container {
                max-width: 730px;
              }
            }
            .container-narrow > hr {
              margin: 30px 0;
            }
            .footer {
              padding-top: 19px;
              color: #777;
              border-top: 1px solid #e5e5e5;
            }

            /* Responsive: Portrait tablets and up */
            @media screen and (min-width: 768px) {
              /* Remove the padding we set earlier */
              .header,
              .footer {
                padding-right: 0;
                padding-left: 0;
              }
              /* Space out the masthead */
              .header {
                margin-bottom: 30px;
              }
            }
        </style>
        <!-- <link rel="stylesheet" href="./css/quill.snow.css"> -->
    </head>

    <body>
        <div id='app'></div>

        <script>
            window.user = {!! Auth::guest() ? 'false' : Auth::user()->toJSON() !!};
            window.user.admin = {!! Auth::guest() ? 'false' : Auth::user()->cmsEntry()!!};
            window.token = "{!! csrf_token() !!}";
        </script>

        <script src="./js/application.js"></script>

        <script>
            !function(doc,script,id){var js,fjs=doc.getElementsByTagName(script)[0],p=/^http:/.test(doc.location)?'http':'https';if(!doc.getElementById(id)){js=doc.createElement(script);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
        </script>
    </body>
</html>
