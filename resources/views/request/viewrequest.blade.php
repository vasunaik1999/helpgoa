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
                    <div class="card mt-2 shadow-sm text-light" style=" height:100%
                        <?php
                            $status="";
                            if($dteStart>$dteEnd){
                                echo "background-color:#fb3640;";
                                $status="Critical";
                            }elseif($message == $dteDiff->format("%H Hours and %I Minutes")){
                                if($dteDiff->format("%H")<=6){
                                    echo "background-color:#fb3640;"; 
                                    $status="Critical";
                                }elseif($dteDiff->format("%H")>6 && $dteDiff->format("%H")<12){
                                    echo "background-color:#ffbe0f;";
                                    $status="Urgent";
                                }elseif($dteDiff->format("%H")>12 && $dteDiff->format("%H")<18){
                                    echo "background-color:#21bf73;";
                                    $status="Non-urgent";
                                }
                            }else{
                                echo "background-color:#21bf73;";
                                $status="Non-urgent";
                            }                        
                        ?>"
                    >
                        <div class="card-body">
                            @auth
                            @if(Auth::user()->hasRole('user'))

                            @else
                            <strong>{{$req->name}} </strong> -

                            @endif
                            @endauth
                            <i class="fas fa-map-marker-alt mr-2"></i>{{$req->city}}, {{$req->taluka}}
                            <span class="badge badge-dark float-right"> <?php echo $status?> </span><br>
                            <p class="mt-2"><strong> Need :-</strong>
                                @foreach( json_decode($req->items) as $item)
                                <span class="badge bg-light p-2 mt-2" style="font-size:14px;
                                    <?php
                                        if($status == 'Critical')
                                            echo "color:#fb3640;";
                                        elseif($status == 'Urgent')
                                            echo "color:#ffbe0f;";
                                        else
                                            echo "color:#21bf73;";
                                            
                                    ?>"
                                >
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
                                        if($dteStart<$dteEnd){
                                            echo "<strong> Deadline :- </strong>$message left";
                                        }elseif($dteStart>=$dteEnd){    
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
                                    <!-- @auth
                                    @if(Auth::user()->hasRole('user'))
                                    <a  href="{{url('/warrior-registration/'.Auth::user()->id)}} class="btn btn-sm btn-dark text-light float-right" style="font-weight: bold;">Want to help?</a>
                                    <p><em><strong>Note: Register as a warrior to help others!</strong></em></p>
                                    @else
                                    <a href="{{url('dashboard/'.$req->id.'/view-request')}}" class="btn btn-sm btn-dark text-light float-right" style="font-weight: bold;">
                                        Approach
                                    </a>
                                    @endif
                                    @endauth -->
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