@extends('layouts.admin.app')
@section('title', config('app.name', 'Laravel') . ' | '. (request()->route('id') ? 'Edit' : 'Add') . ' Sea Transport')
@section('content')
<form  method="post" action="{{ route('admin.transport.postAdd') }}">
    @csrf
    

    <input type="hidden" value="{{ config('shipment.transport.sea') }}" name="ship_type" />
    <?php if(isset($transport['id']) && !empty($transport['id']) ){ ?>
        <input type="hidden" name ="transport_id" value="<?php echo $transport['id'] ?>">
    <?php } ?>
    <div class="content">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Add Sea package</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ request()->route('id') ? 'Edit' : 'Add a new'  }}  package</h5>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="ctn_qty">CTN Qty.</label>
                                        <input type="number" class="form-control" name="ctn_qty" placeholder="CTN Qty." required value = "<?= $transport['ctn_qty'] ??  old('ctn_qty'); ?>" >
                                        <small class="form-text text-muted">Enter a valid container quantity.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a container quantity.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status">Customer Code</label>
                                            <select name="user_id" class="form-control" required>
                                                <option value="" selected>Choose...</option>
                                                @foreach($customer_codes as $user_id => $code)
                                                    <option value="{{ $user_id }}" <?php echo isset($transport['user_id']) && $transport['user_id'] == $user_id ?  'selected' :''?> >{{ $code }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select a Customer code.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="desc">Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Description text" required value = "<?= $transport['description'] ?? old('description'); ?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter description text.</div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="batch_number">Batch Number</label>
                                        <input type="text" class="form-control" name="batch_number" placeholder="Batch Number" required value = "<?= $transport['batch_number'] ??  old('batch_number'); ?>" >
                                        <small class="form-text text-muted">Enter a valid batch number.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a batch number.</div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="volume">Volume</label>
                                        <input type="text" class="form-control" name="volume" placeholder="Volume" required value = "<?= $transport['volume'] ?? old('volume'); ?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter customer code.</div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="eta">ETA</label>
                                        <input type="date" class="form-control" name="eta" placeholder="ETA" required value = "<?= $transport['eta'] ?? old('eta'); ?>">
                                        <small class="form-text text-muted">please add a valid estimated date.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter estimated date.</div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="container_number">Container Number</label>
                                        <input type="text" class="form-control" name="container_number" placeholder="Container Number" required value = "<?= $transport['container_number'] ?? old('container_number'); ?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter customer code.</div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="status">Status</label>
                                        <select name="ship_status" class="form-control" required>
                                            <option value="" selected>Choose...</option>
                                            @foreach( config('shipment.keyStatus') as $key => $value)
                                                <option value="{{ $key }}" <?php echo isset($transport['ship_status']) && $transport['ship_status'] == $key ?  'selected' :''?> >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a State.</div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ request()->route('id') ? 'Save' : 'Add'  }} transport</button>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</form>
@endsection