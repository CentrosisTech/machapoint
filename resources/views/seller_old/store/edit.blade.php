@extends('admin.layouts.sellermaster')
@section('title', 'Edit Store - $store->name')
@section('body')

@component('seller.components.breadcumb',['secondactive' => 'active'])
@slot('heading')
   {{ __('Edit Store') }}
@endslot
@slot('menu1')
   {{ __('Edit Store') }}
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
          <h5 class="card-title"> {{__("Edit Store Details")}}</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('store.update',$store->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Store ID:
                      <a type="button"  data-container="body" data-toggle="popover" data-placement="top"  data-content="If you did not see store id hit update button to get it..">
                        <i class="fa fa-question-circle"></i>
                      </a> </label>
                   
                    <input disabled type="text" name="name" class="form-control" value="{{$store->uuid ?? 'NOT SET'}}">
                  </div>
                    
                  <div class="form-group col-md-6">
                    <label>Store Name: <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{$store->name ?? ''}}">
                  </div>
    
                  <div class="form-group col-md-6">
                    <label>Store Email: <span class="required">*</span></label>
                    <input type="text" name="email" class="form-control" value="{{$store->email ?? ''}}">
                  </div>
        
                    
                  <div class="form-group col-md-6">
                    <label for="">Phone:</label>
                    <input type="text" placeholder="Enter phone no." name="phone" class="form-control"
                    value="{{$store->phone ?? ''}}">
                  </div>
                
                  <div class="form-group col-md-6">
                    <label for="">Mobile:</label>
                    <input type="text" placeholder="Enter mobile no." name="mobile" class="form-control"
                    value="{{$store->mobile ?? ''}}">
                  </div>
                    
                  <div class="form-group col-md-6">
                    <label for="">VAT/GSTIN No:</label>
                    <input type="text" placeholder="Enter VAT or GSTIN no. of your store" name="vat_no" class="form-control"
                      value="{{$store->vat_no ?? ''}}">
                  </div>
                    
                  <div class="form-group col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Store Address: <span class="required">*</span></label>
                        <textarea class="form-control" name="address" placeholder="Enter store address" cols="10"
                          rows="2">{{ $store->address }}</textarea>
                      </div>
                      <div class="col-md-6">
                        
                          <label for="">Country: <span class="required">*</span></label>
                          <select data-placeholder="Please select country" name="country_id" id="country_id" class="form-control select2">
                            <option value="0">Please Choose</option>
                            @foreach($countries as $c)
                            
                            <option value="{{$c->id}}"
                              {{ $c->id == $store->country_id ? 'selected="selected"' : '' }}>
                              {{$c->nicename}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  
                    <div class="form-group col-md-6">
                      <label for="">State: <span class="required">*</span></label>
                        <select data-placeholder="Please select state" required name="state_id" id="upload_id" class="form-control select2">
                          <option value="0">Please choose</option>
                          @foreach($states as $c)
                          <option value="{{$c->id}}" {{ $c->id == $store->state_id ? 'selected="selected"' : '' }}>
                            {{$c->name}}
                          </option>
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-6">
                      <label for="">City: </label>
                      <select data-placeholder="Please select city" name="city_id" id="city_id" class="form-control select2">
                        <option value="">Please Choose</option>
                        @foreach($city as $c)
                        <option value="{{$c->id}}" {{ $c->id == $store->city_id ? 'selected="selected"' : '' }}>
                          {{$c->name}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                        
                    @if($pincodesystem == 1)
                    <div class="form-group col-md-3">
                      <label for="">Pincode: <span class="required">*</span></label>
                      <input type="text" value="{{ $store->pin_code }}" name="pin_code" placeholder="Enter pincode"
                        class="form-control">
                    </div>
                    @endif
                    
                    <div class="form-group col-md-6">
                      <label for="exampleInputSlug"> {{ __('Choose Store Logo:') }}</label><br>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" name="store_logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div>
                    </div>
                  
                  
                    <div class="form-group col-md-3">
                    
                      @if($store->status == 1)
                      <img src="{{asset('admin_new/assets/images/active.png')}}" alt="" class="image_store">
                      @else
                      <img src="{{asset('admin_new/assets/images/deactive.jpg')}}" alt="" class="image_store">
                      @endif
                    </div>
                    
                    
                    <div class="form-group col-md-12">
                        <button @if(env('DEMO_LOCK')==0) type="submit" @else title="This action is disabled in demo !" disabled="disabled"
                        @endif class="btn btn-md btn-primary"><i class="fa fa-check-circle"></i> Update Details </button>
                        <a href="#" class="btn btn-danger"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i>Request for delete !</a>
                        <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5  class="modal-title">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p class="text-muted">Do you really want to delete your store? This process cannot be undone. By clicking <b>YES</b> your all products,payouts, orders records will be deleted !</p>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      
                                      <form method="post" action="{{ route('req.for.delete.store',$store->id) }}" class="pull-right">
                                        {{csrf_field()}}
                                        {{method_field("DELETE")}}
                                      
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("No")}}</button>
                                        <button type="submit" class="btn btn-danger">{{ __("Yes")}}</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                  </div>
                  </div>
                  
                 
                    <div class="col-lg-4">
                      <div class="row">
                        <div class="card m-b-30 bg-primary-rgba shadow-sm mr-3 ">
                          <div class="card-body py-5 ">
                              <div class="row">
                                  <div class="col-lg-3 text-center">
                                    @php
                                  $image = @file_get_contents('../public/images/store/'.$store->store_logo);
                                  @endphp
                                  <img title="{{ $store->name }}"
                                    src="{{ $image ? url('images/store/'.$store->store_logo) : Avatar::create($store->name)->toBase64() }}"
                                    alt="Store logo" class="img-fluid mb-3" alt="user">
                                   
                                  </div>
                                  <div class="col-lg-9">
                                   <div class="row">
                                    <h4>{{ $store->name }}</h4>
                                    <p> <i class="feather icon-map-pin mr-2"></i>{{ $store->city['name'] }},
                                      {{ $store->state['name'] }}, {{ $store->country['nicename'] }}</p>
                                      @php
                                      $allorders = App\Order::all();
                              
                                      $sellerorder = collect();
                              
                                      foreach ($allorders as $key => $order) {
                              
                                        if(in_array(Auth::user()->id, $order->vender_ids)){
                                          $sellerorder->push($order);
                                        }
                              
                                      }
                                    @endphp
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="p-1 text-muted"><i class="feather icon-check-square"></i> Created On</th>
                                                    <td class="p-1">{{ date('d-M-Y',strtotime($store->created_at)) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="p-1 text-muted"><i class="feather icon-user-plus"></i> Owner</th>
                                                    <td class="p-1">{{ $store->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="p-1 text-muted"><i class="feather icon-truck"></i> Total Orders</th>
                                                    <td class="p-1">{{ count($sellerorder) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="p-1 text-muted"><i class="feather icon-shopping-cart"></i> Total Products</th>
                                                    <td class="p-1">{{ $store->products->count() }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="p-1 text-muted"><i class="feather icon-check"></i> Verified</th>
                                                    <td class="p-1"><i class="{{ $store->verified_store == '1' ? "feather icon-user-check" : "No" }}"></i> </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
    
                                
                                   </div>
                                      
    
                              </div>
                          </div>
                      </div>
                     
                      <div class="row ml-md-5">
                        @if($store->verified_store == 1)
                        <img src="{{asset('admin_new/assets/images/verified.jpg')}}" alt="" class="" >
                        @endif
                      </div>
                      
                     
                </div>
                  
                  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
                
                        
                      
                      
                        
                    
                  
                    
    
                  
          
                  
    
    
          
                  
    
    
                  
                  
                
    
                
                                      


          

            
          
              




            

            
            
            
  
                 
  
               
  
          
    
             
            

          


