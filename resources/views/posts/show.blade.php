@extends("layouts.adminindex")


@section("css")
    <style>
        .chat_box {
            height: 200px;
            overflow-y : scroll;
        }

        .gallery {
            width: 100%;
            background-color: #eee;
            color: #aaa;
            display: flex;
            justify-content: center;
        }
        .gallery img {
            width: 100px;
            height: 100px;


            border: 2px dashed #aaa;
            border-radius: 10px;
            object-fit: cover;
            padding: 5px;
            margin: 0 5px;
        }
        .gallery.removetxt span{
            display: none;
        }
    </style>
@endsection
@section("caption","Post List")
@section("content")

    <!-- start content area -->
    <div class="container-fluid">
        
        <div class="col-md-12 my-3">
            <a href="{{route('posts.index')}}" class="btn btn-secondary btn-sm rounded-0">Close</a>

            @if(!$post -> checkenroll($userdata->id))
            
                <a href="#createmodel" data-bs-toggle="modal" class="btn btn-primary btn-sm rounded-0">Enroll</a>

            @endif
            <hr>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-body">
                        <h5 class="card-title">{{$post -> title}} | <small class="text-muted">{{$post -> status["name"]}}</small></h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item fw-bold"><img src="{{asset($post->image)}}" class="" style="width:100px;height:100px" alt="{{$post->title}}"></li>
                    </ul>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fas fa-user fa-sm me-2"></i><span>{{$post["tag"]["name"]}}</span>
                                <br/>
                                <i class="fas fa-user fa-sm me-2"></i><span>{{$post["type"]["name"]}} : {{$post["fee"]}} </span>
                                <br/>
                                <i class="fas fa-user fa-sm me-2"></i><span>{{$post["user"]["name"]}}</span>
                            </div>
                            <div class="col-md-6">
                                <i class="fas fa-file fa-sm me-2"></i><span>{{$post["attstatus"]["name"]}}</span>
                                <br>
                                <i class="fas fa-calendar fa-sm me-2"></i><span>{{date("d M Y ",strtotime($post->created_at))}} | {{date("h:m:s a ",strtotime($post->created_at))}}</span>
                                <br>
                                <!-- date(fomat type , databaseမှvalue အား string ပြောင်းရန် strtotime() သုံးပေးရမည်) -->
                                <i class="fas fa-edit fa-sm me-2"></i><span>{{date("d M Y h:m:s A",strtotime($post->updated_at))}}</span>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <i class="fas fa-calendar fa-sm"></i>
                                <span>
                                @foreach($dayables as $dayable)
                                    {{$dayable -> name}} , 
                                @endforeach
                                </span>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <div class="rounded-0">
                    <ul class="list-group rounded-0 text-center">
                        <li class="active list-group-item">Information</li>
                    </ul>

                    <!-- start remark  -->
                    <table class="table table-hover table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Info...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <!-- html code များ အား ဖတ်စေချင်လျှင်အသုံးပြုသည် {!! !!} သည် မည်သည့် editor မှမဆို အသုံးပြုနိုင်သငည်   --> --}}
                                <td>{!! $post->content !!}</td>
                            </tr>
                        </tbody>
                        
                    </table>
                    <!-- end remark -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card rounded-0 border-0">
                            <div class="card-body">
                                <ul class="list-group chat_box">
                                    @foreach($comments as $comment)
                                        <li class="mt-2 list-group-item">
                                            <div>
                                                <p>
                                                    {{$comment->description}}
                                                </p>
                                            </div>
                                            <div >
                                                <span class="small fw-bold float-end">{{$comment->user->name}} | {{$comment->created_at->diffForHumans()}}</span>
                                            </div>
                                            
                                            
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body border-top">
                                <form action="{{route('comments.store')}}" method="POST" >

                                    @csrf 

                                    @method("POST")

                                    <div class="col-md-12 d-flex justify-content-between">
                                        <textarea name="description" id="description" rows="3" class="form-control border-0 shadow-none outline-none rounded-0 " style="resize:none;" placeholder="Comment Here....">{{old("description")}}</textarea>
                                        
                                    </div>
                                    <button type="submit" class="me-auto btn btn-info btn-sm text-light ms-3"><i class="fas fa-paper-plane"></i></button>

                                    <!-- start Hidden fields -->
                                    <input type="hidden" name="commentable_id" id="commentable_id" value="{{$post->id}}">

                                    <input type="hidden" name="commentable_type" id="commentable_type" value="App\Models\Post">
                                    <!-- end Hidden fields -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--End Content Area-->

    {{-- start model area --}}
        <!-- start create modal -->
        <div id="createmodel" class="modal fade">
            <div class="modal-dialog modal-md modal-dialog-center">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h6 class="modal-title">Enroll Form</h6>
                        <button type="type" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form_action" action="{{route('enrolls.store')}}" method="POST" enctype="multipart/form-data" class=""> 

                            {{csrf_field()}}
                            {{method_field("POST")}}
                            <div class="col-md-12 form-group mb-3">
                                <div class="gallery" style="h-100 ">
                                    <label for="image" class="w-100 h-100 text-center">
                                        <span>Choose Images</span>
                                    </label>
                                    
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                    <label for="remark">Remark <span class="text-danger">*</span></label>
                                    <textarea type="text" name="remark" id="remark" class="form-control rounded-0" placeholder="Enter Remark" rows="3">{{old('remark')}}</textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">

                                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
                                    </div>
                                </div>

                                {{-- start hidden fields --}}
                                <input type="file" name="image" id="image" class="form-control  rounded-0" hidden >
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>

        </div>
        <!-- end create modal -->
    {{-- end model area --}}




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

            // start preview img
            var previewimages = function(input , output){
                // console.log(input,output)
                if(input.files){
                    var totalfiles = input.files.length;
                    console.log(totalfiles);

                    if(totalfiles > 0) {
                        $(".gallery").addClass("removetxt");
                    }else {
                        $(".gallery").removeClass("removetxt");
                    }
                    

                    for(var i = 0 ; i < totalfiles ; i++){
                        // console.log(i);

                        var filereader = new FileReader(); // input တွင် ဝင်လာသော file အား ဖတ်ပေးခြင်းဖြစ်သည် 

                        filereader.onload = function(e){ // e သည် file ကို ဖတ်လိုက်သော အခါ input result ကို ပြပေးမည်
                            $(output).html(" ");
                            $($.parseHTML("<img>")).attr("src",e.target.result).appendTo(output);

                            // image tag အား attr ဖြင့် src တည်ဆောက်သည်  ပတ်လမ်းကြောင်းသည် target အတွင်းရှိ result ကို ထည့်ပေးရမည်
                        }

                        filereader.readAsDataURL(input.files[i]); // file data တစ်ခုချင်းစီ အား loop ပတ်ပြီး ဖတ်ပေးမည်ဖြစ်သည် 
                    }
                }
            }
            $("#image").change(function(){
                previewimages(this,".gallery")
            })
            // start preview img
        })
    </script>
@endsection