@extends('template.main')
@section('content')
<div class="row">
    <div class="col-md-12" >
        <div class="overview-wrap">
            <h2 class="title-1">Edit Artwork</h2>
            
        </div>
    </div>
</div>
<div class="row mt-5" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{route('artwork.update',[$artwork])}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Title <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input name="title" value="{{ old('title',$artwork->title) }}" type="text" id="text-input"   class="form-control @error('title') is-invalid  @enderror">
                            @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Description <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <textarea name="description" id="textarea-input" rows="9" placeholder="Describe the artwork.." class="form-control @error('description') is-invalid  @enderror">{{ old('description',$artwork->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Image of the artwork <small>Note: leave input blank if not change the image</small></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input name="image" type="file" id="image" name="file-input" class="form-control-file  @error('image') is-invalid  @enderror">
                            @error('image')
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