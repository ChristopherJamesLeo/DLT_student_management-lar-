@extends("layouts.adminindex")
@section("css")
<style>
.nav {
    display: flex;
    padding: 0;
    margin: 0;

}
.nav .nav-item {
    list-style: none;
}
.nav .tablinks {
    padding: 14px 16px;
    border: none;
    outline: none;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}

.nav .tablinks:hover {
    background-color: #f3f3f3;
}
.nav .tablinks.active {
    color: blue;
}

.tab-pane {
    padding: 6px 12px;
    display: none;
}

    </style>
@endsection
@section("caption","Student List")
@section("content")

    <!-- start content area -->
    <div class="container-fluid">
        
        <div class="col-md-12 my-3">

            <a href="javascript:void(0)" id="btn_back" class="btn btn-secondary btn-sm rounded-0">Back</a>

            <a href="{{route('students.index')}}" class="btn btn-secondary btn-sm rounded-0">Close</a>

            <hr>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-3 mb-2">
                <h6>Info</h6>
                <div class="card border-0 shadow rounded-0">
            

                    
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center mb-3">
                            <div class="h5 mb-1">{{$student->firstname}} {{$student->lastname}}</div>
                            <div class="text-muted">
                                <span>{{$student->regnumber}}</span>
                            </div>
                        </div>
                        <div class="w-100 d-flex flex-row justify-content-between mb-3">
                            <button type="button" class="w-100 me-2 btn btn-primary btn-sm rounded-0">Like</button>
                            <button type="button" class="w-100 btn btn-outline-primary btn-sm rounded-0">Follow</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-5">
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">Status</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="">
                                                {{$student->status["name"]}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">Authorize</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="">
                                                {{$student["user"]["name"]}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-sm "></i>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">Created At</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="">
                                                {{date("d M Y ",strtotime($student->created_at))}} | {{date("h:m:s a ",strtotime($student->created_at))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-edit fa-sm "></i>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">Updated At</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="">
                                                {{date("d M Y h:m:s A",strtotime($student->updated_at))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p class="text-small text-muted text-uppercase mb-2">Personal Info</p>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>



                        </div>
                        <div class="mb-5">
                            <p class="text-small text-muted text-uppercase mb-2">Contact Info</p>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>
                            <div class="row gap-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-info"></i>
                                </div>
                                <div class="col">
                                    Sample Date
                                </div>
                                
                            </div>



                        </div>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <h6>Enrolls</h6>
                <div class="mb-4 card border-0 shadow rounded-0">
                    <div class="card-body d-flex flex-wrap gap-3">

                        @foreach($enrolls as $enroll)
                        <div class="border shadow p-3 mb-3 enrollboxes">
                            <a href="javascript:void(0)">{{$enroll->post["title"]}}</a>
                            <div class="text-muted">{{$enroll->stage->name}}</div>
                            <div class="text-muted">{{date("d M Y",strtotime($enroll ->created_at))}} | {{date("h:i:s A",strtotime($enroll ->created_at))}}</div>
                            <div class="text-muted">{{$enroll ->updated_at->format("d M Y | h:i:s A")}}</div>
                            {{-- <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::limit($enroll ->remark,20)}}</div> --}}
                            {{-- <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::limit($enroll ->remark,10,"***")}}</div> --}}
                            {{-- <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::of($enroll ->remark)->limit(10)}}</div> --}}
                            {{-- <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::of($enroll ->remark)->words(2)}}</div> --}}
                            {{-- <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::of($enroll ->remark)->words(2,">>>")}}</div> --}}
                            {{-- စကားစုနှစ်စု ဘဲလက်ခံမည်  --}}
                            {{-- <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::words($enroll ->remark,1)}}</div> --}}
                            <div class="mt-1 text-muted" title="{{$enroll ->remark}}">{{Str::words($enroll ->remark,1,"--")}}</div>
                            
                        </div>
                        @endforeach
                        

                    </div>

                </div>

                <h6>Additional Info</h6>

                <div class="mb-4 card border-0 shadow rounded-0">
                    <ul class="nav">
                        <li class="nav-item "><button type="button" id="autoclick" class="tablinks active" onclick="gettab(event,'follower')">Follower</button></li>
                        <!-- event ကို html မှ parameter  ပေးရန် event ဟု အပြည့်အပြည့်စုံရေးပေးရမည် -->
                        <li class="nav-item"><button type="button" id="" class="tablinks" onclick="gettab(event,'following')">Following</button></li>
                        <li class="nav-item"><button type="button" id="" class="tablinks" onclick="gettab(event,'liked')">Liked</button></li>
                        <li class="nav-item"><button type="button" id="" class="tablinks" onclick="gettab(event,'remark')">Remark</button></li>
                    </ul>


                    <div class="tab-content">
                        <div id="follower" class="tab-pane">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim id consequuntur explicabo ea eveniet qui ipsum quae commodi similique fuga ipsam reiciendis officia, tempora sapiente porro modi distinctio autem! Repellendus!
                                Quaerat optio mollitia beatae? Similique est, molestias eius quos voluptas porro necessitatibus sit facere repellat unde beatae accusamus id distinctio dolore tempora dolorem modi earum numquam laborum provident debitis architecto.
                                Provident minima est laudantium fugit dicta atque esse excepturi repudiandae quo iusto ipsam, animi id nulla, consectetur commodi quisquam facilis at accusamus dolorum iste et pariatur odit. Temporibus, dignissimos alias!
                            </p>
                        </div>
                        <div id="following" class="tab-pane">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim id consequuntur explicabo ea eveniet qui ipsum quae commodi similique fuga ipsam reiciendis officia, tempora sapiente porro modi distinctio autem! Repellendus!
                                Quaerat optio mollitia beatae? Similique est, molestias eius quos voluptas porro necessitatibus sit facere repellat unde beatae accusamus id distinctio dolore tempora dolorem modi earum numquam laborum provident debitis architecto.
                                Provident minima est laudantium fugit dicta atque esse excepturi repudiandae quo iusto ipsam, animi id nulla, consectetur commodi quisquam facilis at accusamus dolorum iste et pariatur odit. Temporibus, dignissimos alias!
                            </p>
                        </div>
                        <div id="liked" class="tab-pane">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim id consequuntur explicabo ea eveniet qui ipsum quae commodi similique fuga ipsam reiciendis officia, tempora sapiente porro modi distinctio autem! Repellendus!
                                Quaerat optio mollitia beatae? Similique est, molestias eius quos voluptas porro necessitatibus sit facere repellat unde beatae accusamus id distinctio dolore tempora dolorem modi earum numquam laborum provident debitis architecto.
                                Provident minima est laudantium fugit dicta atque esse excepturi repudiandae quo iusto ipsam, animi id nulla, consectetur commodi quisquam facilis at accusamus dolorum iste et pariatur odit. Temporibus, dignissimos alias!
                            </p>
                        </div>
                        <div id="remark" class="tab-pane">
                            <p>
                                {{$student->remark}}
                            </p>
                        </div>
                    </div>

                </div>



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

            // start back btn
            $("#btn_back").click(function(){
                
            })
            
            // end back btn

        })
        const getBtnBack = document.querySelector("#btn_back");
        getBtnBack.addEventListener("click",function(){
            // window.history.back();
            window.history.go(-1); // window page history ကို ရြှေနောက် ကြိုက်သလို ပေးလို့ရသည် 
        })

// start tabs box
// Get Ui
        var gettablinks = document.getElementsByClassName("tablinks");
        var gettabpanes = document.getElementsByClassName("tab-pane");


        function gettab(even,link){

            var tabpanes = Array.from(gettabpanes);
            tabpanes.forEach(function(tabpane){
            tabpane.style.display = "none";
            })
            for(let i = 0 ; i < gettablinks.length ; i++){
                gettablinks[i].className = gettablinks[i].className.replace(" active","")

                
            }
            document.getElementById(link).style.display = "block";

            even.currentTarget.className += " active";
        }

        document.getElementById("autoclick").click(); // page စ run သည် နှင့် click ခေါက်ထားမည်ဟုဆိုလိုသည်

        // end tabs box
    </script>
@endsection