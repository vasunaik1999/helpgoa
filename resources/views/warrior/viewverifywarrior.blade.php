<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Verify Warrior</a><span> / </span> <a href="">Warrior Details</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row mt-4">
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body" style="font-size: 18px;">
                                    <h3><strong style="font-size: 25px;">User Details</strong></h3>
                                    <p class="mt-2"><b>Name:</b> <span>{{$user->name}}</span></p>
                                    <p class="mt-2"><b>Phone No.:</b> {{$user->phone}}</p>
                                    @if($user->secondaryPhone != NULL)
                                    <p class="mt-2"><b>Phone No.:</b> {{$user->secondaryPhone}}</p>
                                    @endif
                                    @if($user->email != NULL)
                                    <p class="mt-2"><b>Email:</b> {{$user->email}}</p>
                                    @endif
                                    @if($warrior_registration->status == "Pending")
                                    <span class="badge badge-primary">{{$warrior_registration->status}}</span>
                                    @elseif($warrior_registration->status == "Inprogress")
                                    <span class="badge badge-warning">{{$warrior_registration->status}}</span>
                                    @elseif($warrior_registration->status == "Accepted")
                                    <span class="badge badge-success">{{$warrior_registration->status}}</span>
                                    @elseif($warrior_registration->status == "Rejected")
                                    <span class="badge badge-danger">{{$warrior_registration->status}}</span>
                                    @endif
                                    <p class="mt-2"><b>Address 1:</b> {{$user->addressLine1}}</p>
                                    @if($user->addressLine2 != NULL)
                                    <p class="mt-2"><b>Address 2:</b> {{$user->addressLine2}}</p>
                                    @endif
                                    <p class="mt-2"><b>Aadhaar Number:</b> {{$warrior_registration->aadhaar_num}}</p>
                                    <p class="mt-2"><b>Covid Positive:</b> @if($user->isCovidPos == 0) NO @else Yes @endif </p>
                                    <p class="mt-2"><b>Has Symptoms:</b> @if($user->isCovidSymptoms == 0) NO @else Yes @endif </p>
                                    <p class="mt-2"><b>Covid Positive Family:</b> @if($user->isCovidPosFamily == 0) NO @else Yes @endif </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body" style="font-size: 18px;">
                                    <h3><strong style="font-size: 25px;">Service Details</strong> </h3>
                                    <p class="mt-2"><b>Service Area:</b>
                                        @foreach( json_decode($warrior_registration->serviceAreas) as $serviceArea)
                                        <span class="badge badge-primary">{{$serviceArea}}</span>
                                        @endforeach
                                    </p>
                                    <p class="mt-2"><b>Supply Type:</b>
                                        @foreach( json_decode($warrior_registration->supplyTypes) as $supplyType)
                                        <span class="badge badge-primary">{{$supplyType}}</span>
                                        @endforeach
                                    </p>
                                    @if($warrior_registration->organization != NULL)
                                    <p class="mt-2"><b>Organization :</b> {{$warrior_registration->organization}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Verify Agree -->
                    @if($warrior_registration->status == 'Pending')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('warrior.verifyagree')}}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="reg_id" value="{{$warrior_registration->id}}">
                                        <strong> Do you want to verify this user? you can't cancel later.</strong>
                                        <button type="submit" class="mt-2 btn btn-primary">Start Verification</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(($warrior_registration->status == 'Inprogress') and ($warrior_registration->verified_by == Auth::user()->id))
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('warrior.verifydisagree')}}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="reg_id" value="{{$warrior_registration->id}}">
                                        <strong> Are you sure? you don't want to verify this User?</strong>
                                        <button type="submit" class="mt-2 btn btn-danger">Stop Verification</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(($warrior_registration->status == 'Inprogress') and ($warrior_registration->verified_by != Auth::user()->id))
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <?php
                                    $verification_done_by = App\Models\User::find($warrior_registration->verified_by)
                                    ?>
                                    <strong>{{$verification_done_by->name}} is currently verifying this User</strong>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Accept User -->
                    @if($warrior_registration->status != 'Accepted')
                    <div class="row mt-4">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body" style="font-size: 18px;">
                                    <h3><strong style="font-size: 20px;">Do you want to Accept?</strong> </h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="post" action="{{route('warrior.verifyaccept')}}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="reg_id" value="{{$warrior_registration->id}}">
                                                <div class="form-group mt-2">
                                                    <label for="note">Note (Optional) </label>
                                                    <textarea rows="2" name="note" class="form-control rounded" placeholder="Enter note..."></textarea>
                                                </div>
                                                <button class="btn btn-success" type="submit">Accept</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($warrior_registration->status != 'Rejected')
                    <div class="row mt-4">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3><strong style="font-size: 20px;">Do you want to Reject?</strong> </h3>
                                            <form method="post" action="{{route('warrior.verifyreject')}}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="reg_id" value="{{$warrior_registration->id}}">
                                                <div class="form-group mt-2">
                                                    <label for="reason">Reason for Rejection</label>
                                                    <input type="text" name="reason" class="form-control rounded" placeholder="Enter reason for rejection...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="note">Note (Optional)</label>
                                                    <textarea rows="2" name="note" class="form-control rounded" placeholder="Enter note..."></textarea>
                                                </div>
                                                <button class="btn btn-danger" type="submit">Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>