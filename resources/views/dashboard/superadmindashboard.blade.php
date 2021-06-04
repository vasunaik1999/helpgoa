<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for Super Admin') }}
        </h2>
    </x-slot>

    <x-slot name="card">
        <style>
            .vcard {
                border-radius: 30px;
                border: 1px solid lightgray;
            }
        </style>
        <div class="card-body" style="background-color: #f6f6f6;">
            <div class="row">
                <div class="col-md-3">
                    <div class="card vcard">
                        <div class="card-body">
                            <h1 class="text-center">
                                @foreach($visitors as $v)
                                {{$v->visitors}}
                                @endforeach
                            </h1>
                            <h5 class="text-center mt-2"><strong>Total Visitors</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <div class="card vcard">
                        <div class="card-body">
                            <h1 class="text-center">
                                @foreach($visitors as $uv)
                                {{$uv->unique_visitors}}
                                @endforeach
                            </h1>
                            <h5 class="text-center mt-2"><strong>Unique Visitors</strong></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>