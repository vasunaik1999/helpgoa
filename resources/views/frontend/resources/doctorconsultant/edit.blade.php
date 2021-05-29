<x-app-layout>
    <style>
        .form-control {
            border: 1px solid lightgrey !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/doctor-consultant')}}">Doctor Consultant</a> / <a href="">Edit</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Edit Doctor details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.doctor.update') }}">
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
                                    <input type="hidden" name="r_id" value="{{$resource->id}}">
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{$resource->name}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contact">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="contact" placeholder="Enter Phone no..." name="contact" value="{{$resource->contact}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="location">Location</label>
                                        <input required type="text" class="form-control rounded" id="location" placeholder="Enter Location..." name="location" value="{{$resource->location}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="consultation_type">Consultation Type</label>
                                        <input required type="text" class="form-control rounded" id="consultation_type" list="consultationList" placeholder="Enter Consultation..." name="consultation_type" value="{{$resource->consultation_type}}">
                                        <datalist id="consultationList">
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="availability">Availability</label>
                                        <input required type="text" class="form-control rounded" id="availability" placeholder="Enter availability..." name="availability" value="{{$resource->availability}}">
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
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="verified">Verified</label>
                                        <select name="verified" class="form-control">
                                            <option value="0" @if($resource->verified == 0) selected @endif> Not Verified</option>
                                            <option value="1" @if($resource->verified == 1) selected @endif> Verified</option>
                                        </select>
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