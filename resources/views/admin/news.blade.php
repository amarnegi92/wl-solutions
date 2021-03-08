@extends('layouts.admin.app')
@section('title', config('app.name', 'Laravel') . ' | News')
@section('content')
<?php
#TODO : move to helper.
function sanitize($string)
{
    return preg_replace('/[^a-zA-Z0-9_.]/', '_', $string);
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="page-title">
            <h3>News Items
                <a href="add-news" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-plus"></i> Add News</a>
            </h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                @if(count($news))
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $cur_new)
                        <tr id={{ $cur_new->id }}>
                            <td>{{ $cur_new->title }}</td>
                            <td>{{ $cur_new->content }}</td>
                            <td class="text-right">
                                <a href="{{ route('news.edit',$cur_new->id ) }}" class="btn btn-outline-info btn-rounded  "><i class="fas fa-pen"></i></a>
                                <a href="{{ route('news.delete',$cur_new->id ) }}" class="btn btn-outline-danger btn-rounded  "><i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No Record Found</p>
                @endif
            </div>
        </div>
        <p class="mb-0">Notice:</p>
    </div>
</div>
@endsection
@push('custom-scripts')
@endpush