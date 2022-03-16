<div class="dropdown">
  <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
    @can('brand.edit')
      <a class="dropdown-item" title="Edit Brand {{ $name }}" href="{{url('admin/brand/'.$id.'/edit')}}"><i class="feather icon-edit mr-2"></i>Edit</a>
      @endcan

      @can('brand.delete')
      
    <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete{{ $id }}">
      <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>
  </a>
  @endcan
  </div>
</div>