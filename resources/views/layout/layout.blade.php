<!--
 =========================================================
 * Material Kit - v2.0.6
 =========================================================

 * Product Page: https://www.creative-tim.com/product/material-kit
 * Copyright 2019 Creative Tim (http://www.creative-tim.com)
   Licensed under MIT (https://github.com/creativetimofficial/material-kit/blob/master/LICENSE.md)


 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>xkcd: Drone Fishing</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="<?php echo url('/') ?>/css/material-kit.css?v=2.0.6" rel="stylesheet" />
    <link href="<?php echo url('/') ?>/css/myStyle.css" rel="stylesheet" />
</head>
<body>

    @yield('content')

<footer class="footer footer-default">
    <div class="container">
        <nav class="float-left">
            <ul>
                <li>
                    <a href="https://xkcd.com">
                        <?php echo date("Y"); ?> - hwmvc
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @stack('scripts')
</footer>
</body>
</html>
