<?php
view('admin.layouts.header', ['titel' => trans('admin.comments') . ' - ' . trans('comment.show')]);

// جلب تعليق واحد مع بيانات الخبر المرتبط
$comment = db_first(
    'comments',
    "join news on comments.news_id = news.id
     where comments.id = " . request('id'),"
    comments.id,
    comments.name,
    comments.email,
    comments.status,
    comments.comment,
    comments.news_id,
    news.title as title
");

// لو التعليق مش موجود رجّع لصفحة التعليقات
redirect_if(empty($comment), aurl('comments'));
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2><?php echo  trans('admin.comments') ; ?> - <?php echo  trans('comment.show') ; ?> : <?php echo $comment['name']; ?></h2>
    <a class="btn btn-info" href="<?php echo aurl('comments'); ?>"><?php echo  trans('comment.comments') ; ?></a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name"><?php echo trans('comment.name'); ?></label>
            : <?php echo $comment['name']; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email"><?php echo trans('comment.email'); ?></label>
            : <?php echo $comment['email']; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="news"><?php echo trans('comment.news'); ?></label>
            : <?php echo $comment['title']; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status"><?php echo trans('comment.status'); ?></label>
            : <?php echo  trans('comment.'.$comment['status']) ; ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="comment"><?php echo trans('comment.comment'); ?></label>
            : <?php echo $comment['comment']; ?>
        </div>
    </div>
</div>

<?php
view('admin.layouts.footer');
?>
