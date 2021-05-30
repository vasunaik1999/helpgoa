<x-app-layout>
    <style>
        .form-control {
            border: 1px solid lightgrey !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/caretaker')}}">Food Services</a> / <a href="">Add</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Add Caretaker details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.caretaker.store') }}">
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
                                        <label for="service_provider">Service Provider</label>
                                        <input required type="text" class="form-control rounded" id="service_provider" placeholder="Enter Name..." name="service_provider">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contact">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="contact" placeholder="Enter Phone no..." name="contact">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="serviced_areas">Serviced Areas</label>
                                        <input required type="text" class="form-control rounded" id="serviced_areas" placeholder="Enter Serviced Areas..." name="serviced_areas">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="service_genders">Service Genders</label>
                                        <input required type="text" list="serviceGenderList" class="form-control rounded" id="service_genders" placeholder="Enter Service Gender..." name="service_genders">
                                        <datalist id="serviceGenderList">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Male/Female">Male/Female</option>
                                            <option value="Others">Others</option>
                                            <option value="Male/Female/Others">Male/Female/Others</option>
                                            <option value="All Genders">All Genders</option>
                                        </datalist>
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