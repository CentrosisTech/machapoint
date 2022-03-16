@extends('admin.layouts.sellermaster')
@section('title', 'Edit Profile')
@section('body')

@component('seller.components.breadcumb',['secondactive' => 'active'])
@slot('heading')
   {{ __('Edit Profile') }}
@endslot
@slot('menu1')
   {{ __('Edit Profile') }}
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
    <div class="col-lg-9">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-title">{{ __('Edit Profile') }}</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="">Name : <span class="required">*</span></label>
            <input placeholder="Please enter name" type="text" name="name" value="{{auth()->user()->name}}"
              class="form-control">
              
            </div>
          
            <div class="form-group col-md-6">
              <label>Buisness Email : <span class="required">*</span></label>
            <input placeholder="Please enter email" type="text" name="email" value="{{auth()->user()->email}} "
              class="form-control">
            </div>
        
            <div class="form-group col-md-6">
              <label for="">Phone :</label>
            <input placeholder="Please Enter phone no." type="text" name="phone" value="{{auth()->user()->phone}}"
              class="form-control">
            </div>
          
            <div class="form-group col-md-6">
              <label>
                Mobile : <span class="required">*</span>
              </label>
  
              <div class="row no-gutter">
                <div class="col-md-12">
                  <div class="input-group">
  
                    <input required pattern="[0-9]+" title="Invalid mobile no." placeholder="1" type="text"
                      name="phonecode" value="{{auth()->user()->phonecode}}" class="col-md-2 form-control">
                      <input required pattern="[0-9]+" title="Invalid mobile no." placeholder="Please enter mobile no."
                      type="text" name="mobile" value="{{auth()->user()->mobile}}" class="col-md-10 form-control">
                  </div>
                </div>
              </div>
            </div>
            
           
            
            
            <div class="form-group col-md-4">
              <label>Country : <span class="required">*</span></label>
              <select data-placeholder="Please select country" class="form-control select2" name="country_id"
              id="country_id">
              <option value="">Please Choose</option>
              @foreach($country as $c)

              <option value="{{$c->id}}" {{ $c->id == auth()->user()->country_id ? 'selected="selected"' : '' }}>
                {{$c->nicename}}
              </option>
              @endforeach
              </select>
            </div>
            
            <div class="form-group col-md-4">
              <label>State : <span class="required">*</span></label>
              <select data-placeholder="Please select state" required name="state_id" class="form-control select2"
                id="upload_id">
                <option value="">Please choose</option>
                @foreach($states as $c)
                <option value="{{$c->id}}" {{ $c->id == auth()->user()->state_id ? 'selected="selected"' : '' }}>
                  {{$c->name}}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="">City :</label>
              <select data-placeholder="Please select city" name="city_id" id="city_id" class="form-control select2">
                <option value="">Please Choose</option>
                @foreach($citys as $key=>$c)
  
                <option value="{{ $key }}" {{ $key == auth()->user()->city_id ? 'selected' : '' }}>
                  {{$c}}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-8">
              <label for="exampleInputSlug"> {{ __('Choose Profile picture :') }}<sup class="redstar text-danger">*</sup></label><br>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div> 
            <div class="form-group col-md-12">
              <label class="check">
                <input type="checkbox" name="update_password" value="test">
                <span class="checkmark"></span>
                Want To Update password
              </label>
            </div>
            
            <div class="form-group col-md-6">
              <label for="">Password : <span class="required">*</span></label>
                <div class="input-group">
                  <input name="password" type="password" class="form-control" placeholder="Enter new password">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-eye"></i></span>
                  </div>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label for="">Confirm Password : <span class="required">*</span></label>
                  <div class="input-group">
                   
                    <input placeholder="Enter password again to confirm" type="password" name="password_confirmation"
                      class="form-control">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-eye"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
                <button @if(env('DEMO_LOCK')==0) type="submit" @else title="This action is disabled in demo !"
                disabled="disabled" @endif class="btn btn-primary"><i class="fa fa-check-circle"></i> {{ __("Update")}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  
      <div class="col-lg-3">
        <div class="card m-b-30">
          <div class="user-slider">
            <div class="user-slider-item">
                <div class="card-body text-center">
                  <span>
                    @if(Auth::user()->image !="")
                    <img id="preview1" src="{{url('images/user/'.Auth::user()->image)}}" class="img-circle" alt="User Image">
                    @else
                    <img id="preview1" class="img-circle" title="{{ Auth::user()->name }}"
                      src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                    @endif
                  </span>
                    <h5 class="mt-2">{{ Auth::user()->name }}</h5>
                    <p>{{ Auth::user()->store->name }}</p>
                    <p> <i class="feather icon-map-pin"></i> @if(auth()->user()->country)
                      {{ auth()->user()->city ?  auth()->user()->city->name.', ' : '' }} 
                      {{ auth()->user()->state ?  auth()->user()->state->name.', ' : '' }} 
                      {{ auth()->user()->country->nicename }}
                    @else 
                      {{__("Location not updated")}}
                    @endif</p>

                    <p><span class="badge badge-primary-inverse">Seller</span></p>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-6 border-right">
                            <h5>{{ count(Auth::user()->products) }}</h5>
                            <p class="my-2">TOTAL PRODUCTS</p>
                        </div>
                        <div class="col-6">
                            <h5>{{ Auth::user()->purchaseorder->count() }}</h5>
                            <p class="my-2">TOTAL PURCHASE</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
                  
               
  
  @endsection
                 
  
               
  
          
              
              
             
              
             
            
                
              
    
                 
                

                
    
            
            
    
             
            
          





                                
 


