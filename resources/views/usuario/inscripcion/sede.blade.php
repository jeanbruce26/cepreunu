@extends ('usuario')

@section('content')

<div class="row">
    <div class="col-10 m-auto">
        <div class="card">
            <div class="card-body form-steps">
                @livewire('sedes', ['pago_id' => auth('pagos')->user()->id_pago])
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
    
@endsection