<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Warriors</a> / </span> <a href="">More Details</a>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p style="font-size: 25px;"><strong>User Details</strong></p>
                            <p class="mt-2"><strong>Name :-</strong> {{$user->name}}</p>
                            <p class="mt-2"><strong>Phone Number :-</strong> {{$user->phone}}</p>
                            <p class="mt-2"><strong>Secondary Phone :-</strong> {{$user->secondaryPhone}}</p>
                            <p class="mt-2"><strong>Email :-</strong> {{$user->email}}</p>
                            <hr>
                            <p class="mt-2" style="font-size: 18px;"><strong>Address 1</strong></p>
                            <p class="mt-2">City :- {{$user->city1}}</p>
                            <p class="mt-2">Taluka :- {{$user->taluka1}}</p>
                            <p class="mt-2">Address Line 1:- {{$user->addressLine1}}</p>
                            <hr>
                            <p class="mt-2" style="font-size: 18px;"><strong>Address 2</strong></p>
                            <p class="mt-2">City :- {{$user->city2}}</p>
                            <p class="mt-2">Taluka :- {{$user->taluka2}}</p>
                            <p class="mt-2">Address Line 1:- {{$user->addressLine2}}</p>
                            <hr>
                            <p class="mt-2" style="font-size: 18px;"><strong>Warrior Registration Details</strong></p>
                            <p class="mt-2">Aadhaar Number :- {{$warriordetails->aadhaar_num}}</p>
                            <p class="mt-2">Organization :- {{$warriordetails->organization}}</p>
                            <p class="mt-2">Supply Types:-
                                @foreach( json_decode($warriordetails->serviceAreas) as $serviceArea)
                                <span class="badge badge-primary">{{$serviceArea}}</span>
                                @endforeach
                            </p>
                            <p class="mt-2">Supply Types:-
                                @foreach( json_decode($warriordetails->supplyTypes) as $supplyType)
                                <span class="badge badge-primary">{{$supplyType}}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="mt-2" style="font-size: 18px;"><strong>Covid Positive?</strong></p>
                                    <p class="mt-2">User Covid Positive :- @if($user->isCovidPos == 0)No @else Yes @endif</p>
                                    <p class="mt-2">Family Covid Positive :- @if($user->isCovidPosFamily == 0)No @else Yes @endif</p>
                                    <p class="mt-2">User has Symptoms:- @if($user->isCovidSymptoms == 0)No @else Yes @endif</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-2" style="font-size: 18px;"><strong>Want to ban this user?</strong></p>
                                    <form method="post" action="{{route('warrior.ban')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <label for="isBanned">Is User Banned</label>
                                            <select name="isBanned" class="form-control" id="isBanned">
                                                <option value="0" @if($user->isBanned == 0)selected @endif>Not Banned</option>
                                                <option value="1" @if($user->isBanned == 1)selected @endif>Banned</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->hasRole('superadmin'))
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-2" style="font-size: 18px;"><strong>Do you want to make {{$user->name}} Admin?</strong></p>
                                    <form method="post" action="{{route('warrior.make.admin')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <p>I Accept, I want to make {{$user->name}} Admin</p>
                                            <input type="checkbox" name="makeAdminCheck" id="makeAdminCheck" onchange="activateAdminBtn(this)">
                                        </div>
                                        <button type=" submit" class="btn btn-danger" id="makeAdminBtn">Make Admin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>

    @section('script')
    <script>
        document.getElementById("makeAdminBtn").disabled = true;

        function activateAdminBtn(element) {
            if (element.checked) {
                document.getElementById("makeAdminBtn").disabled = false;
            } else {
                document.getElementById("makeAdminBtn").disabled = true;
            }

        }
    </script>
    @endsection
</x-app-layout>