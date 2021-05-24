@extends('welcome')

@section('title')
Home | Covid Help
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Need Help?</h1>
        <p>Don't worry, just create a request of items needed and our Goan warriors will help you</p>

        <button class="btn btn-sm text-white" style="background-color: #00BFA6;">Create Request</button>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="background-color:whitesmoke;">
                        <strong>Vasu Naik </strong> - Colvale, Bardez <span class="badge badge-danger float-right">Urgent</span><br>
                        <p class="mt-2">Need <span class="badge badge-primary ">Ivermectin</span>
                            <span class="badge badge-primary">Doxycycline</span>
                            <span class="badge badge-primary">Paracetamol</span>
                        </p>
                        <button class="btn btn-sm text-white float-right" style="background-color: #00BFA6;">Help</button>
                        <span> <em> Needed by Today, 5pm</em></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="background-color:whitesmoke;">
                        <strong> Munna Bhai </strong>- Mapusa, Bardez <span class="badge badge-success float-right">Not So Urgent</span><br>
                        <p class="mt-2">Need <span class="badge badge-primary ">Rice</span>
                            <span class="badge badge-primary">Eggs</span>
                            <span class="badge badge-primary">Milk</span>
                        </p>
                        <button class="btn btn-sm text-white float-right" style="background-color: #00BFA6;">Help</button>
                        <span> <em> Needed by Tomarrow, 1pm</em></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection