<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Manage Requests</a>
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body mt-4">
            <!-- <div class="card" style="border-radius: 30px;">
                <div class="card-body"> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered hover">
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
                                @foreach($reqs as $key => $req)
                                <?php
                                date_default_timezone_set('Asia/Kolkata');
                                $dteStart = new DateTime(date('Y-m-d H:i:s'));
                                $dteEnd   = new DateTime($req->needed_by);
                                $dteDiff  = $dteStart->diff($dteEnd);

                                $years = $dteDiff->format("%Y");
                                $months = $dteDiff->format("%m");;
                                $days = $dteDiff->format("%d");;
                                $hours = $dteDiff->format("%H");
                                $message = "Long time";

                                if ($years != 0) {
                                    $message = $dteDiff->format("About %Y Years");
                                } elseif ($months != 0) {
                                    $message = $dteDiff->format("About %m Months");
                                } elseif ($days != 0) {
                                    $message = $dteDiff->format("About %d days");
                                } elseif ($hours != 0) {
                                    $message = $dteDiff->format("%H Hours and %I Minutes");
                                    //$message=($dteStart>=$dteEnd);
                                } else {
                                    $message = $dteDiff->format("%I Minutes");
                                }
                                ?>
                                <tr>
                                    <td>{{$key+1}}</td>
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
                                        Needed By:- {{$req->needed_by}}<br>
                                        <?php
                                        if ($dteStart < $dteEnd) {
                                            echo "$message left";
                                        } elseif ($dteStart >= $dteEnd) {
                                            echo "$message ago";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <span class="badge  @if($req->reqStatus == 'Open')
                                                badge-primary
                                                @elseif($req->reqStatus == 'Accepted')
                                                badge-warning
                                                @else
                                                badge-success
                                                @endif">{{$req->reqStatus}}</span>
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
            </div>
            <!-- </div>
            </div> -->
        </div>
    </x-slot>
</x-app-layout>