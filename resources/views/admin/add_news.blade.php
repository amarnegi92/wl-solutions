@extends('layouts.admin.app')
@section('content')
<?php //dd($news); 
?>
<form action="" method="post" action="{{ route('customers.add') }}">
    @csrf
    <?php if (isset($news['id']) && !empty($news['id'])) { ?>
        <input type="hidden" name="news_id" value="<?php echo $news['id'] ?>">
    <?php } ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">{{ request()->route('id') ? 'Edit' : 'Add'  }} News</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ request()->route('id') ? 'Edit' : 'Add new'  }} News</h5>
                            <form class="needs-validation" novalidate accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required value="<?= $news['name'] ??  old('title'); ?>">
                                        <small class="form-text text-muted">Enter a valid Title.</small>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Title.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea type="text" class="form-control" name="content" placeholder="Enter Content" required value="<?= $news['content'] ??  old('content'); ?>"></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter Content.</div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-news-plus"></i>
                                        <?php echo isset($news['id']) ? 'Update News' : 'Add News' ?>
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection