<?php
view('admin.layouts.header', ['titel' => trans('admin.categories') . ' - ' . trans('category.edit')]);
$category = db_find('categories', request('id'));
redirect_if(empty($category), aurl('categories'));

?>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><?php echo  trans('admin.categories') ; ?> - <?php echo  trans('category.edit') ; ?></h2>
        <a class="btn btn-info" href="<?php echo aurl('categories'); ?>"><?php echo  trans('category.categories') ; ?></a>
    </div>
    <form method="post" action="<?php echo aurl('categories/edit?id='.$category['id']); ?>" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post" />
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name"><?php echo trans('category.name'); ?></label>
                    <input type="text" name="name" placeholder="<?php echo trans('category.name'); ?>" class="form-control<?php echo !empty(get_error('name')) ? ' is-invalid' : ''; ?>"
                        value="<?php echo $category['name']; ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="icon"><?php echo trans('category.icon'); ?></label>
                    <input type="file" name="icon" placeholder="<?php echo trans('category.icon'); ?>" class="form-control<?php echo !empty(get_error('icon')) ? ' is-invalid' : ''; ?>" />
                    <!-- Button trigger modal -->
                    <img src="<?php echo storage_url($category['icon']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width:25px;height:25px;cursor:pointer" />
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="<?php echo storage_url($category['icon']); ?>" style="width:100%;height:100% ;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-24">
                <div class="form-group">
                    <label for="description"><?php echo trans('category.description'); ?></label>
                    <textarea name="description" placeholder="<?php echo trans('category.description'); ?>" class="form-control<?php echo !empty(get_error('description')) ? ' is-invalid' : ''; ?>"><?php echo $category['description']; ?></textarea>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="<?php echo  trans('category.save') ; ?>" />
    </form>
<?php
view('admin.layouts.footer');
?>