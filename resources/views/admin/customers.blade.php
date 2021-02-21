@extends('layouts.app')
@section('content')

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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(!empty($users)) { 
                            foreach($users as $user){ ?>
                                <tr>
                                    <td> {!! $user['first_name'] !!} </td>
                                    <td> {!! $user['mobile'] !!} </td>
                                    <td> {!! $user['e_code'] !!} </td>
                                    <td> {!! $user['email'] !!} </td>
                                    <td class="text-right">
                                        <a href="{{ route('customer.edit',$user['id']) }}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <a href="{{ route('customer.delete',$user['id']) }}" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- <tr>
                            <td>FirstName LastName</td>
                            <td>+964 751 696 2013</td>
                            <td>E-9072</td>
                            <td>Erbil</td>
                            <td class="text-right">
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr> -->
                            
                        <?php }
                            } else { ?>
                            <tr> <td> NO record found </td></tr>
                        <?php } ?>



                        



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection