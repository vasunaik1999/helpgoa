@extends('welcome')

@section('title')
My Profile | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <form method="POST" action="{{route('myprofile.store')}}">
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
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." name="phone" value="{{Auth::user()->phone}}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="secondaryPhone">Secondary Phone Number</label>
                    <input type="text" class="form-control rounded" id="secondaryPhone" placeholder="Enter Phone no..." value="{{Auth::user()->secondaryPhone}}" name="secondaryPhone">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control rounded" id="email" placeholder="Enter Email Id..." value="{{Auth::user()->email}}" name="email">
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="form-group col-md-4">
                    <label for="city1">city1</label>
                    <input type="text" class="form-control rounded" id="city1" placeholder="Enter city1..." name="city1" value="{{Auth::user()->city1}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="taluka1">Taluka 1</label>
                    <input type="text" class="form-control rounded" id="taluka1" placeholder="Enter taluka1..." name="taluka1" value="{{Auth::user()->taluka1}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="addressLine1">Address Line 1</label>
                    <input type="text" class="form-control rounded" id="addressLine1" placeholder="Enter addressLine1..." name="addressLine1" value="{{Auth::user()->addressLine1}}">
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="form-group col-md-4">
                    <label for="city2">city 2</label>
                    <input type="text" class="form-control rounded" id="city2" placeholder="Enter city2..." name="city2" value="{{Auth::user()->city2}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="taluka2">Taluka 2</label>
                    <input type="text" class="form-control rounded" id="taluka2" placeholder="Enter taluka2..." name="taluka2" value="{{Auth::user()->taluka2}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="addressLine2">Address Line 2</label>
                    <input type="text" class="form-control rounded" id="addressLine2" placeholder="Enter addressLine2..." name="addressLine2" value="{{Auth::user()->addressLine2}}">
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="form-group col-md-4">
                    <label for="isCovidPos">Are you Covid Positive?</label>
                    <select required name="isCovidPos" class="form-control" id="isCovidPos">
                        <option value="1" @if(Auth::user()->isCovidPos == 1) selected @endif>Yes</option>
                        <option value="0" @if(Auth::user()->isCovidPos == 0) selected @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="isCovidPosFamily">Is your family Covid Positive?</label>
                    <select required name="isCovidPosFamily" class="form-control" id="isCovidPosFamily">
                        <option value="1" @if(Auth::user()->isCovidPosFamily == 1) selected @endif>Yes</option>
                        <option value="0" @if(Auth::user()->isCovidPosFamily == 0) selected @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="isCovidSymptoms">Do you have any Symptoms?</label>
                    <select required name="isCovidSymptoms" class="form-control" id="isCovidSymptoms">
                        <option value="1" @if(Auth::user()->isCovidSymptoms == 1) selected @endif>Yes</option>
                        <option value="0" @if(Auth::user()->isCovidSymptoms == 0) selected @endif>No</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('script')

@endsection