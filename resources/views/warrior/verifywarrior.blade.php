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
                                <a href="" class="btn btn-primary">More Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>