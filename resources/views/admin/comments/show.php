<?php
view('admin.layouts.header', ['titel' => trans('admin.comments') . ' - ' . trans('comment.show')]);
$comment = db_find('comments', request('id'));
redirect_if(empty($comment), aurl('comments'));

?>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>{{ trans('admin.comments') }} - {{ trans('comment.show') }} : {{$comment['name']}}</h2>
    <a class="btn btn-info" href="{{aurl('comments')}}">{{ trans('comment.comments') }}</a>
</div>



<div class="row">
    <div class="col-md-6">
        <div clase="from-group">
            <label for="name">{{trans('comment.name')}}</label>
            : {{$comment['name']}}
        </div>
    </div>
    <div class="col-md-6">
        <div clase="from-group">
            <label for="email">{{trans('comment.email')}}</label>
            : {{$comment['email']}}
        </div>
    </div>
    <div class="col-md-6">
        <div clase="from-group">
            <label for="news">{{trans('comment.news')}}</label>
            : {{$comment['news_id']}}
        </div>
    </div>
    <div class="col-md-6">
        <div clase="from-group">
            <label for="status">{{trans('comment.status')}}</label>
            : {{ trans('comment.'.$comment['status']) }}
        </div>
    </div>
    <div class="col-md-24">
        <div clase="from-group">
            <label for="comment">{{trans('comment.comment')}}</label>
            : {{$comment['comment']}}
        </div>
    </div>
</div>
<?php
view('admin.layouts.footer');
?>