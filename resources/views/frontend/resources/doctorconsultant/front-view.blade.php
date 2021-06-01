@extends('welcome')

@section('title')
Resources | Covid Help
@endsection

@section('content')
<div class="card" style="margin-top:9%;">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1>Doctor Consultant</h1>
            </div>
        </div>

        <!-- <div class="card">
            <div class="card-body"> -->
        <div class="row mt-3">
            <div class="col">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Consultation</th>
                            <th>Availability</th>
                            <th>Contact</th>
                            <th>Verified</th>
                        </thead>
                        <tbody>
                            @foreach($resources as $key => $r)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$r->name}}</td>
                                <td>{{$r->consultation_type}}</td>
                                <td>{{$r->availability}}</td>
                                <td><?php $nos = explode("/", $r->contact);
                                    ?>
                                    @foreach ($nos as $no)
                                    {{$no}} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($r->verified == 1)
                                    <p class="text-primary">Verified
                                        <span>
                                            <svg width="25px" height="25px" x="0" y="0" viewBox="0 0 509.604 509.604" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                <g>
                                                    <path d="M34.262,333.282c8.119,6.75,14.793,15.223,14.143,20.988c-0.382,3.443-0.593,6.943-0.593,10.5    c0,52.393,41.3,94.861,92.24,94.861c6.292,0,12.431-0.65,18.37-1.885c10.002-2.074,21.812,1.941,28.888,9.793    c16.82,18.646,40.803,30.342,67.492,30.342c28.19,0,53.426-13.016,70.342-33.518c6.723-8.146,18.103-11.533,28.22-8.5    c8.166,2.447,16.811,3.768,25.751,3.768c50.939,0,92.24-42.477,92.24-94.861c0-5.861-0.535-11.59-1.549-17.145    c-1.712-9.371,2.85-21.047,10.471-28.363c18.025-17.289,29.328-41.883,29.328-69.242c0-29.787-13.368-56.323-34.263-73.698    c-8.118-6.751-14.793-15.224-14.143-20.99c0.383-3.442,0.593-6.942,0.593-10.5c0-52.393-41.301-94.86-92.24-94.86    c-6.292,0-12.431,0.65-18.369,1.884c-10.002,2.075-21.812-1.941-28.889-9.792c-16.82-18.647-40.803-30.342-67.492-30.342    c-26.688,0-50.671,11.695-67.492,30.342c-7.076,7.841-18.886,11.867-28.888,9.792c-5.938-1.234-12.078-1.884-18.37-1.884    c-50.939,0-92.24,42.477-92.24,94.86c0,5.049,0.392,10.002,1.147,14.832c1.262,8.128-4.447,18.149-12.747,24.681    C14.219,201.663,0,228.887,0,259.583C0,289.37,13.368,315.907,34.262,333.282z M131.475,263.016    c2.046-3.625,7.268-3.672,12.049,0.479l48.119,33.918c2.61,1.588,5.106,2.4,7.506,2.4c4.963,0,8.893-3.576,12.689-7.02    l153.985-154.138c9.629-10.471,18.99-14.162,25.102-10.146c2.82,1.855,4.646,4.647,5.135,7.87    c0.583,3.825-0.756,7.946-3.768,11.599l-185.149,224.91c-2.687,3.26-6.11,5.059-9.629,5.059c-4.179,0-7.965-2.516-10.404-6.895    l-54.344-97.969C130.519,269.422,130.021,265.618,131.475,263.016z" fill="#2196f3" data-original="#000000" class="" />
                                                </g>
                                            </svg>
                                        </span>
                                    </p>
                                    @else
                                    <p class="text-secondary">Not Verified</p>
                                    @endif
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
</div>
@endsection

@section('script')

@endsection