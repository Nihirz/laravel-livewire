<div>
    <div class="container">
        <div class="card my-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>total (3)</h5>
                    <button wire:click='showForm' class="btn btn-success">Create</button>
                </div>
            </div>
        </div>
        @if ($showData == true)
            <div class="table-responsive">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($images as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>{{ $image->title }}</td>
                                <td><img src="{{ asset('storage') }}/{{ $image->image }}"
                                        style="width: 70px;height:70px;" alt="">
                                </td>
                                <td><button wire:click='edit({{ $image->id }})' class="btn btn-success">Edit</button>
                                </td>
                                <td><button wire:click='delete({{ $image->id }})'
                                        class="btn btn-danger">Delete</button></td>
                            </tr>
                        @empty
                            <h3>Record Not Found</h3>
                        @endforelse

                    </tbody>
                </table>
            </div>
        @endif

        @if ($createData == true)
            <div class="row mt-3">
                <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h1>Upload Image</h1>
                        </div>
                        <form action="" wire:submit.prevent='create'>
                            <div class="card-body">
                                <div class="from-group">
                                    <label for="">Enter Title</label>
                                    <input type="text" wire:model='title' name="title" id="title"
                                        class="form-contro-lg form-control">
                                </div>
                                <div class="custom-file mt-3">
                                    <input type="file" wire:model='image' class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>

                                </div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" style="width: 200px;height:200px;"
                                        alt="">
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @if ($updateData == true)
            <div class="row mt-3">
                <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h1>Update Image</h1>
                        </div>
                        <form action="" wire:submit.prevent='update({{ $edit_id }})'>
                            <div class="card-body">
                                <div class="from-group">
                                    <label for="">Enter Title</label>
                                    <input type="text" wire:model='edit_title' name="title" id="title"
                                        class="form-contro-lg form-control">
                                </div>
                                <div class="custom-file mt-3">
                                    <input type="file" wire:model='new_image' class="custom-file-input"
                                        id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @if ($new_image)
                                    <img src="{{ $new_image->temporaryUrl() }}" style="width: 200px;height:200px;"
                                        alt="">
                                @else
                                    <img src="{{ asset('storage') }}/{{ $old_image }}"
                                        style="width: 200px;height:200px;" alt="">
                                @endif
                                <input type="hidden" wire:model='old_image' name="" id="">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>
