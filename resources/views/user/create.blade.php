@extends('template.main')
@section('content')
<div class="row">
    <div class="col-md-12" >
        <div class="overview-wrap">
            <h2 class="title-1">Add User</h2>
            
        </div>
    </div>
</div>
<div class="row mt-5" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{route('user.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Name <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input name="name" value="{{ old('name') }}" type="text" id="text-input"   class="form-control @error('name') is-invalid  @enderror">
                            @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Email <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input name="email" value="{{ old('email') }}" type="email" id="text-input"   class="form-control @error('email') is-invalid  @enderror">
                            @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Password <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input name="password"  type="password" id="text-input"   class="form-control @error('password') is-invalid  @enderror">
                            @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Avatar <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input name="avatar" type="file" id="avatar" name="file-input" class="form-control-file  @error('avatar') is-invalid  @enderror">
                            @error('avatar')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button class="text-center d-block m-auto btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection