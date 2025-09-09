<?php
view('admin.layouts.header', ['titel' => trans('admin.users')]);
// session_forget('old');

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ trans('admin.users') }} - {{ trans('user.create') }}</h2>
        <a class="btn btn-info" href="{{aurl('users')}}">{{ trans('user.users') }}</a>
    </div>
    @if(session_has('error_login'))
    <div class="alert alert-danger">
        {{ session_flash('error_login') }}
    </div>
    @endif
    @if(any_error())
    <div class="alert alert-danger">
        <ol>
            @foreach(all_errors() as $error)
            <li> <?php echo $error ?> </li>
            @endforeach
        </ol>
    </div>
    @endif
    @php
    $name = get_error('name');
    $email = get_error('email');
    $mobile = get_error('mobile');
    $user_type = get_error('user_type');
    end_errors();
    @endphp
    <form method="post" action="{{aurl('users/store')}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="post" />
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{trans('user.name')}}</label>
                    <input type="text" name="name" placeholder="{{trans('user.name')}}" class="form-control<?php echo !empty($name) ? ' is-invalid' : ''; ?>"
                        value="{{old('name')}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">{{trans('user.email')}}</label>
                    <input type="text" name="email" placeholder="{{trans('user.email')}}" class="form-control<?php echo !empty($email) ? ' is-invalid' : ''; ?>"
                        value="{{old('email')}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">{{trans('user.password')}}</label>
                    <input type="password" name="password" placeholder="{{trans('user.password')}}" class="form-control<?php echo !empty($password) ? ' is-invalid' : ''; ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mobile">{{trans('user.mobile')}}</label>
                    <input type="text" name="mobile" placeholder="{{trans('user.mobile')}}" class="form-control<?php echo !empty($mobile) ? ' is-invalid' : ''; ?>"
                        value="{{old('mobile')}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_type">{{trans('user.user_type')}}</label>
                    <select class="form-control<?php echo !empty($user_type) ? ' is-invalid' : ''; ?>" name="user_type">
                        <option disabled selected>{{ trans('admin.choose') }}</option>
                        <option value="admin" {{ (old('user_type') == 'admin') ? 'selected' : '' }}>{{ trans('user.admin') }}</option>
                        <option value="user" {{ (old('user_type') == 'user') ? 'selected' : '' }}>{{ trans('user.user') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="{{ trans('user.create') }}" />
    </form>
</main>
<?php
view('admin.layouts.footer');
?>