<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">View Requests</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-header" style="background-color: white;">
            <div class="row">
                <div class="col-md-6">
                    <h5><strong>Recent Requests</strong></h5>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        <button class="btn mx-2" style="background-color:#fb3640;"></button><span style="background-color: transparent;">Critical</span>
                        <button class="btn mx-2" style="background-color:#ffbe0f"></button><span style="background-color: transparent;">Urgent</span>
                        <button class="btn mx-2" style="background-color:#21bf73;"></button><span style="background-color: transparent;">Not Urgent</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-2">
                @foreach($reqs as $req)
                <div class="col-md-6">
                    <div class="card mt-2 shadow-sm" @if($req->urgency_status == 'critical')
                        style="background-color:#fb3640; color:#f5f7b2;"
                        @elseif($req->urgency_status == 'urgent')
                        style="background-color:#ffbe0f; color:#f5f7b2;"
                        @else
                        style="background-color:#21bf73; color:#f5f7b2;"
                        @endif>
                        <div class="card-body">
                            @auth
                            @if(Auth::user()->hasRole('user'))

                            @else
                            <strong>{{$req->name}} </strong> -

                            @endif
                            @endauth
                            <i class="fas fa-map-marker-alt mr-2"></i>{{$req->city}}, {{$req->taluka}}
                            <!-- @if($req->urgency_status == 'critical')
                        <span class="badge badge-danger float-right">Critical</span><br>
                        @elseif($req->urgency_status == 'urgent')
                        <span class="badge badge-warning float-right">Urgent</span><br>
                        @else
                        <span class="badge badge-success float-right">Not Urgent</span><br>
                        @endif -->
                            <p class="mt-2"><strong> Need :-</strong>
                                @foreach( json_decode($req->items) as $item)
                                <span class="badge p-2 mt-2" @if($req->urgency_status == 'critical')
                                    style="background-color: #f5f7b2; color:#fb3640; font-size:14px;"
                                    @elseif($req->urgency_status == 'urgent')
                                    style="background-color:#f5f7b2; color:#ffbe0f; font-size:14px;"
                                    @else
                                    style="background-color:#f5f7b2; color:#21bf73; font-size:14px;"
                                    @endif>
                                    {{$item}}
                                </span>
                                @endforeach
                            </p>
                            <!-- #ffbe0f orange -->
                            <!-- <p>Special Instruction:- {{$req->special_instructions}}</p> -->

                            <div class="row mt-2">
                                <div class="col">
                                    <span style="background-color: transparent;"><strong> Needed by :- </strong>{{$req->needed_by}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    @auth
                                    @if(Auth::user()->hasRole('user'))
                                    <button class="btn btn-sm text-white float-right" style="background-color: #00BFA6;">Want to help?</button>
                                    <p><em><strong>Note:- </strong> Register as a warrior to help others</em></p>
                                    @else
                                    <a href="{{url('dashboard/'.$req->id.'/view-request')}}" class="btn btn-sm float-right" @if($req->urgency_status == 'critical')
                                        style="background-color: #f5f7b2; color:#fb3640;"
                                        @elseif($req->urgency_status == 'urgent')
                                        style="background-color:#f5f7b2; color:#ffbe0f;"
                                        @else
                                        style="background-color:#f5f7b2; color:#21bf73;"
                                        @endif>Approach
                                    </a>
                                    @endif
                                    @endauth
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>