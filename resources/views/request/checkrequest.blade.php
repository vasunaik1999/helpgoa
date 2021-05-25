<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Request Details</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
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
                                $date1= date('Y-m-d H:i:s');
                                $date2 = $req->needed_by;
                                $dteStart = new DateTime($date1);
                                $dteEnd   = new DateTime($date2);
                                $dteDiff  = $dteStart->diff($dteEnd);  

                                $diff = abs(strtotime($date2) - strtotime($date1));

                                $years = $dteDiff->format("About %Y Years left");
                                $months = $dteDiff->format("About %m Months left");
                                $days = $dteDiff->format("About %d days left");
                                $message="Long time";
                                if ($years!=0) {
                                    $message=$years;
                                } elseif ($months!=0) {
                                    $message=$months;
                                } elseif($days!=0) {
                                    $message=$days;
                                } else{
                                    $message=$dteDiff->format("%H Hours and %I Minutes left");
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
                                <span class="badge badge-primary p-2 mt-2" style="font-size: 15px;">{{$item}}</span>
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
                                    <div class="mt-2 alert alert-success" role="alert">
                                        <strong> Already accepted by {{$user->name}}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
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
                                            <input type="text" class="form-control rounded" name="reason" id="reason" placeholder="Please enter reason....">
                                        </div>
                                        <button type="submit" class="btn text-white btn-sm" style="background-color: red;">Decline Request</button>
                                    </form>
                                </div>
                            </div>
                            @else

                            @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>