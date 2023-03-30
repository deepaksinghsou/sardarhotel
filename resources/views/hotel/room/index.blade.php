@extends('hotel.index')
@section('content')
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Add Room</h3>
                            <a href="{{route('room')}}" class="btn btn-primary">Add Room</a>
                            {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                            @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Capicity</th>
                                            <th class="border-top-0">price</th>
                                            <th class="border-top-0">image</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($rooms as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>{{ $data->capacity }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>
                                                @if($data->image != '' && file_exists(public_path().'/uploads/rooms/'.$data->image))
                            <img src="{{ url('uploads/rooms/'.$data->image) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('assets/images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif
                                            </td>
                                            <td>
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                            <a onclick="return confirm('Are You Sure')" href="{{route('delete_room',$data->id)}}"  class="btn btn-danger btn-sm">Delete</a>
                         
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-4">
                            {{-- {{ $posts->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
            
     
      
@endsection