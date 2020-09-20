<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>DIDI Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    {{Html:: style('assets/css/bootstrap.min.css')}}
    {{Html:: style('assets/css/animate.min.css')}}
    {{Html:: style('assets/css/paper-dashboard.css')}}
    {{Html:: style('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}
    {{Html:: style('https://fonts.googleapis.com/css?family=Muli:400,300')}}
    {{Html:: style('assets/css/themify-icons.css')}}
    {{Html:: style('assets/css/style.css')}}

</head>
<body>

<div class="wrapper">

    @include('admin.layouts.sidebar')

    <div class="main-panel">
        
        @include('admin.layouts.navbar')

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
     @include('admin.layouts.footer')

    </div>
</div>

{{Html::script('assets/js/jquery-1.10.2.js')}}
{{Html::script('assets/js/bootstrap.min.js')}}
{{Html::script('assets/js/imageviewer.js')}}
</body>
</html>
