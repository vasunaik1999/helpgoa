<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Request Details</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body" style="border-radius: 25px; background-color:#F3F4F6;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border-radius: 25px;">
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
                            <span><i class="fas fa-user mr-2"></i>{{$req->name}}</span>
                            <span><i class="fas fa-map-marker-alt ml-4 mr-2"></i> {{$req->city}}, {{$req->taluka}}</span>
                            <span class="badge badge-danger float-right">{{$req->urgency_status}}</span>
                            <p><i class="fas fa-map-marked-alt mt-2 mr-2"></i>{{$req->address}}</p>
                            <p><i class="fas fa-phone mt-2 mr-2"></i>{{$req->phone}}</p>
                            <span class="mt-2"><em> Need by {{$req->needed_by}}</em></span>
                            <span class="mt-2"><em> <?php echo $message ?> </em></span>
                            <p class="mt-2"><strong> Items Needed :-</strong>
                                @foreach( json_decode($req->items) as $item)
                                <span class="badge badge-primary mt-2" style="font-size: 15px; padding:7px 10px 7px 10px; border-radius:20px;">{{$item}}</span>
                                @endforeach
                            </p>
                            @if($req->special_instructions == NULL)

                            @else
                            <span class="mt-2"><strong>Special Request</strong> - {{$req->special_instructions}}</span>
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
                @if($req->reqStatus == 'CompletedByWarrior' or $req->reqStatus == 'CompletedByUser')

                @else
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border-radius:25px;">
                        <div class="card-body" style="margin:7px;">
                            @if($user == NULL)
                            <p><strong><em>Note:-</em></strong> Always a better option to Call User before accepting the Request</p>
                            <p class="mt-2"> <strong> Accept Request only if you will be able to deliver it</p></strong>
                            @else
                            @if($user->id == Auth::user()->id)
                            <p>If you want to decline this Request, please give reason for it</p>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <form action="{{url('dashboard/'.$req->id.'/view-request/'.Auth::user()->id.'/decline')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="reason">Reason</label>
                                            <input type="text" class="form-control" style="border-radius: 15px;" name="reason" id="reason" placeholder="Please enter reason....">
                                        </div>
                                        <button type="submit" class="btn text-white btn-sm" style="background-color: red; border-radius:30px; padding:7px 12px 7px 12px;">Decline Request</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card mt-4" style="border-radius:25px; margin:5px; background-color: #F3F4F6;">
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
                </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>