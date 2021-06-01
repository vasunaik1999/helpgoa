<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/covid-testing')}}">Covid Testing</a> / <a href="">Add</a>
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
                    <h3>Add Covid Testing Center details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.covid-testing.store') }}">
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
                                        <label for="name">Center Name</label>
                                        <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contact">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="contact" placeholder="Enter Phone no..." name="contact">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control rounded" id="location" placeholder="Enter Location..." name="location">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="type">Testing Type</label>
                                        <input type="text" class="form-control rounded" id="type" placeholder="Enter Testing Type..." name="type">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="collection">Collection Type</label>
                                        <input type="text" class="form-control rounded" id="collection" placeholder="Enter Collection Type..." name="collection">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="time">Testing Time</label>
                                        <input type="text" class="form-control rounded" id="time" placeholder="Enter Testing Time..." name="time">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="working_days">Working Days</label>
                                        <input type="text" class="form-control rounded" id="working_days" placeholder="Enter Working Days..." name="working_days">
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