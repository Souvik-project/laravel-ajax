@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Laravel AJAX Example</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Add Info
            </button>
        </div>
    </div>
    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
					<th>Phone</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody id="infos-list" name="infos-list">
                @foreach ($info as $data)
                <tr id="info{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
					<td>{{$data->phone}}</td>
					<td>
					<button class="btn btn-success btn-update" data-id="{{ $data->id }}">
                Update Info
            </button>
			<button class="btn btn-danger btn-delete" data-id="{{ $data->id }}">
               Delete
          </button>
			</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Create Info</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" value="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="">
                            </div>
							<div class="form-group">
                                <label>Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter Phone" value="">
                            </div>
							<div class="form-group">
                                <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="info_id" name="info_id" value="0">
                    </div>
                </div>
            </div>
        </div>
		
		<div class="modal fade" id="updateFormModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Info</h4>
            </div>
            <div class="modal-body">
                <form id="updateForm" name="updateForm" class="form-horizontal" novalidate="">
				@csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="update_name" name="update_name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="update_email" name="update_email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="update_phone" name="update_phone" placeholder="Enter Phone">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save-update" value="update">Save Changes</button>
				 <input type="hidden" id="info_id_update" name="info_id_update" value="0">
            </div>
        </div>
    </div>
</div>
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="btn-confirm-delete">Delete</button>
				 <input type="hidden" id="delete-info-id" name="delete-info-id" value="0">
            </div>
        </div>
    </div>
</div>


    </div>
</div>
@endsection