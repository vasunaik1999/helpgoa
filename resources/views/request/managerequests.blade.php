<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Manage Requests</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Items</th>
                            <th>Urgncy Status</th>
                            <th>Status</th>
                            <th>Special Instructions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reqs as $req)
                        <tr>
                            <td>{{$req->id}}</td>
                            <td>{{$req->name}}</td>
                            <td>{{$req->phone}}</td>
                            <td>
                                {{$req->city}}, {{$req->taluka}}, {{$req->pincode}}
                                <br>{{$req->address}}
                            </td>
                            <td>
                                @foreach( json_decode($req->items) as $item)
                                {{$item}} <br>
                                @endforeach
                            </td>
                            <td>
                                {{$req->urgency_status}} <br>
                                Needed By:- {{$req->needed_by}}
                            </td>
                            <td>
                                <span class="badge badge-primary">{{$req->reqStatus}}</span>
                            </td>
                            <td>
                                {{$req->special_instructions}}
                            </td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{url('/dashboard/'.$req->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>