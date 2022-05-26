@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Unit Name</th>
                        <th>Unit Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units as $unit)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$unit->name}}</td>
                        <td>{{$unit->description}}</td>
                        <td>{{$unit->status}}</td>
                        <td>
                            <a href="{{route('edit-unit', ['id' => $unit->id])}}" class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('delete-unit', ['id' => $unit->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
