<x-app-layout>
    <style>
        .form-control {
            border: 1px solid lightgrey !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/medicine')}}">Medicine Supplier</a> / <a href="">Edit</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Edit Supplier details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.medicine.update') }}">
                                @csrf
                                @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <input type="hidden" name="r_id" value="{{$resource->id}}">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="provider">Provider Name</label>
                                        <input required type="text" class="form-control rounded" id="provider" placeholder="Enter Provider Name..." name="provider" value="{{$resource->provider}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contact">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="contact" placeholder="Enter Phone no..." name="contact" value="{{$resource->contact}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="supplier_location">Supplier Location</label>
                                        <input required type="text" class="form-control rounded" id="supplier_location" placeholder="Enter Supplier Location..." name="supplier_location" value="{{$resource->supplier_location}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="delivery_status">Delivery Status</label>
                                        <input required type="text" class="form-control rounded" id="delivery_status" placeholder="Enter Deliver Status..." name="delivery_status" value="{{$resource->delivery_status}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="verified">Verified</label>
                                        <select name="verified" class="form-control">
                                            <option value="0" @if($resource->verified == 0) selected @endif> Not Verified</option>
                                            <option value="1" @if($resource->verified == 1) selected @endif> Verified</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="visibility">Visibility</label>
                                        <select name="visibility" class="form-control">
                                            <option value="0" @if($resource->visibility == 0) selected @endif >Hidden</option>
                                            <option value="1" @if($resource->visibility == 1) selected @endif >Visible</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <label for="note">Note</label>
                                        <textarea name="note" class="form-control rounded" rows="3" placeholder="Enter note if any...">{{$resource->note}}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>




    @section('script')
    @endsection
</x-app-layout>