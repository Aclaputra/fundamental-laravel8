<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
            All Brand <b></b>
            
        </h2>
    </x-slot>
 
    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->

<!-- Container 1 -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                            <!-- Message -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                                <div class="card-header">All Brand</div>
                                    <!-- <x-jet-welcome /> -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Brand Name</th>
                                                <th scope="col">Brand Image</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- @php($i = 1) -->
                                        @foreach($brands as $brand)
                                            <tr>
                                                <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                                <td>{{ $brand->brand_name }}</td>
                                                <td><img src="{{ asset($brand->brand_image) }}" height="40" width="40"></td>
                                               
                                                <td>
                                                @if($brand->created_at == NULL)
                                                <span class="text-danger"> No Date Set</span>
                                                @else
                                                {{ Carbon\Carbon::parse($brand->created_at)->diffforhumans() }}
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        

                                        </tbody>
                                    </table>
                                    {{ $brands->links() }}

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Add Brand</div>
                                    <div class="card-body">
                                        <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                @error('brand_name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                                <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                @error('brand_image')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                                
                                            <button type="submit" class="btn btn-primary">Add Brand</button>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

    </div>  
</x-app-layout>
