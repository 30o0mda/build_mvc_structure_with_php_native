<?php
view('admin.layouts.header', ['titel' => trans('admin.categories')]);
?>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ trans('admin.categories') }} - {{ trans('category.create') }}</h2>
        <a class="btn btn-info" href="{{aurl('categories')}}">{{ trans('category.categories') }}</a>
    </div>
    <form method="post" action="{{aurl('categories/store')}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post" />
        <div class="row">
            <div class="col-md-6">
                <div clase="from-group">
                    <label for="name">{{trans('category.name')}}</label>
                    <input type="text" name="name" placeholder="{{trans('category.name')}}" class="form-control<?php echo !empty(get_error('name')) ? ' is-invalid' : ''; ?>"
                        value="{{old('name')}}"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="icon">{{trans('category.icon')}}</label>
                    <input type="file" name="icon" placeholder="{{trans('category.icon')}}" class="form-control<?php echo !empty(get_error('icon')) ? ' is-invalid' : ''; ?>" />
                </div>
            </div>
            <div class="col-md-24">
                <div class="form-group">
                    <label for="description">{{trans('category.description')}}</label>
                    <textarea name="description" placeholder="{{trans('category.description')}}" class="form-control<?php echo !empty(get_error('description')) ? ' is-invalid' : ''; ?>">{{old('description')}}</textarea>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="{{ trans('category.create') }}"/>
    </form>
<?php
view('admin.layouts.footer');
?>