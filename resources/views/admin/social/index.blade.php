@extends('admin.layouts.master-soyuz')
@section('title','Footer Social Icon Setting')
@section('body')
@component('admin.component.breadcumb',['secondactive' => 'active'])
@slot('heading')
{{ __('Social Icon Setting') }}
@endslot
@slot('menu1')
{{ __("Social Icon") }}
@endslot​
@slot('button')
<div class="col-md-6">
  <div class="widgetbar">
  <a href="{{url('admin/social/create')}}" class=" btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __('Add Social Icon') }}</a>
  </div>
</div>
@endslot
@endcomponent
<div class="contentbar">
  <div class="row">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      @foreach($errors->all() as $error)
      <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach
    </div>
    @endif
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{ __('Social Icon Setting') }}</h5>
        </div>
        <div class="card-body">
         <!-- main content start -->
         <div class="table-responsive">
           <table id="datatable-buttons" class="table table-striped table-bordered">
             <thead>
               <th>{{ __('ID') }}</th>
               <th>{{ __('Url') }}</th>
               <th>{{ __('Icon') }}</th>
               <th>{{ __('Status') }}</th>
               <th>{{ __('Action') }}</th>
             </thead>
             <tbody>
             <?php $i=1; ?>
               @foreach($socials as $social)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$social->url}}</td>
                  <td>
                  {{ ucfirst($social->icon) }}
                  </td> 
                  <td>
                    <form action="{{ route('social.quick.update',$social->id) }}" method="POST">
                     {{csrf_field()}}
                     <button @if(env('DEMO_LOCK') == 0) type="submit" @else disabled="" title="This action cannot be done in demo !" @endif class="btn btn-rounded {{ $social->status == 1 ? 'btn-success-rgba' : 'btn-danger-rgba' }}">
                       {{ $social->status ==1 ? 'Active' : 'Deactive' }}
                     </button>
                     </form>
                  </td>
                  <td>
                    <div class="dropdown">
                       <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                       <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                           <a class="dropdown-item" href="{{url('admin/social/'.$social->id.'/edit')}}"><i class="feather icon-edit mr-2"></i>Edit</a>
                           <a @if(env('DEMO_LOCK') == 0) data-toggle="modal" data-target="#delete{{ $social->id }}" @else dis title="This action is disabled in demo !" @endif class="dropdown-item btn btn-link"><i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>
                       </div>
                    </div>
                   <!-- delete Modal start -->
                    <div id="delete{{ $social->id }}" class="delete-modal modal fade" role="dialog">
                       <div class="modal-dialog modal-sm">
                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <div class="delete-icon"></div>
                           </div>
                           <div class="modal-body text-center">
                             <h4 class="modal-heading">Are You Sure ?</h4>
                             <p>Do you really want to delete this Icon? This process cannot be undone.</p>
                           </div>
                           <div class="modal-footer">
                             <form method="post" action="{{url('admin/social/'.$social->id)}}" class="pull-right">
                                         {{csrf_field()}}
                                         {{method_field("DELETE")}}
                                       
                               <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                               <button type="submit" class="btn btn-danger">Yes</button>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                </table>                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                
 ​
                       
​
                            
        
@endsection
