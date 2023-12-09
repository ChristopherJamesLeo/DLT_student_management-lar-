@include("layouts.adminheader")
    <!--Start Site Setting-->
    
    <!--End Site Setting-->

<div>
    
    <!-- start left side bar -->
    @include("layouts.adminleftsidebar")
    <!-- end left side bar -->

    <!-- start content area -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-9 pt-md-5 ms-auto">

                    <!--Start inner Area-->
                    <div class="row">
                        <h5>@yield("caption")</h5>
                        @yield("content")
                    </div>
                    <!-- end inner area -->

                </div>
            </div>
        </div>
    </section>
    <!-- end content area -->

</div>




@include("layouts.adminfooter")