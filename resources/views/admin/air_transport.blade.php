@extends('layouts.app')
@section('content')
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
                        <h5 class="card-title">Add a new record</h5>
                        <form class="needs-validation" novalidate accept-charset="utf-8">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ordernumber">Order Number</label>
                                    <input type="text" class="form-control" name="ordernumber" placeholder="Order Number" required>
                                    <small class="form-text text-muted">Enter a valid order number.</small>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a order number.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confdate">Confermation Date</label>
                                    <input type="date" class="form-control" name="confdate" placeholder="Confermation Date" required>
                                    <small class="form-text text-muted">please add a valid confermation date.</small>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter confermation date.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <input type="text" class="form-control" name="desc" placeholder="Description text" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter description text.</div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">Customer Code</label>
                                    <input type="text" class="form-control" name="customercode" placeholder="Customer code" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter customer code.</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="state">Status</label>
                                    <select name="state" class="form-control" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="1">Confirmed</option>
                                        <option value="2">Partially purchased</option>
                                        <option value="2">Fully purchased</option>

                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select a State.</div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Add package</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection