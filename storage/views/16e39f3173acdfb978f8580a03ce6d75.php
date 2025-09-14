        <?php
        //  request('id')
        $news = db_first(
            'news',
                        "join users on news.user_id = users.id
join categories on news.category_id = categories.id where news.id='" . request('id') . "'
",
            "
news.title,
news.id,
news.image,
news.description,
news.content,
news.created_at,
news.updated_at,
news.category_id,
news.user_id,
users.name as username,
categories.name as category_name"
        );
        redirect_if(empty($news), url('tasks'));
        // $news = db_paginate('news', 'where category_id="' . $category['id'] . '"');
        ?>
        <?php echo  view('front.layout.header', ['title' => $news['title']]) ; ?>
        <div class="row mb-2">
            <div class="col-md-12">
                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1"><?php echo  $news['title'] ; ?></h2>
                    <p class="blog-post-meta">
                        <?php echo  $news['created_at'] ; ?> by <span><?php echo  $news['username'] ; ?></span>
                    </p>
                    <hr>
                    <?php
                    if (!empty($news['image'])) {
                        $img = url('storage/' . $news['image']);
                    } else {
                        $img = url('assets/front/image/icon.png');
                    }
                    ?>
                    <img src="<?php echo  $img ; ?>" class="bd-placeholder-img" style="width: 100%; height: 500px;">
                    <p><?php echo  $news['content'] ; ?></p>
                </article>
                <hr />
                <div class="col-md-12">
                    <?php echo  view('front.categories.comments') ; ?>
                </div>
            </div>
        </div>
        <?php echo  view('front.layout.footer') ; ?>