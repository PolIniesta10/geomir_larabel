<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@hasanyrole('admin')
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-user"></i> Users</a></li>
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permisos</span></a></li>
@else
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('posts') }}"><i class="las la-upload"></i> Posts</a></li>
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('places') }}"><i class="las la-map-marked"></i> Places</a></li>
@endhasanyrole
 


{{-- This file  is used to store sidebar items, inside the Backpack admin panel --}}


<li class="nav-item"><a class="nav-link" href="{{ backpack_url('visibility') }}"><i class="nav-icon la la-question"></i> Visibilities</a></li>