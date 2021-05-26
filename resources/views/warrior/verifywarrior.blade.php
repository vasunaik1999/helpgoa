<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Verify Warrior</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Aadhaar</th>
                        <th>Organization</th>
                        <th>service Area</th>
                        <th>Supply</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($warriors as $warrior)
                        <tr>
                            <td>{{$warrior->id}}</td>
                            <td>
                                {{$warrior->name}} <br>
                                {{$warrior->phone}} <br>
                                {{$warrior->secondaryPhone}}
                                {{$warrior->city1}}
                                {{$warrior->taluka1}}
                            </td>
                            <td>{{$warrior->aadhaar_num}}</td>
                            <td>{{$warrior->organization}}</td>
                            <td>
                                <?php $i = json_decode($warrior->serviceAreas, true) ?>
                                @foreach(json_decode($i) as $serviceArea)
                                <span>{{$serviceArea}}</span><br>
                                @endforeach
                            </td>
                            <td>
                                <?php $j = json_decode($warrior->supplyTypes, true) ?>
                                @foreach(json_decode($j) as $supplyType)
                                <span>{{$supplyType}}</span><br>
                                @endforeach
                            </td>
                            <td>
                                @if($warrior->status == 'Pending')
                                <span class="badge badge-primary p-2">{{$warrior->status}}</span>
                                @elseif($warrior->status == 'Inprogress')
                                <span class="badge badge-warning p-2">{{$warrior->status}}</span>
                                <?php
                                $verification_done_by = App\Models\User::find($warrior->verified_by)
                                ?>
                                <p>{{$verification_done_by->name}} is doing Verification</p>
                                @elseif($warrior->status == 'Accepted')
                                <span class="badge badge-success p-2">{{$warrior->status}}</span>
                                <?php
                                $verification_done_by = App\Models\User::find($warrior->verified_by)
                                ?>
                                <p>Verified By {{$verification_done_by->name}} <br> {{$verification_done_by->phone}}</p>
                                @elseif($warrior->status == 'Rejected')
                                <span class="badge badge-danger p-2">{{$warrior->status}}</span>
                                <?php
                                $verification_done_by = App\Models\User::find($warrior->verified_by)
                                ?>
                                <p>Rejected by {{$verification_done_by->name}}
                                    <br> {{$verification_done_by->phone}}
                                </p>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('dashboard/verify-warrior/'.$warrior->id)}}" class="btn btn-primary btn-sm">More Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>