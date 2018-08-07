@extends('layouts.master')

{{-- @extends('layouts.sidebar') --}}

@section('content')
	<div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Top navigation, centered content layout <span class="label label-primary">NEW</span></h4>
                    <small>(optional layout)</small>
                    <p>Avalible configure options</p>
                    <span class="simple_tag">Scroll navbar</span>
                    <span class="simple_tag">Top fixed navbar</span>
                    <span class="simple_tag">Boxed layout</span>
                    <span class="simple_tag">Scroll footer</span>
                    <span class="simple_tag">Fixed footer</span>
                    <div class="m-t-md">
                        <p>Check the Dashboard v.4 with top navigation layout</p>
                        <div class="p-lg ">
                        <a href="dashboard_4.html"><img class="img-responsive img-shadow" src="img/dashbard4_2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Basci left side nabigation layout </h4><small>(main layout)</small>
                    <p>Avalible configure options</p>
                    <span class="simple_tag">Collapse menu</span>
                    <span class="simple_tag">Fixed sidebar</span>
                    <span class="simple_tag">Scroll navbar</span>
                    <span class="simple_tag">Top fixed navbar</span>
                    <span class="simple_tag">Boxed layout</span>
                    <span class="simple_tag">Scroll footer</span>
                    <span class="simple_tag">Fixed footer</span>
                    <div class="m-t-md">
                        <p>Check the Dashboard v.4 with basic layout</p>
                        <div class="p-lg">
                            <a href="dashboard_4_1.html"><img class="img-responsive img-shadow" src="img/dashbard4_1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection