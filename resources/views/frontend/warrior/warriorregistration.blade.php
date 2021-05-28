@extends('welcome')

@section('title')
Register Warrior | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
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

        <?php
        $formflag = 0;
        ?>
        <!-- NEw -->
        @if($warrior)
        @if($warrior->status == 'Pending' or $warrior->status == 'Inprogress')
        <div class="alert alert-primary" role="alert">
            Request Submitted Successfully! Your Details will be verified shortly
        </div>
        @elseif($warrior->status == 'Accepted')
        <div class="alert alert-success" role="alert">
            Congralutions!! You are an warrior now. Stay Safe
        </div>
        @elseif($warrior and $warrior->status == 'Rejected')
        <div class="alert alert-danger" role="alert">
            Sorry!! Your Request got rejected due to {{$warrior->reason}}
        </div>
        <?php $formflag = 1; ?>
        @endif
        @else
        <?php $formflag = 1; ?>
        @endif

        @if($formflag == 1)
        <!-- display form -->
        <form method="POST" action="{{route('warriorregistration.store')}}">
            @csrf

            @if($warrior)
            <input type="hidden" name="warrior_reg_id" value="{{$warrior->id}}">
            @endif
            <div class="row">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{Auth::user()->name}}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." name="phone" value="{{Auth::user()->phone}}" disabled>
                </div>
                @if(Auth::user()->email == NULL)
                @else
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control rounded" id="email" placeholder="Enter Email Id..." value="{{Auth::user()->email}}" name="email" disabled>
                </div>
                @endif
            </div>
            <hr>
            <div class="row mt-4">
                <div class="form-group col-md-4">
                    <label for="aadhaar_num">Aadhaar Number (For Verification Only)</label>
                    <input required type="text" class="form-control rounded" id="aadhaar_num" placeholder="Enter Aadhaar Number..." name="aadhaar_num" pattern="[1-9]{1}[0-9]{11}">
                </div>
                <div class="form-group col-md-4">
                    <label for="organization">Organization/NGO Name (Optional)</label>
                    <input required type="text" class="form-control rounded" id="organization" placeholder="Enter Organization/NGO name..." name="organization">
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="col-md-6 col-sm-12">
                    <label for="serviceArea">Service Area</label>
                    <table class="table table-responsive table-borderless">
                        <thead>
                            <tr>
                                <th>Area Name</th>
                                <th style="text-align:center;"><a style="color:white;" class="btn btn-primary btn-sm addRow1">+ Add Area</a></th>
                            </tr>
                        </thead>
                        <tbody id="tbody1">
                            <tr>
                                <td>
                                    <select name="serviceArea[]" class="form-control rounded" id="serviceArea" required>
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
                                    </select>
                                    <!-- <input type="text" name="serviceArea[]" class="form-control rounded" required> -->
                                </td>
                                <td style="text-align:center;"><a style="color:white;" class="btn btn-danger btn-sm">- Remove</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="supplyType">Supply Type</label>
                    <table class="table table-responsive table-borderless">
                        <thead>
                            <tr>
                                <th>Supply Type</th>
                                <th style="text-align:center;"><a style="color:white;" id="addRow2" class="btn btn-primary btn-sm addRow2">+ Add Supply Type</a></th>
                            </tr>
                        </thead>
                        <tbody id="tbody2" class="tbody2">
                            <tr>
                                <td>
                                    <input type="text" name="supplyType[]" list="supplyTypeList" class="form-control rounded" required>
                                    <datalist id="supplyTypeList">
                                        <option value="Oxygen Cylinder">Oxygen Cylinder</option>
                                        <option value="Oxygen Concentrators">Oxygen Concentrators</option>
                                        <option value="Oximeter">Oximeter</option>
                                        <option value="Free Food">Free Food</option>
                                        <option value="Paid Food">Paid Food</option>
                                        <option value="Grocery">Grocery</option>
                                        <option value="Medicine">Medicine</option>
                                    </datalist>
                                </td>
                                <td style="text-align:center;"><a style="color:white;" class="btn btn-danger btn-sm">- Remove</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <hr>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
        @endif

    </div>
</div>
@endsection

@section('script')

<script>
    $('.addRow1').on('click', function() {
        addRow1();
    });

    function addRow1() {
        var tr = '<tr>' +
            '<td>' +
            '<select name="serviceArea[]" class="form-control rounded" id="serviceArea" required> <option value="Bardez">Bardez</option><option value="Bicholim">Bicholim</option><option value="Pernem">Pernem</option><option value="Sattari">Sattari</option><option value="Tiswadi">Tiswadi</option><option value="Ponda">Ponda</option><option value="Canacona">Canacona</option><option value="Mormugao">Mormugao</option><option value="Salcette">Salcette</option><option value="Sanguem">Sanguem</option><option value="Quepem">Quepem</option><option value="Dharbandora">Dharbandora</option></select>' +
            '</td>' +
            '<td style="text-align:center;">' +
            '<a style="color:white;" class="btn btn-danger btn-sm remove"> - Remove</a>' +
            '</td>' +
            '</tr>';

        $('#tbody1').append(tr);
    };

    $('.addRow2').on('click', function() {
        addRow2();
    });

    function addRow2() {
        var tr = '<tr>' +
            '<td>' +
            '<input type="text" name = "supplyType[]" list="supplyTypeList" class = "form-control rounded" required>' +
            '</td>' +
            '<td style="text-align:center;">' +
            '<a style="color:white;" class="btn btn-danger btn-sm remove"> - Remove</a>' +
            '</td>' +
            '</tr>';

        $('#tbody2').append(tr);
    };



    $('tbody').on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection