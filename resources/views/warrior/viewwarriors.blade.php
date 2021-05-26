<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">View Warriors</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($warriors as $key => $warrior)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$warrior->name}}</td>
                        <td>
                            {{$warrior->phone}}
                            @if($warrior->secondaryPhone)<br>
                            {{$warrior->secondaryPhone}}
                            @endif<br>
                            {{$warrior->email}}
                        </td>
                        <td>
                            @if($warrior->isBanned == 0)
                            <span class="badge badge-success p-2">Not Banned</span>
                            @else
                            <span class="badge badge-danger p-2">Banned</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('dashboard/view-warrior/'.$warrior->id.'/more-details')}}" class="btn btn-primary btn-sm">More Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>