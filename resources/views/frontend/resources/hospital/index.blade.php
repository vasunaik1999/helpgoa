<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span><a href="{{url('/dashboard/resources')}}">Resources</a> / <a href="">Medicine Suppliers</a>
            </h2>
        </div>
    </x-slot>


    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <h4>Hospital Details</h4>
                </div>
                <div class="col-md-6 my-auto">
                    <a href="{{url('/dashboard/resources/hospital/create')}}" class="btn btn-primary float-sm-center float-md-right">Create</a>
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
                                        <th>Name</th>
                                        <th>Bed Types</th>
                                        <th>Location</th>
                                        <th>Contact</th>
                                        <!-- <th>Note</th> -->
                                        <th>Nodal Officer</th>
                                        <th>Verified</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($resources as $key => $r)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                {{$r->name}}<br>
                                                {{$r->type}}
                                            </td>
                                            <td>{{$r->bed_types}}</td>
                                            <td>{{$r->location}}<br>
                                                {{$r->address}}
                                            </td>
                                            <td>
                                                <?php $nos = explode("/", $r->contact);
                                                ?>
                                                @foreach ($nos as $no)
                                                {{$no}} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$r->nodal_officer_name}} <br>
                                                {{$r->nodal_officer_phone}}
                                            </td>
                                            <!-- <td>{{$r->note}}</td> -->
                                            <td>
                                                @if($r->verified == 1)
                                                <p class="badge badge-success p-2">Verified</p>
                                                @else
                                                <p class="badge badge-warning p-2">Not Verified</p>
                                                @endif
                                                <?php
                                                $user = App\Models\User::select('name')->where('id', '=', $r->added_by)->first();
                                                ?>
                                                <p class="text-success">Added By<strong> {{$user->name}}</strong></p>
                                            </td>
                                            <td>
                                                @if($r->visibility == 1)
                                                <p class="badge badge-success p-2">Visible</p>
                                                @else
                                                <p class="badge badge-danger p-2">Hidden</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/dashboard/resources/hospital/'.$r->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
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