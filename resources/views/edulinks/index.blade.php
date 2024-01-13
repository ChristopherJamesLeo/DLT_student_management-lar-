@extends("layouts.adminindex")
@section("css")
@endsection
@section("caption","Download List")
@section("content")

    <!-- start content area -->
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('edulinks.store')}}" method="POST" enctype="multipart/form-data" class=""> 

                     {{csrf_field()}}
                     @method("POST")

                     <div class="row">
                         <div class="col-md-4 col-sm-12 form-group mb-1">
                             <label for="classdate">Class Date <span class="text-danger">*</span></label>
                             @error("classdate")
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                             <input type="date" name="classdate" id="classdate" class="form-control rounded-0 @error("classdate") is-invalid @enderror" placeholder="Enter Attendance Name" value="{{old('classdate')}}">
                         </div>
                         <div class="col-md-4 col-sm-12 form-group mb-1">
                             <label for="post_id">Class</label>
                             @error("post_id")
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                             <select name="post_id" id="post_id" class="form-control rounded-0 @error("post_id") is-invalid @enderror">
                                <option selected disabled>Choose Class</option>
                                @foreach($posts as $id => $title)
                                    <option value="{{$id}}">{{$title}}</option>
                                @endforeach
                                
                             </select>
                         </div>
                         <div class="col-md-4 col-sm-12 form-group mb-1">
                             <label for="url">URL Colde<span class="text-danger">*</span></label>
                             @error("url")
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                             <input type="text" name="url" id="url" class="form-control rounded-0 @error("url") is-invalid @enderror" placeholder="Enter URL" value="{{old('url')}}">
                         </div>
                         
                         <div class="col-md-12">
                             <div class="d-flex justify-content-end">
                                 <button type="reset" class="btn btn-secondary btn-sm rounded-0 ms-3">Cancel</button>
                                 <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
                             </div>
                         </div>

                     </div>
                 </form>
            </div>
        </div>

        <hr>
        
        <div class="col-md-12">
            <form action="" method="">
                <div class="row justify-content-end">
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="form-group">
                            <select name="filter" id="filter" class="form-select form-control-sm rounded-0" value="{{request("filter")}}">
                                {{-- အားလုံးပြရန် value ကို " " ထားပေးရမည် method 1 --}}
                                {{-- <option value=" " selected >Choose Status...</option> --}}
                                @foreach ($filterposts as $id => $title)
                                {{-- database မှ id နှင့် queryမှ id သည် datatype ကွဲနိုင်သောကြာင့် == ဖြင့်သာ စစ်သင့်သည်  --}}
                                    <option value="{{$id}}" {{$id == request("filter") ? "selected" : " " }}>{{$title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <input type="text" name="search" id="filtername" class="form-control form-control-sm rounded-0" placeholder="Search..." value="{{request("search")}}">
                            <button type="submit" id="btn-search" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                            <button type="button" id="btn-clear" class="btn btn-secondary"><i class="fas fa-sync"></i></button>

                            
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <table id="mytable" class="table table-hover border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Class</th>
                    <th>URL</th>
                    <th>By</th>
                    <th>Class Date</th>
                    <th>Create At</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($edulinks as $idx=>$edulink) 
                
                <tr>

                    {{-- <td>{{++$idx}}</td> --}}
                    <td>{{$idx + $edulinks->firstItem()}}</td>
                    {{-- <td>{{$enroll ->student($enroll->user_id)}}</td> --}}
                    <td><a href="{{route('posts.show',$edulink->post_id)}}">{{$edulink->post["title"]}}</a></td>
                    <td>
                        <a href="javascript:void(0)" class="link_btns" title="Copy Link"
                        data-url = "{{$edulink ->url}}"
                        >
                            {{Str::limit($edulink ->url,30)}}
                        </a>
                    </td>
                    
                    <td>{{$edulink['user']['name']}}</td>
                    <td>{{date("d m y",strtotime($edulink->classdate))}}</td>
                     
                    <td>{{$edulink->created_at->format('d M Y | h:m A')}}</td>
                    <td>{{$edulink->updated_at->format('d M Y')}}</td>
                    <td>
                        <a href="{{$edulink ->url}}" class="me-3 btn btn-outline-info btn-sm text-primary ms-2 " target="_blank" download="downloadname">
                        
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="javascript:void(0)" class="me-3 btn btn-outline-info btn-sm edit_form">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>

                    
                </tr>
                @endforeach
            </tbody>
            
        </table>
        <div class="d-flex justify-content-center">
            {{-- appends(request()->only("filter")) သည် filter ချ်ပြီး pagination သွားပါက အားလံဒး ပျောက်သွားသည် error ကို ဖျောက်ပေးသည်  --}}
            {{$edulinks -> appends(request()->only("filter")) -> links("pagination::bootstrap-4")}}
        </div>
       
        
    </div>
    <!--End Content Area-->

        <!-- START MODAL AREA-->
        <!-- start edit modal -->
        <div id="editmodal" class="modal fade">
            <div class="modal-dialog modal-md modal-dialog-center">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Form</h6>
                        <button type="type" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form_action" action="" method="POST" enctype="multipart/form-data" class=""> 

                            {{csrf_field()}}
                            {{ method_field("PUT") }}

                            <div class="row">
                                {{-- <div class="col-md-4 col-sm-12 form-group mb-1">
                                    <label for="editstage_id">Permission</label>
                                     <select name="stage_id" id="editstage_id" class="form-control rounded-0">
                                        @foreach($stages as $stage)
                                            <option value="{{$stage->id}}">{{$stage->name}}</option>
                                        @endforeach
                                     </select>
                                 </div> --}}
                                <div class="col-md-8 col-sm-12 form-group mb-1">
                                     <label for="editpost_id">Remark</label>
                                     <textarea name="remark" class="form-control rounded-0" id="" cols="30" rows="3"></textarea>
                                 </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Update</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>

        </div>
        <!-- end edit modal -->
    <!-- END MODAL AREA -->




@endsection

@section("scripts")

    <script>
        // start filter
        document.getElementById("btn-clear").addEventListener("click",function(){
           
            window.location.href = window.location.href.split("?")[0]+"?filter=";

        })
        document.getElementById("filter").addEventListener("change",function(){
            let getfilterid = this.value || this.options[this.selectedIndex].value;
            window.location.href = window.location.href.split("?")[0]+"?filter="+getfilterid;

        })
        // end filter

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

            // start link btn url copy
            $(".link_btns").click(function(){
                var getUrl = $(this).data("url");
                // window.alert("Copied Link");
                navigator.clipboard.writeText(getUrl); // insert click board
            })
            // end link btn url copy

            $(document).on("click",".edit_form",function(e){
                e.preventDefault();
                // console.log("hello");
                // console.log($(this).attr("data-name"));
                // console.log($(this).data("id"));
                $("#editname").val($(this).data("name"));
                $("#editstage_id").val($(this).data("status"));

                const getid = $(this).data("id");

                // $("#form_action").attr('action',`\{\{route('statuses.update',$status->id)\}\}`); // error 

                // use method 1
                // $("#form_action").attr('action',`http://127.0.0.1:8000/statuses/${getid}`);

                // method 2
                $("#form_action").attr('action',`/edulinks/${getid}`);
                
            })
            // for my table
        })
    </script>
@endsection

<!-- edit show -->

{{--  --}}