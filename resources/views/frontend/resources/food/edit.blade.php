<x-app-layout>
    <style>
        .form-control {
            border: 1px solid lightgrey !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="{{url('/dashboard/resources/food')}}">Food Services</a> / <a href="">Edit</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Edit Food Services details here</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('resource.food.update') }}">
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
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="form-group col-md-4">
                                        <label for="Provider">Provider Name</label>
                                        <input required type="text" class="form-control rounded" id="provider" placeholder="Enter Name..." name="provider" value="{{$resource->provider}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contact">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="contact" placeholder="Enter Phone no..." name="contact" value="{{$resource->contact}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="service_area">Service Area</label>
                                        <input required type="text" class="form-control rounded" id="service_area" placeholder="Enter Service Area..." name="service_area" value="{{$resource->service_area}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="food_type">Food Type</label>
                                        <select name="food_type" id="food_type" class="form-control" value="{{$resource->food_type}}">
                                            <option value="Veg" @if($resource->food_type == 'Veg') selected @endif)>Veg</option>
                                            <option value="Non Veg" @if($resource->food_type == 'Non Veg') selected @endif)>Non Veg</option>
                                            <option value="Veg/Non Veg" @if($resource->food_type == 'Veg/Non Veg') selected @endif)>Veg/Non Veg</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="meal_type">Meal Type</label>
                                        <input required type="text" class="form-control rounded" id="meal_type" placeholder="Enter Meal Type..." name="meal_type" value="{{$resource->meal_type}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="delivery_to">Delivery To</label>
                                        <input required type="text" list="deliveryToList" class="form-control rounded" id="delivery_to" placeholder="Enter Delivery To..." name="delivery_to" value="{{$resource->delivery_to}}">
                                        <datalist id="deliveryToList">
                                        </datalist>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="isPaid">Food Free or Paid</label>
                                        <select name="isPaid" id="isPaid" class="form-control" value="{{$resource->isPaid}}">
                                            <option value="">Not Sure</option>
                                            <option value="Paid" @if($resource->isPaid == 'Paid') selected @endif)>Paid</option>
                                            <option value="Free" @if($resource->isPaid == 'Free') selected @endif)>Free</option>
                                            <option value="Both Free/Paid" @if($resource->isPaid == 'Both Free/Paid') selected @endif)>Both Free/Paid</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="visibility">Visibility</label>
                                        <select name="visibility" class="form-control">
                                            <option value="0" @if($resource->visibility == 0) selected @endif >Hidden</option>
                                            <option value="1" @if($resource->visibility == 1) selected @endif >Visible</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="verified">Verified</label>
                                        <select name="verified" class="form-control">
                                            <option value="0" @if($resource->verified == 0) selected @endif> Not Verified</option>
                                            <option value="1" @if($resource->verified == 1) selected @endif> Verified</option>
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