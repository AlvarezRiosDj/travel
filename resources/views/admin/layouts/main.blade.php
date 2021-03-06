<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {!!Html::style('assets/admin/css/bootstrap.min.css')!!}
    {!!Html::style('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')!!}
    
</head>
<body>
    @include('admin.layouts.nav')
    @yield('content')
    {!!Html::script('assets/admin/js/jquery-3.4.1.min.js')!!}
    {!!Html::script('assets/admin/js/bootstrap.min.js')!!}
    {!!Html::script('https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js')!!}
    <script>
        $(document).ready(function () {
                bsCustomFileInput.init()
            })
    </script>
    @yield('script')
</body>
</html>