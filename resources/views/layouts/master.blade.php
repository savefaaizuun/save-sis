<!-- <!DOCTYPE html>
<html>
<head>
	<title>Latihan Blade Templates</title>
</head>
<body>
@include('layouts.header')

	@yield('content')

</body>
</html> -->

<!DOCTYPE html>
<html>

<head>
    @include('layouts.head')
</head>

<body>

	@include('layouts.sidebar')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Layouts</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong>Layouts</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h2><span class="text-navy">INSPINIA - Responsive Admin Theme</span>
                    is provided with two main layouts <br/>three skins and separate configure options.</h2>

                    <p>
                        All config options you can trun on/off from the theme box configuration (green icon on the left side of page).
                    </p>


                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    @yield('content')


</div>

@include('layouts.footer')

<script>
    $(document).ready(function(){


    });
</script>


</body>

</html>
