<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{url('/dashboard')}}">Dashboard</a><span> / </span> <a href="">Create Request</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('request.store') }}">
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="status" value="open">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." name="phone">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="taluka">Taluka</label>
                                    <input type="text" class="form-control rounded" id="taluka" placeholder="Enter Taluka..." name="taluka">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control rounded" id="city" placeholder="Enter City..." name="city">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control rounded" id="address" placeholder="Enter Address..." name="address">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="pincode">Pincode (Optional)</label>
                                    <input type="number" class="form-control rounded" id="pincode" placeholder="Enter Pincode..." name="pincode">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="needed_by">Need by</label>
                                    <input type="datetime-local" class="form-control rounded" id="needed_by" placeholder="Enter Date..." name="needed_by">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <label for="special_instructions">Special Instructions (Optional)</label>
                                    <textarea name="special_instructions" class="form-control rounded" rows="3" placeholder="Enter special instructions if any..."></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-md-6 col-sm-12">
                                    <label for="special_instructions">Items (Eg: Rice - 2kg)</label>
                                    <table class="table table-responsive table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th style="text-align:center;"><a style="color:white;" class="btn btn-primary btn-sm addRow">+ Add Item</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="items[]" class="form-control rounded" required></td>
                                                <td style="text-align:center;"><a style="color:white;" class="btn btn-danger btn-sm remove">- Remove</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @section('script')
    <script>
        $('.addRow').on('click', function() {
            addRow();
        });

        function addRow() {
            var tr = '<tr>' +
                '<td>' +
                '<input type="text" name = "items[]" class = "form-control rounded" required>' +
                '</td>' +
                '<td style="text-align:center;">' +
                '<a style="color:white;" class="btn btn-danger btn-sm remove"> - Remove</a>' +
                '</td>' +
                '</tr>';

            $('tbody').append(tr);
        };


        $('tbody').on('click', '.remove', function() {
            $(this).parent().parent().remove();
        });
    </script>
    @endsection
</x-app-layout>