@extends("layouts.adminindex")

@section("caption","Student List")
@section("content")

    <!-- start content area -->
    <div class="container-fluid">
        
        <div class="col-md-12 my-3">
            <a href="{{route('students.index')}}" class="btn btn-secondary btn-sm rounded-0">Close</a>

            <hr>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-body">
                        <h5 class="card-title">{{$student -> regnumber}} | <small class="text-muted">{{$student -> status["name"]}}</small></h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item fw-bold"><h6>{{$student -> firstname}} {{$student -> lastname}}</h6></li>
                    </ul>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fas fa-user fa-sm me-2"></i><span>{{$student["user"]["name"]}}</span>
                            </div>
                            <div class="col-md-6">
                                <i class="fas fa-calendar fa-sm me-2"></i><span>{{date("d M Y ",strtotime($student->created_at))}} | {{date("h:m:s a ",strtotime($student->created_at))}}</span>
                                <br>
                                <!-- date(fomat type , databaseမှvalue အား string ပြောင်းရန် strtotime() သုံးပေးရမည်) -->
                                <i class="fas fa-edit fa-sm me-2"></i><span>{{date("d M Y h:m:s A",strtotime($student->updated_at))}}</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-0">
                    <ul class="list-group rounded-0 text-center">
                        <li class="active list-group-item">Information</li>
                    </ul>

                    <!-- start remark  -->
                    <table class="table table-hover table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$student->remark}}</td>
                            </tr>
                        </tbody>
                        
                    </table>
                    <!-- end remark -->
                </div>
            </div>
        </div>
    </div>
    <!--End Content Area-->




@endsection

@section("scripts")

    <script>
        $(document).ready(function(){
            $(".delete-btns").click(function(){
                // console.log("hello");
                var getidx = $(this).data("idx");

                // console.log(getidx);

                if(confirm(`Are Your Sure!! You want to delete ${getidx}`)){
                    $("#formdelete"+getidx).submit();
                }else{

                }
            })
        })
    </script>
@endsection