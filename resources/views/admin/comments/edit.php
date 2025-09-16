<?php
view('admin.layouts.header', ['titel' => trans('admin.comments') . ' - ' . trans('comment.edit')]);
$comment = db_find('comments', request('id'));
redirect_if(empty($comment), aurl('comments'));
?>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>{{ trans('admin.comments') }} - {{ trans('comment.edit') }}</h2>
    <a class="btn btn-info" href="{{aurl('comments')}}">{{ trans('comment.comments') }}</a>
</div>
<form method="post" action="{{aurl('comments/edit?id='.$comment['id'])}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <input type="hidden" name="news_id" value="{{ $comment['news_id'] }}" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{trans('comment.name')}}</label>
                <input type="text" name="name" placeholder="{{trans('comment.name')}}" class="form-control<?php echo !empty(get_error('name')) ? ' is-invalid' : ''; ?>"
                    value="{{$comment['name']}}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">{{trans('comment.email')}}</label>
                <input type="text" name="email" placeholder="{{trans('comment.email')}}" class="form-control<?php echo !empty(get_error('email')) ? ' is-invalid' : ''; ?>"
                    value="{{$comment['email']}}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="news">{{trans('comment.news')}}</label>
                <a href="{{aurl('news/show?id='.$comment['news_id'])}}">{{$comment['news_id']}}</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{trans('comment.status')}}</label>
                <select name="status" class="form-select <?php echo !empty(get_error('status')) ? ' is-invalid' : ''; ?>">
                    <option value="show" {{ $comment['status']== 'show'?'selected':'' }}>{{trans('comment.show')}}</option>
                    <option value="hide" {{ $comment['status']== 'hide'?'selected':'' }}>{{trans('comment.hide')}}</option>

                </select>
            </div>
        </div>
        <div class="col-md-24">
            <div class="form-group">
                <label for="comment">{{trans('comment.comment')}}</label>
                <textarea name="comment" placeholder="{{trans('comment.comment')}}" class="form-control<?php echo !empty(get_error('comment')) ? ' is-invalid' : ''; ?>">{{$comment['comment']}}</textarea>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="{{ trans('comment.save') }}" />
</form>
<?php
view('admin.layouts.footer');
?>