@extends('welcome')

@section('title')
Resources | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1>Caretaker Service</h1>
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
                                    <th>Phone Number</th>
                                    <th>Serviced Areas</th>
                                    <th>Service Genders</th>
                                    <th>Verified</th>
                                </thead>
                                <tbody>
                                    @foreach($resources as $key => $r)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$r->service_provider}}</td>
                                        <td>{{$r->contact}}</td>
                                        <td>{{$r->serviced_areas}}</td>
                                        <td>
                                            {{$r->service_genders}}
                                        </td>
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