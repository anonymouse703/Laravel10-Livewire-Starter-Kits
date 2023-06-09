<div>
    <div class="container-fluid">
        <livewire:flash.flash-message/>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Sample Tables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sample List</h4>
                        <div class="card-header-form">
                            <div class="col-md-3">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" wire:model.debounce.500ms="search" name="search" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="dripicons-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <button wire:click="createSample" class="btn btn-info">Add Sample</button>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($samples as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>
                                            <button type="button" class="btn btn-info" wire:click="editSample({{ $data->id }})"><i class="uil uil-file-edit-alt"></i> </button>
                                            <button type="button" class="btn btn-danger" wire:click="deleteConfirmSample({{ $data->id }})"><i class="mdi mdi-window-close"></i> </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $samples->links() }}
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->
    <!-- Modal with form -->
    <div class="modal fade" id="sampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:sample.sample-form />
        </div>
    </div>
</div>
@section('custom_script')
    @include('layouts.scripts.sample-script')
@endsection