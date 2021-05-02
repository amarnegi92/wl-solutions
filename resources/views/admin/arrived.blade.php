@extends('layouts.admin.app')
@section('title',config('app.name', 'Laravel') . ' | Arrived')
@section('content')
<style>
    .bg-silver {
        background-color: silver;
    }
</style>
<form  method="post" action="{{ route('shipment.add') }}">
    @csrf
    <div class="content">
        <div class="container-fluid">
            <div class="page-title">
                <h3>Arrived Items</h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="d-none"></th>
                                <th>Shipped Via</th>
                                <th>CTN Qty.</th>
                                <th>Received on</th>
                                <th>Description</th>
                                <th>Batch No.</th>
                                <th>Weight</th>
                                <th>ETA</th>
                                <th>Container</th>
                                
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($transports as $package) { ?>
                                <tr>
                                    <td class="d-none"><?= strtotime(now()) - strtotime($package['created_at']); ?></td>
                                    <td>
                                        <h5><span class="badge {{ config('shipment.badges.' . $package->ship_type) }}">
                                        {{ ucwords(config('shipment.keyTransport.' . $package->ship_type)) }}
                                        </span>
                                        </h5>
                                    </td>
                                    <td>{!! $package->ctn_qty !!}</td>
                                    <td>{{ $package->received_date ?? 'N/A' }}</td>
                                    <td>{!! $package->description !!}</td>
                                    <td>{!! $package->batch_number !!}</td>
                                    <td>{{ $package->weight ?? 'N/A' }}</td>
                                    <td>{!! $package->eta !!}</td>
                                    <td>{!! $package->container_number !!}</td>
                                    
                                    <td>
                                        <h5>
                                            <span class="badge {{ config('shipment.badges.' .$package->ship_status) }}">{!! config('shipment.keyStatus.' .$package->ship_status) !!}</span>
                                        </h5>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
