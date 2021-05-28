<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Request Details</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body" style="border-radius: 25px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4" style="border-radius: 25px;  background-color:#F3F4F6;">
                        <div class="card-body" style="margin:7px;">
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
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
                            $status = "";

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


                            if ($dteStart > $dteEnd) {
                                $status = "Critical";
                            } elseif ($message == $dteDiff->format("%H Hours and %I Minutes") || $message == $dteDiff->format("%I Minutes")) {
                                if ($dteDiff->format("%H") <= 1) {
                                    $status = "Critical";
                                } elseif ($dteDiff->format("%H") > 1 && $dteDiff->format("%H") <= 5) {
                                    $status = "Urgent";
                                } elseif ($dteDiff->format("%H") > 5 && $dteDiff->format("%H") <= 15) {
                                    $status = "Standard";
                                } else {
                                    $status = "Casual";
                                }
                            } else {
                                $status = "Casual";
                            }
                            ?>
                            <span><i class="fas fa-user mr-2"></i>{{$req->name}}</span>
                            <span><i class="fas fa-map-marker-alt ml-4 mr-2"></i> {{$req->city}}, {{$req->taluka}}</span>
                            <span class="badge badge-danger float-right"><?php echo $status ?></span>
                            <p><i class="fas fa-map-marked-alt mt-2 mr-2"></i>{{$req->address}}</p>
                            <p><i class="fas fa-phone mt-2 mr-2"></i>{{$req->phone}}</p>
                            <p class="mt-2"><em> <b>Need by</b> {{$req->needed_by}}</em></p>
                            <p class="mt-2"><strong> Items Needed :-</strong>
                                @foreach( json_decode($req->items) as $item)
                                <span class="badge badge-primary mt-2" style="font-size: 15px; padding:7px 10px 7px 10px; border-radius:20px;">{{$item}}</span>
                                @endforeach
                            </p>
                            <p class="mt-2"><em>
                                    <?php
                                    if ($dteStart < $dteEnd) {
                                        echo "<strong> Deadline :- </strong>$message left";
                                    } elseif ($dteStart >= $dteEnd) {
                                        echo "<strong> Deadline :- </strong>$message ago";
                                    }
                                    ?>
                                </em></p>

                            @if($req->special_instructions == NULL)

                            @else
                            <p class="mt-2"><strong>Special Request</strong> - {{$req->special_instructions}}</p>
                            @endif
                            <div class="row mt-2">
                                <div class="col">
                                    @if($req->vol_id == NULL)
                                    <a href="{{url('dashboard/'.$req->id.'/view-request/'.Auth::user()->id.'/accept')}}" class="btn text-white" style="background-color: #00BFA6;">Accept Request</a>
                                    @else
                                    @if($req->reqStatus == 'Accepted')
                                    <div class="mt-2 alert alert-success" role="alert" style="border-radius:15px;">
                                        <strong> Already accepted by {{$user->name}}</strong>
                                    </div>
                                    @else
                                    <div class="mt-2 alert alert-success" role="alert" style="border-radius:15px;">
                                        <strong> Completed by {{$user->name}}</strong>
                                    </div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($req->reqStatus == 'MarkedCompletedByWarrior' or $req->reqStatus == 'MarkedCompletedByUser')

                @else
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border-radius:25px;  background-color:#F3F4F6;">
                        @if($user == NULL)
                            <div class="card-body" style="margin:7px;">
                                <p><strong><em>Note:-</em></strong>Please call and confirm on the number provided, before your accept any request. </p>
                                <p class="mt-2"> <strong> Accept Request only if you will be able to deliver it.</strong></p>
                            </div>
                        @else
                        @if($user->id == Auth::user()->id)
                            <div class="card" style="border-radius:25px; margin:5px;">
                                <div class="card-body">
                                    <p><strong>If you want to decline this Request, please give reason for it</strong></p>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <form action="{{url('dashboard/'.$req->id.'/view-request/'.Auth::user()->id.'/decline')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="reason">Reason for Declining this request</label>
                                                    <input type="text" class="form-control" style="border-radius: 15px;" name="reason" id="reason" placeholder="Please enter reason....">
                                                </div>
                                                <button type="submit" class="btn text-white btn-sm" style="background-color: red; border-radius:30px; padding:7px 12px 7px 12px;">Decline Request</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4" style="border-radius:25px; margin:5px;">
                                <div class="card-body">
                                    <p>Only mark as Completed if you have completed this request</p>
                                    <form action="{{route('request.mark.completed')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="req_id" value="{{$req->id}}">
                                        <!-- <div class="form-group">
                                            <label for="reason">Reason</label>
                                            <input type="text" class="form-control rounded" name="reason" id="reason" placeholder="Please enter reason....">
                                        </div> -->
                                        <button type="submit" class=" mt-2 btn text-white btn-sm" style="background-color:#00BFA6; border-radius:30px; padding:7px 12px 7px 12px;">Mark as Completed</button>
                                    </form>
                                </div>
                            </div>
                        @else
                        
                        @endif
                        
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>