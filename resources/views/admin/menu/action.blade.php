<div class="dropdown">
  <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
    @can('menu.edit')
      <a class="dropdown-item" href="{{ route('menu.edit',$id) }}"><i class="feather icon-edit mr-2"></i>Edit</a>
      @endcan
      @can('menu.delete')
      
        <a class="dropdown-item btn btn-link"  @if(env('DEMO_LOCK') == 0) data-toggle="modal" href="#{{ $id }}topmenu" @else disabled title="This action is disabled in demo !" @endif>
          <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>

     
    @endcan
     
  </div>
</div>
@can('menu.delete')
<div id="{{ $id }}topmenu" class="delete-modal modal fade" role="dialog">
      <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="delete-icon"></div>
          </div>
          <div class="modal-body text-center">
            <h4 class="modal-heading">Are You Sure ?</h4>
            <p>Do you really want to delete this menu ? This process cannot be undone.</p>
          </div>
          <div class="modal-footer">
           <form method="post" action="{{ route('menu.destroy',$id) }}" class="pull-right">
                      {{csrf_field()}}
                      @method('delete')
              
              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger">Yes</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  @endcan
