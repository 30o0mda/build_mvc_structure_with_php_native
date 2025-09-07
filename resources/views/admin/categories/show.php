<?php
view('admin.layouts.header', ['titel' => trans('admin.categories').' - '.trans('category.show')]);
$category = db_find('categories', request('id'));
redirect_if(empty($category), aurl('categories'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ trans('admin.categories') }} - {{ trans('category.show') }} : {{$category['name']}}</h2>
        <a class="btn btn-info" href="{{aurl('categories')}}">{{ trans('category.categories') }}</a>
    </div>



    <div class="row">
        <div class="col-md-6">
            <div clase="from-group">
                <label for="name">{{trans('category.name')}}</label>
                : {{$category['name']}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="icon">{{trans('category.icon')}} : </label>
                {{image(storage_url($category['icon']))}}

                
            </div>
        </div>
        <div class="col-md-24">
            <div clase="from-group">
                <label for="description">{{trans('category.description')}}</label>
                : {{$category['description']}}
            </div>
        </div>
    </div>
</main>
<?php
view('admin.layouts.footer');
?>