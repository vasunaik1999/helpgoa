@extends('welcome')

@section('title')
Resources | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1>Food Services</h1>
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
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>For</th>
                                    <th>Phone Number</th>
                                    <th>Type</th>
                                    <!-- <th>Note</th> -->
                                    <th>Verified</th>
                                </thead>
                                <tbody>
                                    @foreach($resources as $key => $r)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$r->name}}</td>
                                        <td>
                                            {{$r->location}}<br>
                                            {{$r->address}}
                                        </td>
                                        <td>{{$r->type}}</td>
                                        <td>{{$r->contact}}</td>
                                        <td>{{$r->isPaid}}</td>
                                        <!-- <td>{{$r->note}}</td> -->
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