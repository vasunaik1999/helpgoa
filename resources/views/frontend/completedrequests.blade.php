@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')
<style>
    .card-style {
        border-radius: 30px;
        border: 1px solid lightgray !important;
    }
</style>
<div class="row" style="top: 35px;">
    <div class="col">
        <div class="card mt-5 card-style">
            <div class="card-body">
                <h1>Need Help?</h1>
                <p>Don't worry, just create a request of items needed and our Goan warriors will help you</p>

                <a class="btn btn-sm text-white shadow-sm mr-2" href="{{url('/request-create')}}" style="background-color: #00BFA6; border-radius:25px; padding:7px 12px;">Create Request</a>
                <a class="btn btn-sm text-white shadow-sm" href="{{url('/requests')}}" style="background-color: #00BFA6; border-radius:25px; padding:7px 12px;">Recent Request</a>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4 card-style">
    <div class="card-header" style="border-radius:30px ;">
        <div class="row">
            <div class="col-md-3" style="display:block; margin:auto;">
                <h5 class="my-auto"><strong>Completed Requests</strong></h5>
            </div>
            <div class="col-md-4 items-center">
                <form mthod="post" action="{{route('request.completedfrontend.search')}}">
                    <div class="input-group my-3 my-md-0">
                        <select name="search" class="form-control" aria-placeholder="Enter Location" style="border-radius: 30px 0 0 30px;">
                            @if($search != null)
                            <option value="{{$search}}">{{$search}}</option>
                            @endif
                            <option value="All">All</option>
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
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm text-white px-3" style="background-color: #00BFA6; border-radius:0 30px 30px 0;"><i class="fa fa-search mr-2"></i>Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5 mt-md-2 mt-2">
                <div class="float-right">
                    <button class="btn mx-2" style="background-color:#28df99;"></button><span class="mr-2" style="background-color: transparent;">Completed</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($reqs as $req)
            <div class="col-md-6 pb-4">
                <div style="height:100%; background-color:#28df99; color:#000; border-radius:25px;" class="card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-map-marker-alt mr-2"></i>{{$req->city}}, {{$req->taluka}}
                        <span class="badge badge-dark float-right">Completed</span><br>
                        <p class="mt-2"><strong> Need :-</strong>
                            @foreach( json_decode($req->items) as $item)
                            <span class="badge p-2 mt-2 bg-dark" style="font-size:14px; color:#28df99">
                                {{$item}}
                            </span>
                            @endforeach
                        </p>
                        <!-- #ffbe0f orange -->
                        <!-- <p>Special Instruction:- {{$req->special_instructions}}</p> -->


                        <div class="row mt-2">
                            <div class="col">
                                <span style="background-color: transparent;"><strong> Completed on :- </strong>{{$req->updated_at}}</span>
                            </div>
                        </div>

                        <?php
                        $user = App\Models\User::find($req->vol_id);
                        ?>
                        <div class="row">
                            <div class="col" style="background-color: black; border-radius: 5px; padding:5px; margin:5px 5px 0px 5px;">
                                <span class="text-light" style="background-color: transparent; padding-left:6px; "><strong> Completed By :- </strong>{{$user->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card card-style">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('/img/no-result-found.svg')}}" style="width:200px; display:block; margin:auto;" alt="">
                            </div>
                            <div class="col-md-8 mx-auto my-md-auto mt-4" style="display:block; margin:auto;">
                                <h1 class="text-center"><strong>No Results Found</strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection