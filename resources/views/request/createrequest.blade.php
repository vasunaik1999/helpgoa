<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Create Request</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('request.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." name="phone">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control rounded" id="address" placeholder="Enter Address..." name="address">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pincode">Pincode</label>
                                    <input type="number" class="form-control rounded" id="pincode" placeholder="Enter Pincode..." name="pincode">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="needed_by">Need by</label>
                                    <input type="datetime-local" class="form-control rounded" id="needed_by" placeholder="Enter Date..." name="needed_by">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <label for="items">Items Required</label>
                                    <textarea name="items" class="form-control rounded" rows="5" placeholder="Enter Items"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>