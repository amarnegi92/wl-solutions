@extends('layouts.adminApp')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>Arrived Items
                <a href="add-package" class="btn btn-sm btn-outline-primary float-right" style="  margin-left: 10px;"><i class="fas fa-plus"></i> Add Package</a>
                <i> </i>

                <a href="roles.html" class="btn btn-sm btn-outline-success float-right " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-box-open"></i> Ship selected</a>
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
                                <form accept-charset="utf-8">
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
                                        <input type="radio" checked="" value="option1" name="optionsRadios">
                                        <label for="optionsRadios" style="font-size:18px;">Air Transport</label>
                                    </div>
                                    <div>
                                        <input type="radio" checked="" value="option2" name="optionsRadios">
                                        <label for="optionsRadios" style="font-size:18px;">Sea Transport</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="" selected>Choose...</option>
                                            <option value="1">In transet</option>
                                            <option value="2">Arrived</option>
                                            <option value="3">Delivered</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Add </button>
                                    </div>
                                </form>
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
                            <th>Patch #</th>
                            <th>Confermation Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>45215</td>
                            <td>01/01/2022</td>
                            <td>here is the description of the text</td>
                            <td>
                                <h5><span class="badge badge-danger">Canceled</span></h5>
                            </td>
                            <td class="text-right">

                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>


                        <tr>

                            <td>45215</td>
                            <td>01/01/2021</td>
                            <td>here is the description of the text</td>
                            <td>
                                <h5><span class="badge badge-warning">shipped</span></h5>
                            </td>
                            <td class="text-right">

                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>


                        <tr>

                            <td>45215</td>
                            <td>01/01/2021</td>
                            <td>here is the description of the text</td>
                            <td>
                                <h5><span class="badge badge-success">delivered</span></h5>
                            </td>
                            <td class="text-right">

                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>


                        <tr>

                            <td>45215</td>
                            <td>01/01/2021</td>
                            <td>here is the description of the text</td>
                            <td>
                                <h5><span class="badge badge-info">Arrived</span></h5>
                            </td>
                            <td class="text-right">

                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>


                        <tr>

                            <td>45215</td>
                            <td>01/01/2021</td>
                            <td>here is the description of the text</td>
                            <td>
                                <h5><span class="badge badge-warning">New</span></h5>
                            </td>
                            <td class="text-right">

                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection