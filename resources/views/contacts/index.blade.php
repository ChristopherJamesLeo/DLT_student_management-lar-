@extends("layouts.adminindex")
@section("css")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection
@section("caption","Contact List")
@section("content")

    <!-- start content area -->
    <div class="container-fluid">
        
        <a href="#createmodel" class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal">Create</a>

        <hr>
    
        <table id="mytable" class="table table-hover border">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthday</th>
                    <th>Relative</th>
                    <th>By</th>
                    <th>Create At</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($contacts as $idx=>$contact) 
                
                <tr>

                    <td>{{++$idx}}</td>
                    <td>{{$contact->firstname}}</td>
                    <td>{{$contact->lastname}}</td>
                    {{-- data ရှိမရှီကို tinary operator ဖြင့် စစ်ပြိး ရှိပြီဆိုမှ ဖော်ပြပေးမည်  --}}
                    <td>{{$contact->birthday ? date("d M y",strtotime($contact->birthday)) : ""}}</td>
                    <td>{{$contact->relative_id ? $contact["relative"]["name"] : "" }}</td>
                    <td>{{$contact["user"]["name"] }}</td>
                    
                     
                    <td>{{$contact->created_at->format('d m Y')}}</td>
                    <td>{{$contact->updated_at->format('d M Y')}}</td>
                    <td>
                        <a href="javascript:void(0)" class="me-3 btn btn-outline-info btn-sm edit_form" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{$contact->id}}" data-name="{{$contact->name}}" data-status="{{$contact->relative_id}}"><i class="fas fa-pen"></i></a>
                        
                        <a href="#" class="text-danger me-3 delete-btns" data-idx = "{{$contact->id}}" ><i class="fas fa-trash"></i></a>

                    </td>
                    <form id="formdelete{{$contact->id}}" action="{{route('contacts.destroy',$contact->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>

                    
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
    </div>
    <!--End Content Area-->


        <!-- START MODAL AREA-->

        <!-- start edit modal -->
        <div id="createmodel" class="modal fade">
            <div class="modal-dialog modal-sm modal-dialog-center">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h6 class="modal-title">Create Form</h6>
                        <button type="type" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form_action" action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data" class=""> 

                            {{csrf_field()}}
                            {{ method_field("POST") }}

                            <div class="row">
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                    <label for="firstname">Firstname <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control rounded-0" placeholder="Enter First Name" value="{{old('firstname')}}">
                                </div>
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                    <label for="lastname">Lastname <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control rounded-0" placeholder="Enter Last Name" value="{{old('lastname')}}">
                                </div>
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                    <label for="birthday">Birthday <span class="text-danger">*</span></label>
                                    <input type="date" name="birthday" id="birthday" class="form-control rounded-0" placeholder="Enter birthday" value="{{old('birthday')}}">
                                </div>
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                     <label for="relative_id">Relatives</label>
                                     <select name="relative_id" id="relative_id" class="form-control rounded-0">
                                        @foreach($relatives as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach

                                     </select>
                                 </div>

                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">

                                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
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

        <!-- start edit modal -->
        <div id="editmodal" class="modal fade">
            <div class="modal-dialog modal-sm modal-dialog-center">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Form</h6>
                        <button type="type" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editform_action" action="" method="POST" enctype="multipart/form-data" class=""> 

                            @csrf 
                            @method("PUT")

                            <div class="row">
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="editname" class="form-control rounded-0" placeholder="Enter Stage Name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-12 col-sm-12 form-group mb-1">
                                     <label for="editstatus_id">Relative</label>
                                     <select name="status_id" id="editrelative_id" class="form-control rounded-0">
                                        @foreach($relatives as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach

                                     </select>
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
{{-- datatable css1 js1 --}}
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
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

            $(document).on("click",".edit_form",function(e){
                e.preventDefault();
                $("#editname").val($(this).data("name"));
                $("#editstatus_id").val($(this).data("status"));

                const getid = $(this).data("id");

                console.log($("#form_action"));

                $("#editform_action").attr('action',`/contacts/${getid}`);
                
            }) 
            $("#mytable").DataTable();
        })
    </script>
@endsection

<!-- Day (sunday) -->
<!-- Polymorph (m to m) -->