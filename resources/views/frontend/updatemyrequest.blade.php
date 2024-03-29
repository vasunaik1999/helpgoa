@extends('welcome')

@section('title')
My Request - Update | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <form method="POST" action="{{ route('frontend.updatemyrequest') }}">
            @csrf
            @method('put')
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
                <input type="hidden" name="req_id" @auth value="{{$req->id}}" @endauth>
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{$req->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone Number</label>
                    <input required type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." value="{{$req->phone}}" name="phone" pattern="[1-9]{1}[0-9]{9}">
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="form-group col-md-4">
                    <label for="taluka">Taluka</label>
                    <input required type="text" class="form-control rounded" id="taluka" list="talukaList" placeholder="Enter Taluka..." value="{{$req->taluka}}" name="taluka">
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
                    <input required type="text" class="form-control rounded" id="city" placeholder="Enter City..." name="city" value="{{$req->city}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <input required type="text" class="form-control rounded" id="address" placeholder="Enter Address..." name="address" value="{{$req->address}}">
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="form-group col-md-4">
                    <label for="pincode">Pincode (Optional)</label>
                    <input type="number" class="form-control rounded" id="pincode" placeholder="Enter Pincode..." name="pincode" value="{{$req->pincode}}">
                </div>
                <div class="form-group col-md-4">
                    <?php
                    $need_by = new DateTime($req->needed_by);
                    ?>
                    <label for="needed_by">Need by</label>

                    <input required type="datetime-local" value="<?php echo $need_by->format("Y-m-d") . "T" . $need_by->format("H:i") ?>" class="form-control rounded" id="needed_by" placeholder="Enter Date..." name="needed_by">
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="form-group col-md-12">
                    <label for="special_instructions">Special Instructions (Optional)</label>
                    <textarea name="special_instructions" class="form-control rounded" rows="3" placeholder="Enter special instructions if any...">{{$req->special_instructions}}</textarea>
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
                            <?php $counter = 0; ?>
                            @foreach( json_decode($req->items) as $item)
                            <tr>
                                <td><input required type="text" name="items[]" class="form-control rounded" value="{{$item}}" required></td>
                                <td style="text-align:center;"><a style="color:white;" class="btn btn-danger btn-sm @if($counter == 0) @else remove @endif">- Remove</a></td>
                                <?php $counter++ ?>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
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
            '<input type="text" name = "items[]" class = "form-control rounded" required>' +
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