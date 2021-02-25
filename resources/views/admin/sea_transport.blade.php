@extends('layouts.admin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>Sea Transport Items</h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Batch #</th>
                            <th>Confermation Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($sea_transport_batches as $batch)
                        <tr id={{!! $batch->id !!}}>

                            <td>{{ $batch->batch_number }}</td>
                            <td>{{ date('d/m/Y', strtotime($batch->date)) }}</td>
                            <td>{{ $batch->description }}</td>
                            <td>
                                <h5><span class="badge badge-danger">{{  config('shipment.status.' . $batch->status) }}</span></h5>
                            </td>
                            <td class="text-right">

                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection