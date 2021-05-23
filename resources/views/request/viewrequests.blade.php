<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">View Requests</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
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
                                    @foreach($reqs as $key=>$req)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$req->name}}</td>
                                        <td>{{$req->phone}}</td>
                                        <td>
                                            {{$req->city}}, {{$req->taluka}}, {{$req->pincode}}
                                            <br>{{$req->address}}
                                        </td>
                                        <td>
                                            @foreach($req->items as $c=>$item)
                                            {{$item}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$req->urgency_status}} <br>
                                            Needed By:- {{$req->needed_by}}
                                        </td>
                                        <td>
                                            <span class="badge badge-primary">{{$req->status}}</span>
                                        </td>
                                        <td>
                                            {{$req->special_instructions}}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>