<?php
// echo request('lang');

if(in_array(request('lang'), ['ar','en'])) {
    // var_dump(request('lang'));
    set_locale(request('lang'));

}

redirect('tasks');