<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Form Responses
        </h2>
    </x-slot>

    <x-slot name="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <!-- <div class="table-responsive"> -->
                    <table id="table" class="table table-striped table-bordered hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($responses as $key => $r)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$r->name}} <br>
                                    {{$r->phone}}
                                </td>
                                <td>{{$r->category}}</td>
                                <td>{{$r->message}}</td>
                                <td>
                                    <form action="{{route('contactform.update.status')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="r_id" value="{{$r->id}}">
                                        <input type="hidden" name="status" value="{{$r->status}}">
                                        @if($r->status == 0)
                                        <button type="submit" class="btn btn-warning btn-sm">Open</button>
                                        @else
                                        <button type="submit" class="btn btn-success btn-sm">Closed</button>
                                        @endif
                                    </form>
                                </td>
                                <td><a class="btn btn-sm btn-secondary">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>