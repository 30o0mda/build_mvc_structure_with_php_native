<?php
view('admin.layouts.header', ['titel' => trans('admin.categories')]);
$categories = db_paginate('categories', "", 20);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ trans('admin.categories') }}</h2>
        <a class="btn btn-primary" href="{{aurl('categories/create')}}">{{ trans('category.create') }}</a>
    </div>
    <div
        class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('category.name') }}</th>
                    <th scope="col">{{ trans('category.icon') }}</th>
                    <th scope="col">{{ trans('category.description') }}</th>
                    <th scope="col">{{ trans('category.action') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($category = mysqli_fetch_assoc($categories['query'])): ?>
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>
                            <img src="{{storeg_url($category['icon'])}}" style="width:60px;height:35px;"/>

                        </td>
                        <td>{{ $category['description'] }}</td>
                        <td>
                            
                            <a href="{{aurl('categories/show?id='.$category['id'])}}"><i class="fa-regular fa-eye"></i></a>
                            <a href="{{aurl('categories/edit?id='.$category['id'])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>
<?php
view('admin.layouts.footer');
?>