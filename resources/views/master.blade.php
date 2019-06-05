<html>
<head>
    <title> @yield('title') </title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
.v-sep{
    height: 100px;
}
.navbar-default {
    border-color: #7c7777;
    border-bottom-width: 2px;
}
.navbar-nav {

    font-weight: bold;
}
</style>
</head>
<body>
    @include('shared.navbar')
<div class="v-sep"></div>
    @yield('content')
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

</body>
</html>