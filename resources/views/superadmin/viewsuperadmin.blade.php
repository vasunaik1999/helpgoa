<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">View Superadmin</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($superadmins as $key => $superadmin)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$superadmin->name}}</td>
                            <td>
                                {{$superadmin->phone}}
                                @if($superadmin->secondaryPhone)<br>
                                {{$superadmin->secondaryPhone}}
                                @endif<br>
                                {{$superadmin->email}}
                            </td>
                            <td>
                                @if($superadmin->isBanned == 0)
                                <span class="badge badge-success p-2">Not Banned</span>
                                @else
                                <span class="badge badge-danger p-2">Banned</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('dashboard/view-superadmin/'.$superadmin->id.'/more-details')}}" class="btn btn-primary btn-sm">More Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>