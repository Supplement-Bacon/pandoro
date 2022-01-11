<a href="#" class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#editUser-{{ $user->id }}">
    <i data-feather="edit-2" class="mr-2"></i> Edit
</a>

<div class="modal fade" id="editUser-{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if ( $isCreate )
                    <h5 class="modal-title">Edit {{ $user->fullName }} infos</h5>
                @else
                    <h5 class="modal-title">Create user</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ( $method != 'POST' )
                        @method( $method )
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First name</label>
                        <div class="col-sm-9">
                            @if ( $isCreate )
                                <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{ old('first_name') }}" >
                            @else
                                <input type="text" class="form-control" name="first_name" placeholder="First name" value="{{ $user->first_name }}" >
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last name</label>
                        <div class="col-sm-9">
                            @if ( $isCreate )
                                <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" >
                            @else
                                <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ $user->last_name }}" >
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            @if ( $isCreate )
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" >
                            @else
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" >
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            @if ( $isCreate )
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}" >
                            @else
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $user->phone }}" >
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Picture</label>
                        <div class="col-sm-9">
                            <input type="file" name="picture" class="custom-file-input" id="input-ticket-document">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('component_js')

@endpush