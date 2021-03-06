@extends('layouts.admin.app')
@section('title', config('app.name', 'Laravel') . ' |  '. (request()->route('id') ? 'Edit' : 'Add') . '  Customers')
@section('content')

<?php //dd($user); ?>
<form action="" method="post" action="{{ route('customers.add') }}">
    @csrf
    <?php if(isset($user['id']) && !empty($user['id']) ){ ?>
        <input type="hidden" name ="user_id" value="<?php echo $user['id'] ?>">
    <?php } ?>

<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ request()->route('id') ? 'Edit' : 'Add'  }} Customer</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ request()->route('id') ? 'Edit' : 'Add a new'  }} Customer</h5>
                        <form class="needs-validation" novalidate accept-charset="utf-8">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customername">Customer Name</label>
                                    <input type="text" class="form-control" name="customername" placeholder="Customer Name" required value = "<?= $user['name'] ??  old('customername'); ?>">
                                    <small class="form-text text-muted">Enter a valid customer name.</small>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer name.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_code">Customer code</label>
                                    <input type="text" class="form-control" name="e_code" placeholder="Customer Code" required value="<?= $user['e_code'] ?? old('e_code'); ?>"> 
                                    <small class="form-text text-muted">Enter a valid customer code.</small>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer code.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Customer address" required
                                value="<?= $user['address'] ??  old('address'); ?>">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter adress.</div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile Phone</label>
                                    <input type="number" class="form-control" name="mobile" placeholder="Customer Phone" required value="<?php echo isset($user['mobile']) ?  $user['mobile'] : old('mobile') ?>">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer Phone.</div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="customerpassword" placeholder="Customer Password" {{ request()->route('id') ? null : 'required' }} >
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer Password.</div>
                                </div>
                                @if (request()->route('id'))
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                        <option {{ ( $user['status'] ?? old('status') ) == config('user.status.active') ? 'selected': null }} value="{{ config('user.status.active') }}">Active</option>
                                        <option {{ ( $user['status'] ?? old('status') ) == config('user.status.inactive') ? 'selected': null }} value="{{ config('user.status.inactive') }}">Inactive</option>
                                        </select>
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> 
                                <?php echo isset($user['id']) ? 'Update Customer' : 'Add Customer' ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection