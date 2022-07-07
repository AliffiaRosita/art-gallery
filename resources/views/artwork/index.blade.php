@extends('template.main')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="overview-wrap">
            <h2 class="title-1">Artwork</h2>

        </div>
    </div>
    <div class="col-md-2">
        <a href="{{route('artwork.create')}}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Add Artwork</a>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-12">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($artworks)==0)
                    <tr>
                        <td colspan="5" class="text-center p-4">Empty artwork data</td>
                    </tr>
                    @else
                    @foreach ($artworks as $key=>$artwork)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$artwork->title}}</td>
                        <td>{{$artwork->user->name}}</td>
                        <td> <a href="{{asset($artwork->image)}}"><img src="{{asset($artwork->image)}}"class="img-thumbnail" alt="artwork image"></a>  </td>
                        <td>
                            <a href="{{route('artwork.edit',[$artwork])}}" class="btn btn-success">Edit</a>
                            <form action="" method="post" onsubmit="submitForm('artwork',{{$artwork->id}})" class="d-inline">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                     @include('artwork.show')

                    @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function submitForm(url,id){
        console.log("kesini");
            $(this).submit(function(){
            return false;
            });
        var url = `/admin/${url}/${id}`;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type: 'post',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: url,
                  data: {
                    '_method': 'delete',
                  },
              }).done(function(res) {
                Swal.fire(
                    'Deleted!',
                    res.message,
                    'success'
                  ).then(()=>{
                    location.reload();
                  });

              });
            }
            });
    }
</script>
@endsection

