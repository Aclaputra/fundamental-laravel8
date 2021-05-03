<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
            Multi Picture <b></b>
            
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
                            
                               

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Multi Image</div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                @error('image')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                                
                                            <button type="submit" class="btn btn-primary">Add Image</button>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

    </div>  
</x-app-layout>