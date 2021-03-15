@extends('layouts.admin.app')
@section('content')
<form action="" method="post" action="{{ route('admin.addPackage') }}">
    @csrf
    

    
    <?php if(isset($package['id']) && !empty($package['id']) ){ ?>
        <input type="hidden" name ="package_id" value="<?php echo $package['id'] ?>">
    <?php } ?>
    <div class="content">
        <div class="container-fluid">
            <div class="page-title">
                <h3>Forms</h3>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Arrived shipments</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ request()->route('id') ? 'Edit' : 'Add a new'  }}  record</h5>
                            <form class="needs-validation" novalidate accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="order_number">Order Number</label>
                                        <input type="text" class="form-control" name="order_number" placeholder="Order Number" required value = "<?= $package['order_number'] ??  old('order_number'); ?>" >
                                        <small class="form-text text-muted">Enter a valid order number.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a order number.</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="conf_date">Confermation Date</label>
                                        <input type="date" class="form-control" name="conf_date" placeholder="Confermation Date" required value = "<?= $package['conf_date'] ?? old('conf_date'); ?>">
                                        <small class="form-text text-muted">please add a valid confermation date.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter confermation date.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Description text" required value = "<?= $package['description'] ?? old('description'); ?>">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter description text.</div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">Customer Code</label>
                                        <input type="text" class="form-control" name="customer_code" placeholder="Customer code" required value = "<?= $package['customer_code'] ?? old('customer_code'); ?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter customer code.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="" selected>Choose...</option>
                                            <option value="1" <?php echo isset($package['status']) && $package['status'] == 1 ?  'selected' :''?> >Confirmed</option>
                                            <option value="2" <?php echo isset($package['status']) && $package['status'] == 2 ?  'selected' :''?>  >Partially purchased</option>
                                            <option value="3" <?php echo isset($package['status']) && $package['status'] == 3 ?  'selected' :''?> >Fully purchased</option>

                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a State.</div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ request()->route('id') ? 'Save' : 'Add'  }} package</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection