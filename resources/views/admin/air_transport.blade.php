@extends('layouts.admin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>Sea Transport Items</h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Batch #</th>
                            <th> Order No. </th>
                            <th>Confermation Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($sea_transport_batches as $batch)
                        <tr id={{ $batch->id }}>

                            <td>{{ $batch->batch_number }}</td>
                            <td>{{ $batch->order_number }}</td>
                            <td>{{ date('d/m/Y', strtotime($batch->date)) }}</td>
                            <td>{{ $batch->description }}</td>
                            <td class="batch-status">
                                
                                <h5><span class="badge badge-info"><?php echo config('shipment.keyStatus.' . $batch->status); ?></span></h5>
                            </td>
                            <td class="text-right">
                                <img class="loading" src="{{ asset('img/loading.gif') }}" width="20" height="20" alt="loading" style="display: none;"/>
                                <a href="javascript:void(0)" data-order_num="{{ $batch->order_number }}" data-id="{{ $batch->id }}" class="btn btn-outline-info btn-rounded row-action-edit"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('transport.delete', ['type' => 'air', 'id' => $batch->id, 'sanitized_order_number' => slug($batch->order_number)] ) }}" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
    $(function () {

        let transport_type = <?= json_encode(config('shipment.keyStatus')) ?>;
        let select_status = '<select name="status"> '
        $.each(transport_type, function (key, value) {
            select_status +=`<option value="${key}">${value}</option>`
        });
        select_status += '</select>';

        let temp_batch_status_html = null;
        $(document.body).on('click', '.row-action-edit', function () {
            let id = $(this).attr('data-id');
            temp_batch_status_html = $(`#${id} .batch-status`).clone();
            $(`#${id} .batch-status`).html(select_status);

            $(this).removeClass('row-action-edit').addClass('row-action-save').html('<i class="fas fa-save">');
        });

        $(document.body).on('click', '.row-action-save', function (){
            let id = $(this).attr('data-id');
            let $this = $(this);
            
            $.ajax({
                type: 'post',
                url: '{{ route("changeTransportBatchStatus") }}',
                contentType:"application/x-www-form-urlencoded; charset=UTF-8",
                dataType: "json",
                data: {
                    id: id,
                    order_num: $this.attr('data-order_num'),
                    status: $(`#${id} .batch-status select`).find(':selected').val()
                },
                beforeSend: function () {
                    $(`#${id} .loading`).css('display', 'inline-block');
                },
                complete: function () {
                    $(`#${id} .loading`).css('display', 'none');
                },
                success: function (response) {
                    if (response.success) {
                        var new_batch_status = $(`#${id} .batch-status select`).find(':selected');
                        temp_batch_status_html.find('span').text(new_batch_status.text());
                        $(`#${id} .batch-status`).html(temp_batch_status_html.html());
                    } else {
                        alert('Oops!! something went wrong. could not update the value.');
                        $(`#${id} .batch-status`).html(temp_batch_status_html.html());
                    }
                    $this.removeClass('row-action-save').addClass('row-action-edit').html('<i class="fas fa-pen">');
                },
                error: function (jqXHR, exception) {
                    alert('Oops!! something went wrong. could not update the value.');
                    $(`#${id} .loading`).css('display', 'none');
                    $(`#${id} .batch-status`).html(temp_batch_status_html.html());
                }
                
            }).fail(function (jqXHR, exception) {
                alert('Oops!! something went wrong. could not update the value.');
                $(`#${id} .loading`).css('display', 'none');
                $(`#${id} .batch-status`).html(temp_batch_status_html.html());
            });

        });
        
    });
</script>
@endpush