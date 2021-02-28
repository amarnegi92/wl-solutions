@extends('layouts.admin.app')
@section('content')
<form  method="post" action="{{ route('shipment.add') }}">
    @csrf
    <div class="content">
        <div class="container-fluid">
            <div class="page-title">
                <h3>Arrived Items
                    <a href="add-package" class="btn btn-sm btn-outline-primary float-right" style="  margin-left: 10px;"><i class="fas fa-plus"></i> Add Package</a>
                    <i> </i>

                    <a id="shipSelectedBtn" href="roles.html" class="btn btn-sm btn-outline-success float-right disabled" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-box-open"></i> Ship selected</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Fill below information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                   
                                        <div class="form-group">
                                            <label for="text">Batch number</label>
                                            <input type="text" name="batchtext" placeholder="Batch Number" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="text">Description</label>
                                            <input type="text" name="desc" placeholder="Description" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" placeholder="Date" class="form-control">
                                        </div>

                                        <div>
                                            <input type="radio" checked="" value="air" name="optionsRadios">
                                            <label for="optionsRadios" style="font-size:18px;">Air Transport</label>
                                        </div>
                                        <div>
                                            <input type="radio" checked="" value="sea" name="optionsRadios">
                                            <label for="optionsRadios" style="font-size:18px;">Sea Transport</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="" selected>Choose...</option>
                                                <option value="in_transit">In transet</option>
-                                                <option value="arrived">Arrived</option>
-                                                <option value="delivered">Delivered</option>

                                                <!-- <option value="1">In transet</option>
                                                <option value="2">Arrived</option>
                                                <option value="3">Delivered</option> -->

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"> Add </button>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Check</th>
                                <th>Order #</th>
                                <th>Customer Code</th>
                                <th>Confermation Date</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_package as $package) { ?>
                                <tr>
                                    <td class="pkg-chkbox"><label class="checkbox-inline mx-sm-3 mb-1">
                                            <input id="inlineCheckbox{!! $package['id'] !!}" name = packageId[] type="checkbox" value="{!! $package['id'] !!}" <?php echo ($package['status'] == 0 ? 'disabled' : ''); ?> >
                                        </label></td>
                                    <td>{!! $package['order_number'] !!}</td>
                                    <td>{!! $package['customer_code'] !!}</td>
                                    <td>{!! $package['conf_date'] !!}</td>
                                    <td>{!! $package['description'] !!}</td>
                                    <td>
                                 
                                        <h5><span class="badge {{ config('package.badge_color.'. $package['status']) }}">{{ ucwords(config('package.state.'. $package['status'])) }}</span></h5>
                                 
                                        <!-- <h5><span class="badge badge-danger">Canceled</span></h5> -->
                                        <!-- <h5><span class="badge badge-success">delivered</span></h5> -->
                                        <!-- <h5><span class="badge badge-info">Arrived</span></h5> -->
                                    </td>
                                    <td class="text-right">


                                        <a href="{{ route('package.edit',$package['id'] ) }}" class="btn btn-outline-info btn-rounded <?php echo ($package['status'] == 0 ? 'disabled' : ''); ?> "><i class="fas fa-pen"></i></a>
                                            <a href="{{ route('package.delete',$package['id'] ) }}" class="btn btn-outline-danger btn-rounded <?php echo ($package['status'] == 0 ? 'disabled' : ''); ?> "><i class="fas fa-trash"></i>
                                            </a>



                                       <!--  <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a> -->
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