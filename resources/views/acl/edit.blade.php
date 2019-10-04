@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="{{ route('update.permissions') }}" method="post" id="roleForm">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}" >
<h1>{{__('acl.title')}}</h1>

<div class="row my-2">
    <div class="col">
            <a class="btn btn-secondary mr-2 float-left" href="{{ route('admin.acl') }}"><i class="fas fa-chevron-left"></i> {{__('general.return')}}</a>
            <button class="btn btn-success float-right" type="submit">
              {{ __('general.save') }}
         </button>
          </div>
  </div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
  <div class="col">       
        <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                  <h4 class="card-title">{{ __('general.username').': '. $user->name }}</h4>
                  @if(!empty($user->first_name))
                     <h5 class="text-capitalize ">{{ $user->first_name.' '.$user->last_name}}</h5>
                  @endif
              </div>  
                <P>
                  {{ __('acl.assign_user_roles_text') }}
                <p>        
            </div>
        </div>
      </div>
</div>

<div class="row">
<div class="accordion col mt-3" id="accordionExample">
<div class="card">
<div class="card-header" id="headingOne">
<h2 class="mb-0">
<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-user-tie"></i> {{ __('acl.roles') }}
</button>
</h2>
</div>

<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
<div class="card-body grid-permissions">
    @if(!empty($roles))
    @foreach ($roles as $role)
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="roles[{{ $role->name }}]" value={{ $role->name }} id="role{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
        <label class="custom-control-label" for="role{{ $role->id }}">{{ $role->name }}</label>
      </div>
    @endforeach
    @endif
</div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingTwo">
<h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
    <i class="fas fa-key"></i> {{ __('acl.permissions') }}
</button>
</h2>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
<div class="card-body grid-permissions">
    @if(!empty($permissions))
    @foreach ($permissions as $permission)
      <div class="custom-control custom-checkbox permssion-label-container">
        <input 
          type="checkbox"
          class="custom-control-input" 
          name="permissions[{{ $permission->name }}]" 
          value={{ $permission->name }} 
          id="permission{{ $permission->id }}" 
          {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}
          {{ $rPermissions->contains('name',$permission->name) ? 'disabled' : '' }}
          >
          
            <label class="custom-control-label"  for="permission{{ $permission->id }}">{{ $permission->name }}</label>
            <small class="text-muted">{{ $rPermissions->contains('name',$permission->name) ? '('.__('acl.permissionByRole').')' : '' }}</small>
          
      </div>
    @endforeach
    @endif
</div>
</div>
</div>
</div>
</div> 
</form>
</div>
@endsection