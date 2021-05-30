@extends('welcome')

@section('title')
Resources | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1>Ambulance Details</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Provider</th>
                                    <th>Location</th>
                                    <th>Delivery Status</th>
                                    <th>Contact</th>
                                    <th>Verified</th>
                                </thead>
                                <tbody>
                                    @foreach($resources as $key => $r)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$r->provider}}</td>
                                        <td>{{$r->supplier_location}}</td>
                                        <td>{{$r->delivery_status}}</td>
                                        <td>{{$r->contact}}</td>
                                        <td>
                                            @if($r->verified == 1)
                                            <p class="text-success">Verified</p>
                                            @else
                                            <p class="text-info">Not Verified</p>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection