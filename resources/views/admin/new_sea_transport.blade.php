@extends('layouts.admin.app')
@section('title', config('app.name', 'Laravel') . ' | Sea Transport')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>Sea Shipments
                <a href="{{ route('admin.transport.addSea') }}" class="btn btn-sm btn-outline-primary float-right" style="  margin-left: 10px;"><i class="fas fa-plus"></i> Add Package</a>
                <i> </i>
            </h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="d-none"></th>
                            <th>CTN Qty</th>
                            <th>Description</th>
                            <th>Customer Code </th>
                            <th>Batch No.</th>
                            <th>Volume</th>
                            <th>ETA</th>
                            <th>Container Number</th>
                            <th>Status</th>
                            <th>Arrived At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transport_batches as $batch)
                        <tr id="{{ $batch->id }}" >
                            <td class="d-none"><?= strtotime(now()) - strtotime($batch->created_at); ?></td>
                            <td >{{ $batch->ctn_qty }}</td>
                            <td>{{ $batch->description }}</td>
                            <td>{{ $batch->customer_code }}</td>
                            <td>{{ $batch->batch_number }}</td>
                            <td>{{ $batch->volume }}</td>
                            <td>{{ $batch->eta }}</td>
                            <td>{{ $batch->container_number }}</td>
                            <td class=" text-center ">
                                {{ config('shipment.keyStatus.' . $batch->ship_status) }}<br>
                            </td>
                            <td class="text-center">
                                @if ( (config('shipment.status.arrived') ==  $batch->ship_status) &&  $batch->arrived_at )
                                    <span class="badge badge-secondary">
                                        {{ date('d M Y', strtotime($batch->arrived_at)) }}
                                        <br>{{ date('H:i a', strtotime($batch->arrived_at)) }}
                                    </span>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{ route('admin.transport.edit', ['id' => $batch->id] ) }}" class="btn btn-outline-info btn-rounded row-action-edit"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('admin.transport.delete', ['type' => 'sea', 'id' => $batch->id] ) }}" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i>
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
