@hasanyrole('admin|editor')
   {{ __("Admins and editors section") }}
@else
   {{ __("Only admins can see this section") }}
@endhasanyrole
 
@can('admin users')
   {{ __("You can administer users!") }}
@endcan


{{-- This file  is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-user"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('visibility') }}"><i class="las la-eye"></i></i> Visibilities</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('posts') }}"><i class="nav-icon la la-question"></i> Posts</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('places') }}"><i class="nav-icon la la-question"></i> Places</a></li>
