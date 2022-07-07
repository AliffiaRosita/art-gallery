@extends('template.main')
@section('content')
<div class="row">
    <div class="col-md-9" >
        <div class="overview-wrap">
            <h2 class="title-1">Artwork</h2>
            
        </div>
    </div>
    <div class="col-md-3">
        <a href="{{route('artwork.create')}}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Tambah Artwork</a>
    </div>
</div>
<div class="row mt-5" >
    <div class="col-md-12">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($artworks)==0)
                        <tr>
                            <td colspan="4" class="text-center p-4"> Data Artwork Kosong</td>
                        </tr>
                    @else
                        @foreach ($artworks as $key=>$artwork)    
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$artwork->title}}</td>
                            <td>iPhone X 64Gb Grey</td>
                            <td>
                                <a href="#" class="btn btn-info">Detail</a>
                                <a href="{{route('artwork.edit')}}" class="btn btn-success">Edit</a>
                                <form action="" method="post" class="d-inline">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
</div>
@endsection