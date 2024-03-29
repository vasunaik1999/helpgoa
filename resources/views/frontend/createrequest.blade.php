@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1>Create Request</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card" style="border-radius: 30px; background-color:#f6f6f6; border:1px solid lightgray !important">
                    <div class="card-body">
                        <form method="POST" action="{{ route('request.store') }}">
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
                                <input type="hidden" name="user_id" @auth value="{{Auth::user()->id}}" @endauth>
                                <input type="hidden" name="reqStatus" value="Open">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number</label>
                                    <input required type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." value="{{Auth::user()->phone}}" name="phone" pattern="[1-9]{1}[0-9]{9}">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="taluka">Taluka</label>
                                    <input required type="text" class="form-control rounded" id="taluka" list="talukaList" placeholder="Enter Taluka..." name="taluka" value="{{Auth::user()->taluka1}}">
                                    <datalist id="talukaList">
                                        <option value="Bardez">Bardez</option>
                                        <option value="Bicholim">Bicholim</option>
                                        <option value="Pernem">Pernem</option>
                                        <option value="Sattari">Sattari</option>
                                        <option value="Tiswadi">Tiswadi</option>
                                        <option value="Ponda">Ponda</option>
                                        <option value="Canacona">Canacona</option>
                                        <option value="Mormugao">Mormugao</option>
                                        <option value="Salcette">Salcette</option>
                                        <option value="Sanguem">Sanguem</option>
                                        <option value="Quepem">Quepem</option>
                                        <option value="Dharbandora">Dharbandora</option>
                                    </datalist>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" required class="form-control rounded" id="city" list="cityList" placeholder="Enter City..." name="city" value="{{Auth::user()->city1}}">
                                    <datalist id="cityList">
                                        <option value="{{Auth::user()->city1}}">{{Auth::user()->city1}}</option>
                                        <option value="{{Auth::user()->city2}}">{{Auth::user()->city2}}</option>
                                    </datalist>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address">Address</label>
                                    <input type="text" required class="form-control rounded" list="addressList" value="{{Auth::user()->addressLine1}}" id="address" placeholder="Enter Address..." name="address">
                                    <datalist id="addressList">
                                        <option value="{{Auth::user()->addressLine1}}">{{Auth::user()->addressLine1}}</option>
                                        <option value="{{Auth::user()->addressLine2}}">{{Auth::user()->addressLine2}}</option>
                                    </datalist>

                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="pincode">Pincode (Optional)</label>
                                    <input type="number" class="form-control rounded" id="pincode" placeholder="Enter Pincode..." name="pincode" value="{{Auth::user()->pincode}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="needed_by">Need by</label>
                                    <input required type="datetime-local" class="form-control rounded" id="needed_by" placeholder="Enter Date..." name="needed_by">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <label for="special_instructions">Special Instructions (Optional)</label>
                                    <textarea name="special_instructions" class="form-control rounded" rows="3" placeholder="Enter special instructions if any..."></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-md-6 col-sm-12">
                                    <label for="items">Items (Eg: Rice - 2kg)</label>
                                    <table class="table table-responsive table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th style="text-align:center;"><a style="color:white;" class="btn btn-primary btn-sm addRow">+ Add Item</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="items[]" class="form-control rounded" placeholder="Item Name..." required></td>
                                                <td style="text-align:center;"><a style="color:white;" class="btn btn-danger btn-sm">- Remove</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <button type="submit" class="btn text-white" style="background-color: #00BFA6; border-radius:25px; padding:7px 20px;">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $('.addRow').on('click', function() {
        addRow();
    });

    function addRow() {
        var tr = '<tr>' +
            '<td>' +
            '<input type="text" name = "items[]" class = "form-control rounded" placeholder="Item Name..." required>' +
            '</td>' +
            '<td style="text-align:center;">' +
            '<a style="color:white;" class="btn btn-danger btn-sm remove"> - Remove</a>' +
            '</td>' +
            '</tr>';

        $('tbody').append(tr);
    };


    $('tbody').on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection