@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')
<style>
    .card-style {
        border-radius: 30px;
        border: 1px solid lightgray !important;
        background-color: #f6f6f6;
    }
</style>
<div class="row" style="top: 35px;">
    <div class="col">
        <div class="card mt-5 card-style">
            <div class="card-body">
                <h1>Need Help?</h1>
                <p>Don't worry, just create a request of items needed and our Goan warriors will help you</p>

                <a class="btn btn-sm text-white shadow-sm" href="{{url('/request-create')}}" style="background-color: #00BFA6; border-radius:25px; padding:7px 12px;">Create Request</a>
                <a class="btn btn-sm text-white shadow-sm" href="{{url('/completed')}}" style="background-color: #00BFA6; border-radius:25px; padding:7px 12px;">Completed Request</a>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4 card-style">
    <div class="card-header" style="background-color: white;">
        <div class="row">
            <div class="col-md-3" style="display:block; margin:auto;">
                <h5><strong>Recent Requests</strong></h5>
            </div>
            <div class="col-md-3 items-center">
                <form mthod="post" action="{{route('request.viewrequestfrontend.search')}}">
                    <div class="input-group my-3 my-md-0">
                        <select name="search" class="form-control" aria-placeholder="Enter Location">
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
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search mr-2"></i>Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mt-md-2 mt-2">
                <div class="float-right">
                    <button class="btn mx-2" style="background-color:#fb3640;"></button><span style="background-color: transparent;">Critical</span>
                    <button class="btn mx-2" style="background-color:#fd6104"></button><span style="background-color: transparent;">Urgent</span>
                    <button class="btn mx-2" style="background-color:#ffce03;"></button><span style="background-color: transparent;">Standard</span>
                    <button class="btn mx-2" style="background-color:#fffe80;"></button><span style="background-color: transparent;">Casual</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($reqs as $req)
            <?php
            date_default_timezone_set('Asia/Kolkata');
            $dteStart = new DateTime(date('Y-m-d H:i:s'));
            $dteEnd   = new DateTime($req->needed_by);
            $dteDiff  = $dteStart->diff($dteEnd);

            $years = $dteDiff->format("%Y");
            $months = $dteDiff->format("%m");;
            $days = $dteDiff->format("%d");;
            $hours = $dteDiff->format("%H");
            $message = "Long time";

            if ($years != 0) {
                $message = $dteDiff->format("About %Y Years");
            } elseif ($months != 0) {
                $message = $dteDiff->format("About %m Months");
            } elseif ($days != 0) {
                $message = $dteDiff->format("About %d days");
            } elseif ($hours != 0) {
                $message = $dteDiff->format("%H Hours and %I Minutes");
                //$message=($dteStart>=$dteEnd);
            } else {
                $message = $dteDiff->format("%I Minutes");
            }
            ?>
            <div class="col-md-6 pb-4">
                <div style="height:100%; 
                    <?php
                    $status = "";
                    // if ($req->reqStatus == 'MarkedCompletedByWarrior' || $req->reqStatus == 'MarkedCompletedByUser') {
                    //     echo "background-color:#28df99;";
                    //     $status = "Completed";
                    // } else
                    if ($dteStart > $dteEnd) {
                        echo "background-color:#fb3640;";
                        $status = "Critical";
                    } elseif ($message == $dteDiff->format("%H Hours and %I Minutes") || $message == $dteDiff->format("%I Minutes")) {
                        if ($dteDiff->format("%H") <= 1) {
                            echo "background-color:#fb3640;";
                            $status = "Critical";
                        } elseif ($dteDiff->format("%H") > 1 && $dteDiff->format("%H") <= 5) {
                            echo "background-color:#fd6104;";
                            $status = "Urgent";
                        } elseif ($dteDiff->format("%H") > 5 && $dteDiff->format("%H") <= 15) {
                            echo "background-color:#ffce03;";
                            $status = "Standard";
                        } else {
                            echo "background-color:#fffe80;";
                            $status = "Casual";
                        }
                    } else {
                        echo "background-color:#fffe80;";
                        $status = "Casual";
                    }
                    ?>" class="card shadow-sm <?php if ($status == "Casual" || $status=="Standard") echo "text-dark";
                                                else echo "text-light"; ?>">
                    <div class="card-body">
                        @auth
                        @if(Auth::user()->hasRole('user'))

                        @else
                        <strong>{{$req->name}} </strong> -
                        @endif
                        @endauth
                        <i class="fas fa-map-marker-alt mr-2"></i>{{$req->city}}, {{$req->taluka}}
                        <span class="badge badge-dark float-right"> <?php echo $status ?> </span><br>
                        <p class="mt-2"><strong> Need :-</strong>
                            @foreach( json_decode($req->items) as $item)
                            <span class="badge p-2 mt-2
                            <?php
                            if ($status == "Casual" || $status=="Standard") echo "bg-dark";
                            else echo "bg-light"; ?>" style="font-size:14px;
                                <?php
                                if ($status == 'Critical')
                                    echo "color:#fb3640;";
                                elseif ($status == 'Urgent')
                                    echo "color:#fd6104;";
                                elseif ($status == 'Standard')
                                    echo "color:#ffce03;";
                                elseif ($status == 'Casual')
                                    echo "color:#fffe80;";
                                else
                                    echo "color:#28df99;"

                                ?>">
                                {{$item}}
                            </span>
                            @endforeach
                        </p>
                        <!-- #ffbe0f orange -->
                        <!-- <p>Special Instruction:- {{$req->special_instructions}}</p> -->


                        <div class="row mt-2">
                            <div class="col">
                                <span style="background-color: transparent;">
                                    <?php
                                    if ($dteStart < $dteEnd) {
                                        echo "<strong> Deadline :- </strong>$message left";
                                    } elseif ($dteStart >= $dteEnd) {
                                        echo "<strong> Deadline :- </strong>$message ago";
                                    }

                                    ?>
                                </span>
                                <br>
                                <span style="background-color: transparent;"><strong> Needed by :- </strong>{{$req->needed_by}}</span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                @auth
                                @if(Auth::user()->hasRole('user'))
                                <a href="{{url('/warrior-registration/'.Auth::user()->id)}}" class="btn btn-sm btn-dark text-light float-right" style="font-weight: bold;">Want to help?</a>
                                <p><em><strong>Note: Register as a warrior to help others!</strong></em></p>
                                @else
                                @if($req->user_id != Auth::user()->id)
                                <a href="{{url('dashboard/'.$req->id.'/view-request')}}" class="btn btn-sm btn-dark text-light float-right" style="font-weight: bold;">
                                    Approach
                                </a>
                                @endif
                                @endif
                                @endauth
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card">
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