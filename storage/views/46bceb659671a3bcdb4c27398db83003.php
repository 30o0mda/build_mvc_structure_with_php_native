        <?php
        $category = db_find('categories', request('category_id'));
        redirect_if(empty($category), url('tasks'));
        $news = db_paginate('news', 'where category_id="' . $category['id'] . '"');
        ?>
        <?php echo  view('front.layout.header', ['title' => $category['name']]) ; ?>
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">
                    <?php echo  $category['name'] ; ?>
                </h1>
                <p class="lead my-3">
                    <?php echo $category['description']; ?>
                </p>
                <p class="lead mb-0">

                </p>
            </div>
        </div>
        <div class="row mb-2">
            <?php while ($row = mysqli_fetch_assoc($news['query'])): ?>
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <!-- <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong> -->
                            <h3 class="mb-0"><?php echo  $row['title'] ; ?></h3>
                            <div class="mb-1 text-body-secondary"><?php echo  date('M d', strtotime($row['created_at'])) ; ?></div>
                            <p class="card-text mb-auto"><?php echo  $row['description'] ; ?></p>
                            <a
                                href="<?php echo  url('news?category_id=' . $row['category_id'].'&id=' . $row['id']) ; ?>"
                                class="icon-link gap-1 icon-link-hover stretched-link">
                                <?php echo  trans('main.continue_reading') ; ?>
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#chevron-right"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <?php
                            if(!empty($row['image'])){
                                $img = url('storage/files/'.$row['image']);
                            }elseif(!empty($category['icon'])){
                                $img = url('storage/files/'.$category['icon']);
                            }else{
                                $img = url('assets/front/image/icon.png');
                            }
                            ?>
                            <img src="<?php echo  $img ; ?>" class="bd-placeholder-img" style="width: 200px; height: 250px;">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php echo  view('front.layout.footer') ; ?>