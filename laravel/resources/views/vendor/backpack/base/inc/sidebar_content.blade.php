{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-user"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('visibility') }}"><i class="las la-eye"></i></i> Visibilities</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('posts') }}"><i class="nav-icon la la-question"></i> Posts</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('places') }}"><i class="nav-icon la la-question"></i> Places</a></li>