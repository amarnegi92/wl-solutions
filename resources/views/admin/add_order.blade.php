@extends('layouts.admin.app')
@section('title', config('app.name', 'Laravel') . ' |  '. (request()->route('id') ? 'Edit' : 'Add') . ' Order')
@section('content')
<form action="" method="post" action="{{ route('admin.postAddOrders') }}">
    @csrf

    <?php if(isset($order['id']) && !empty($order['id']) ){ ?>
        <input type="hidden" name ="order_id" value="<?php echo $order['id'] ?>">
    <?php } ?>
    <div class="content">
        <div class="container-fluid">
            <div class="page-title">
                <h3>Add Order</h3>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Add new order form</div>
                        <div class="card-body">
                           
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="order_number">Order Number</label>
                                        <input type="text" class="form-control" name="order_number" placeholder="Order Number" required value = "<?= $order['order_number'] ??  old('order_number'); ?>" >
                                        <small class="form-text text-muted">Enter a valid order number.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a order number.</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="conf_date">Confirmation Date</label>
                                        <input type="date" class="form-control" name="conf_date" placeholder="Confermation Date" required value = "<?= $order['conf_date'] ?? old('conf_date'); ?>">
                                        <small class="form-text text-muted">please add a valid confermation date.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter confermation date.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="desc">Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Description text" required value = "<?= $order['description'] ?? old('description'); ?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter description text.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status">Customer Code</label>
                                            <select id="customerCode" name="user_id" class="form-control" required>
                                                <option value="" selected>Choose...</option>
                                                @foreach($customer_codes as $user_id => $code)
                                                    <option value="{{ $user_id }}" <?php echo isset($order['user_id']) && $order['user_id'] == $user_id ?  'selected' :''?> >{{ $code }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select a Customer code.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ request()->route('id') ? 'Save' : 'Add'  }} Order</button>
                                </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection
@push('custom-scripts')
    <script>
        $(function () {
            $('#customerCode').select2();
        })
    </script>
@endpush