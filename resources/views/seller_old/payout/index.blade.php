@extends('admin.layouts.sellermaster')
@section('title', 'Completed Payments')
@section('body')

@component('seller.components.breadcumb',['secondactive' => 'active'])
@slot('heading')
   {{ __('Completed Payments') }}
@endslot
@slot('menu1')
   {{ __('Completed Payments') }}
@endslot



@endcomponent

<div class="contentbar">
  @if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
                          
            
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title">{{ __('Completed Payments') }}</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-12">
              <div class="box box-default box-body">
                {!! $sellerpayouts->container() !!}
              </div> 
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title">{{ __('Received Payouts') }}</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
              <table id="completedPayouts" class="table table-striped table-bordered">
                 <thead>
                   <th>
                     #
                   </th>
                   <th>
                     Transfer TYPE
                   </th>
                   <th>
                     Order ID
                   </th>
                   <th>
                     Amount
                   </th>
                   <th>
                     Seller Details
                   </th>
                   <th>
                     Paid On
                   </th>
                   <th>
                     Action
                   </th>
                 </thead>
     
                 <tbody>
                   
                 </tbody>
              </table>
           </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</div>
				
		
			
        
            

                          
        
            
                  
               
  
  @endsection
                 
  @section('custom-script')
  <script src="{{ url('front/vendor/js/Chart.min.js') }}" charset="utf-8"></script>
   {!! $sellerpayouts->script() !!}
  <script>
    var url = {!! json_encode(url('/track/payput/status/')) !!};
    var sellerpayouturl = {!! json_encode( route('seller.payout.index') ) !!};
  </script>
  <script src="{{ url('js/seller/sellerpayout.js') }}"></script>
  @endsection
  
          
              
              
             