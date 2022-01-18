@extends('layout.app')

@section('content')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-12">
                    <div class="card rounded-6">
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h4 class="text-center my-3 pb-3">To Do App</h4>
                            <form action="{{ route('toDoSave') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Task Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="exampleFormControlInput1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Task Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ old('name') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Priority</label>
                                    <select class="form-control" name="priority" id="exampleFormControlSelect1">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Expiry Date</label>
                                    <input type="date" class="form-control"  name="expiry_date" id="exampleFormControlInput1">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
