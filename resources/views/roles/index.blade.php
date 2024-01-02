@extends("layouts.adminindex")
@section("css")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection
@section("caption","Role List")
@section("content")

    <!-- start content area -->
    <div class="container-fluid">
        
        <div class="col-md-12 my-3">
            <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm rounded-0">Create</a>

            <hr>
        </div>

    
        <table id="mytable"  class="table table-hover border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Create At</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($roles as $idx=>$role) 
                
                <tr>

                    <td>{{++$idx}}</td>
                    <td>
                        <a href="{{route('roles.show',$role->id)}}">
                            <img src="{{asset($role->image)}}" class="rounded-circle" style="width:40px;height:40px" alt="{{$role->image}}">
                        </a>
                        
                    </td>

                    
                    <td>{{$role->name}}</td>
                    <td>{{$role->status->slug}}</td>
                    <td>{{$role->user["name"]}}</td>
                     
                    <td>{{$role->created_at->format('d m Y')}}</td>
                    <td>{{$role->updated_at->format('d M Y')}}</td>
                    <td>
                        <a href="{{route('roles.edit',$role->id)}}" class="me-3 btn btn-outline-info btn-sm"><i class="fas fa-pen"></i></a>
                        
                        <a href="#" class="text-danger me-3 delete-btns" data-idx = "{{$role->$idx}}" ><i class="fas fa-trash"></i></a>

                    </td>
                    <form id="formdelete{{$role->$idx}}" action="{{route('roles.destroy',$role->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    

                    

                    
                    
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
    </div>
    <!--End Content Area-->




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
            $("#mytable").DataTable();
        })
    </script>
@endsection