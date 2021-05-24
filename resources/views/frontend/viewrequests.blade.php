@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')
<div class="card mt-5 shadow" style="top: 20px;">
    <div class="card-body">
        <h1>Need Help?</h1>
        <p>Don't worry, just create a request of items needed and our Goan warriors will help you</p>

        <a class="btn btn-sm text-white shadow-sm" href="{{url('/request-create')}}" style="background-color: #00BFA6;">Create Request</a>
    </div>
</div>

<div class="card mt-5 shadow">
    <div class="card-header" style="background-color: white;">
        <h5><strong>Recent Requests</strong> </h5>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($reqs as $req)
            <div class="col-md-6">
                <div class="card mt-2 shadow-sm">
                    <div class="card-body">
                        @auth
                        @if(Auth::user()->hasRole('user'))

                        @else
                        <strong>{{$req->name}} </strong> -

                        @endif
                        @endauth
                        <i class="fas fa-map-marker-alt mr-2"></i>{{$req->city}}, {{$req->taluka}} <span class="badge badge-danger float-right">Urgent</span><br>
                        <p class="mt-2"><strong> Need :-</strong>
                            @foreach( json_decode($req->items) as $item)
                            <span class="badge badge-primary p-2 mt-2">{{$item}}</span>
                            @endforeach
                        </p>
                        <!-- <p>Special Instruction:- {{$req->special_instructions}}</p> -->
                        <button class="btn btn-sm text-white float-right" style="background-color: #00BFA6;">Help</button>
                        <span style="background-color: transparent;"><strong> Needed by :- </strong>{{$req->needed_by}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection