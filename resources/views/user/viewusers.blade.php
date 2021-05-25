<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">View Users</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>