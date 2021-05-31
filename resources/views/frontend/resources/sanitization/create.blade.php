<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/sanitization')}}>Sanitization Services</a> / <a href="">Add</a>
        </h2>
    </x-slot>
    <style>
        .form-control {
            border: 1px solid lightgrey !important;
        }
    </style>

    <x-slot name=" extra">
                <!-- put this bcoz it was giving error -->
    </x-slot>
    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Add Sanitization Service details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.sanitization.store') }}">
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
                                        <label for="provider">Provider Name</label>
                                        <input required type="text" class="form-control rounded" id="provider" placeholder="Enter Name..." name="provider">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contact">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="contact" placeholder="Enter Phone no..." name="contact">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="service_location">Service Location</label>
                                        <input required type="text" class="form-control rounded" id="service_location" placeholder="Enter Service Location..." name="service_location">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="type">Sanitization Type</label>
                                        <input type="text" class="form-control rounded" id="type" placeholder="Enter Phone no..." name="type">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="extra_info">Extra Info</label>
                                        <input type="text" class="form-control rounded" id="extra_info" placeholder="Enter Info..." name="extra_info">
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


</x-app-layout>