@extends('template.main')
@section('content')
<div class="row">
    <div class="col-md-12" >
        <div class="overview-wrap">
            <h2 class="title-1">Create Artwork</h2>
            
        </div>
    </div>
</div>
<div class="row mt-5" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-5">
                <form action="" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Title <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input type="text" id="text-input" name="text-input"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Description <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Describe the artwork.." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label ">Image of the artwork <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                        </div>
                    </div>
                    <button class="text-center d-block m-auto btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection