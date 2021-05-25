<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">View Requests</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card shadow">
                    <div class="card-header" style="background-color: white;">
                        <h5><strong>Recent Requests</strong> </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
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
                                        <br>
                                        <!-- <p>Special Instruction:- {{$req->special_instructions}}</p> -->
                                        <a href="{{url('dashboard/'.$req->id.'/view-request')}}" class="btn btn-sm text-white float-right" style="background-color: #00BFA6;">Help</a>
                                        <span style="background-color: transparent;"><strong> Needed by :- </strong>{{$req->needed_by}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>