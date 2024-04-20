@extends('layouts.admin')
@section('content')

<div>
@if(session('message'))
    <h6 class="alert alert-success">{{session('message')}}</h6>
@endif
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">User Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        Are you sure want to delete this data?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">User</h4>
                    <p class="card-description">
                       Users List
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                <a href="{{url('/admin/add-user')}}" class="btn btn-primary text-white">Add User</a>
                </div>
            </div>

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name </th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $index => $item)
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                                 <img src="{{asset('/uploads/user/'.$item->image)}}" alt="image" style="border-radius: 0px; width: 100px; height: auto" >
                            </td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{'/admin/user/'.$item->id.'/edit'}}" class="btn btn-success">Edit</a>
                                <a href="{{url('/admin/user/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure want to delete this data ?')"  class="btn btn-danger" >Delete</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
@push('script')
<script>
    window.addEventListener('close-modal',e=>{
        $('#deleteModal').modal('hide');
    })
</script>
@endpush
