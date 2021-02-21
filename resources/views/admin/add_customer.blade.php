@extends('layouts.adminApp')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Add Customer</div>
                    <div class="card-body">
                        <h5 class="card-title">Add a new Customer</h5>
                        <form class="needs-validation" novalidate accept-charset="utf-8">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customername">Customer Name</label>
                                    <input type="text" class="form-control" name="customername" placeholder="Customer Name" required>
                                    <small class="form-text text-muted">Enter a valid customer name.</small>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer name.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customercode">Customer code</label>
                                    <input type="text" class="form-control" name="customercode" placeholder="Customer Code" required>
                                    <small class="form-text text-muted">Enter a valid customer code.</small>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer code.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Customer address" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter adress.</div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile Phone</label>
                                    <input type="number" class="form-control" name="customermobile" placeholder="Customer Phone" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer Phone.</div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="customerpassword" placeholder="Customer Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer Password.</div>
                                </div>


                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection