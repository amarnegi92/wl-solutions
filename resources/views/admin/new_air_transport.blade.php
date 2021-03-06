@extends('layouts.admin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>Air Shipments
            <a href="{{ route('admin.transport.addAir') }}" class="btn btn-sm btn-outline-primary float-right" style="  margin-left: 10px;"><i class="fas fa-plus"></i> Add Package</a>
                    <i> </i>
            </h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>CTN Qty</th>
                            <th>Received On </th>
                            <th>Customer Code </th>
                            <th>Description</th>
                            <th>Batch No.</th>
                            <th>Weight</th>
                            <th>ETA</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($transport_batches as $batch)
                        <tr id={{ $batch->id }}>

                            <td>{{ $batch->ctn_qty }}</td>
                            <td>{{ $batch->received_date }}</td>
                            <td>{{ 'customer code' }}</td>
                            <td>{{ $batch->description }}</td>
                            <td>{{ $batch->batch_number }}</td>
                            <td>{{ $batch->weight }}</td>
                            <td>{{ $batch->eta }}</td>
                            <td>{{ config('shipment.keyStatus.' . $batch->ship_status) }}</td>

                            <td class="text-right">
                                <a href="{{ route('admin.transport.edit', ['id' => $batch->id] ) }}" class="btn btn-outline-info btn-rounded row-action-edit"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('admin.transport.delete', ['type' => 'air', 'id' => $batch->id] ) }}" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i>
                                </a>
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