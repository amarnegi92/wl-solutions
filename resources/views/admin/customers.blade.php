@extends('layouts.admin.app')
@section('title', config('app.name', 'Laravel') . ' | Customers')
@section('content')
<style>
tr.disabled {
    background-color: rgba(0,0,0,.075);
}
</style>
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>Customers
                <a href="add-customer" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-plus"></i> Add Customer</a>
            </h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(isset($users)){
                            foreach ($users as $user_id => $user) { ?>
                                <tr class="{{ $user['status'] == config('user.status.inactive') ? 'disabled' : null }}">
                                    <td>{!! $user['name'] !!}</td>
                                    <td>{!! $user['mobile'] !!}</td>
                                    <td>{!! $user['e_code'] !!}</td>
                                    <td>{!! $user['address'] !!}</td>
                                    <td class="text-right">
                                        <a href="{{ route('customer.edit',$user_id) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <a href="{{ route('customer.delete',$user_id) }}" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php    
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection