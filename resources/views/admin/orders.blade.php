@extends('layouts.admin.app')
@section('title',config('app.name', 'Laravel') . ' | Orders')
@section('content')
<style>
    .bg-silver {
        background-color: silver;
    }
</style>
    <div class="content">
        <div class="container-fluid">
            <div class="page-title">
                <h3>Orders
                    <a href="{{ route('admin.addOrders') }}" class="btn btn-sm btn-outline-primary float-right" style="  margin-left: 10px;"><i class="fas fa-plus"></i> Add Order</a>
                    <i> </i>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="d-none"></th>
                                <th>Order #</th>
                                <th>Customer Code</th>
                                <th>Confirmation Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_order as $order) { ?>
                                <tr  class="{{ ($order['status'] == config('order.keyState.shipped')) ? 'bg-silver': null }}" >
                                    <td class="d-none"><?= strtotime(now()) - strtotime($order['created_at']); ?></td>
                                    <td>{!! $order['order_number'] !!}</td>
                                    <td>{!! $order['customer_code'] !!}</td>
                                    <td>{!! $order['conf_date'] !!}</td>
                                    <td>{!! $order['description'] !!}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.editOrder',$order['id'] ) }}" class="btn btn-outline-info btn-rounded <?php echo ($order['status'] == 0 ? 'disabled' : ''); ?> "><i class="fas fa-pen"></i></a>
                                        <a href="{{ route('admin.deleteOrder',$order['id'] ) }}" class="btn btn-outline-danger btn-rounded <?php echo ($order['status'] == 0 ? 'disabled' : ''); ?> "><i class="fas fa-trash"></i></a>
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
@endsection
@push('custom-scripts')
<script>
    $(function () {
        $(document.body).on('change', 'input:checkbox', function () {
            ($('.pkg-chkbox input:checkbox:checked').length ) ?
                $('#shipSelectedBtn').removeClass('disabled') :  $('#shipSelectedBtn').addClass('disabled');
        });
    });
</script>
@endpush