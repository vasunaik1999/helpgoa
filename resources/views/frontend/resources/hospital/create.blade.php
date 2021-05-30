<x-app-layout>
    <style>
        .form-control {
            border: 1px solid lightgrey !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/hospital')}}">Hospitals</a> / <a href="">Add</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Add Hospital details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.hospital.store') }}">
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
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="form-group col-md-4">
                                        <label for="name">Hospital Name</label>
                                        <input required type="text" class="form-control rounded" placeholder="Enter Name..." name="name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="type">Hospital Type</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Hospital Type..." name="type" list="hospitalTypeList">
                                        <datalist id="hospitalTypeList">
                                            <option value="Private Hospital">Private Hospital</option>
                                            <option value="Government Hospital">Government Hospital</option>
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bed_types">Bed Types</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Bed Types..." name="bed_types">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Contact..." name="contact">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Location..." name="location">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="location_url">Location URL</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Location URL..." name="location_url">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                        <textarea required rows="2" class="form-control rounded" placeholder="Enter Address..." name="address"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="nodal_officer_name">Nodal Officer Name</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Name..." name="nodal_officer_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nodal_officer_phone">Nodal Officer Contact</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter Phone..." name="nodal_officer_phone">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <label for="note">Note</label>
                                        <textarea name="note" class="form-control rounded" rows="3" placeholder="Enter note if any..."></textarea>
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