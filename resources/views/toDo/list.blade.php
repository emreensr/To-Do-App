@extends('layout.app')

@section('content')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-12">
                    <div class="card rounded-6">
                        <div class="card-body p-4">
                            @if(session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-9">
                                        <h4 class="my-3 pb-3">To Do List</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ route('toDoCreate') }}"><button class="btn btn-primary mt-2"><i class="fa fa-plus mr-2"></i>Add Task</button></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($toDoList as $list)
                                    @if(\Carbon\Carbon::parse($list->expiry_date)->lessThan(\Carbon\Carbon::now()))
                                        <tr class="expiry">
                                    @endif
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->description }}</td>
                                        <td>{{ $list->priority }}</td>
                                        <td>{{ $list->expiry_date }}</td>
                                        <td>
                                            <input type="checkbox" class="status" data-id="{{ $list->id }}" @if($list->status == 1) checked @endif  data-toggle="toggle" data-onstyle="success">
                                        </td>
                                        <td>
                                            <a href="{{ route('toDoEdit', $list->id) }}">
                                                <button type="button" class="btn btn-primary ms-1">Edit</button>
                                            </a>
                                            <a href="{{ route('toDoDelete', $list->id) }}">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<style>
    tr.expiry {
        background: red !important;
        color: white;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.status').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var task_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: 'changeStatus',
                data: {
                    'status': status,
                    'task_id': task_id
                },
                success: function(data){
                    Swal.fire(
                        'YES!',
                        'The status has been changed!',
                        'success'
                    )}
            });
        })
    });
</script>
