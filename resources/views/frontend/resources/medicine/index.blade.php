<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Medicine Suppliers</a>
            </h2>
        </div>
    </x-slot>


    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <h4>Medicine Suppliers Details</h4>
                </div>
                <div class="col-md-6 my-auto">
                    <a href="{{url('/dashboard/resources/medicine/create')}}" class="btn btn-primary float-sm-center float-md-right">Create</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Provider</th>
                                        <th>Location</th>
                                        <th>Contact</th>
                                        <th>Delivery Status</th>
                                        <!-- <th>Note</th> -->
                                        <th>Verified</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($resources as $key => $r)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$r->provider}}</td>
                                            <td>{{$r->supplier_location}}</td>
                                            <td>{{$r->delivery_status}}</td>
                                            <td>{{$r->contact}}</td>
                                            <!-- <td>{{$r->note}}</td> -->
                                            <td>
                                                @if($r->verified == 1)
                                                <p class="text-success">Verified</p>
                                                @else
                                                <p class="text-info">Not Verified</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($r->visibility == 1)
                                                <p class="text-success">Visible</p>
                                                @else
                                                <p class="text-danger">Hidden</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/dashboard/resources/medicine/'.$r->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                                <!-- <a href="" class="btn btn-danger btn-sm">Delete</a> -->
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
    </x-slot>

    @section('script')
    @endsection
</x-app-layout>