@extends('welcome')

@section('title')
My Requests | Covid Help
@endsection

@section('content')


<?php
$reqs = NULL;
$reqs = App\Models\HelpRequest::where('user_id', '=', Auth::user()->id)->get();
?>

<div class="card shadow" style="top:30px;">
    <div class="card-header" style="background-color: white;">
        <div class="row">
            <div class="col-md-6">
                <h5><strong>My Requests</strong></h5>
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
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            @if(count($reqs) < 1) <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <img style="width:200px;" class="justify-content-center" src="{{asset('img/nodata.svg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 text-center mt-4">
                                <p class=""><strong>You don't have any Request</strong></p>
                                <a class="btn btn-sm text-white shadow-sm items-center" href="{{url('/request-create')}}" style="background-color: #00BFA6;">Create Request</a>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

        @else
        @foreach($reqs as $req)
        <?php
        date_default_timezone_set('Asia/Kolkata');
        $dteStart = new DateTime(date('Y-m-d H:i:s'));
        $dteEnd   = new DateTime($req->needed_by);
        $dteDiff  = $dteStart->diff($dteEnd);

        $years = $dteDiff->format("%Y");
        $months = $dteDiff->format("%m");;
        $days = $dteDiff->format("%d");;
        $message = "Long time";

        if ($years != 0) {
            $message = $dteDiff->format("About %Y Years");
        } elseif ($months != 0) {
            $message = $dteDiff->format("About %m Months");
        } elseif ($days != 0) {
            $message = $dteDiff->format("About %d days");
        } else {
            $message = $dteDiff->format("%H Hours and %I Minutes");
            //$message=($dteStart>=$dteEnd);
        }
        ?>
        <div class="col-md-6">
            <div class="card mt-2 shadow-sm text-light" style="
                    <?php
                    $status = "";
                    if ($dteStart > $dteEnd) {
                        echo "background-color:#fb3640;";
                        $status = "Critical";
                    } elseif ($message == $dteDiff->format("%H Hours and %I Minutes")) {
                        if ($dteDiff->format("%H") <= 6) {
                            echo "background-color:#fb3640;";
                            $status = "Critical";
                        } elseif ($dteDiff->format("%H") > 6 && $dteDiff->format("%H") < 12) {
                            echo "background-color:#ffbe0f;";
                            $status = "Urgent";
                        } elseif ($dteDiff->format("%H") > 12 && $dteDiff->format("%H") < 18) {
                            echo "background-color:#21bf73;";
                            $status = "Non-urgent";
                        }
                    } else {
                        echo "background-color:#21bf73;";
                        $status = "Non-urgent";
                    }
                    ?>">
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
                        <span class="badge bg-light p-2 mt-2" style="font-size:14px;
                                <?php
                                if ($status == 'Critical')
                                    echo "color:#fb3640;";
                                elseif ($status == 'Urgent')
                                    echo "color:#ffbe0f;";
                                else
                                    echo "color:#21bf73;";

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
                            @if($req->reqStatus == 'Open')
                            <form method="post" action="{{route('frontend.deletemyrequest')}}">
                                @csrf
                                <input type="hidden" name="req_id" value="{{$req->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <button type="submit" class="btn btn-sm btn-dark text-light float-right" style="font-weight: bold;">Delete </button>
                            </form>
                            <form method="post" action="{{route('frontend.editmyrequest')}}">
                                @csrf
                                <input type="hidden" name="req_id" value="{{$req->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <button type="submit" class="btn btn-sm btn-dark text-light float-right mr-2" style="font-weight: bold;">Update </button>
                            </form>
                            @elseif($req->reqStatus == 'Accepted')
                            <?php
                            $user = App\Models\User::find($req->vol_id);
                            ?>
                            <div class="row">
                                <div class="col" style="background-color: black; border-radius: 5px; padding:5px; margin:5px 5px 0px 5px;">
                                    <span style="background-color: transparent; padding-left:6px; "><strong> Accepted By :- </strong>{{$user->name}}</span>
                                    <br> <span style="background-color: transparent; padding-left:6px; "><strong> Contact :- </strong>{{$user->phone}}</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>
@endsection

@section('script')

@endsection