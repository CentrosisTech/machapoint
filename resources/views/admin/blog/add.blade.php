@extends('admin.layouts.master-soyuz')
@section('title','Create a Blog post')
@section('body')

@component('admin.component.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Home') }}
@endslot

@slot('menu1')
{{ __("Front Settings") }}
@endslot

@slot('menu2')
{{ __("Blogs") }}
@endslot
@slot('button')
<div class="col-md-6">
  <div class="widgetbar">

  <a href="{{ url('admin/blog') }}" class="btn btn-primary-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i>Back</a>
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
          <h5 class="box-title">{{ __('Add') }} {{ __('Blog') }}</h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="{{url('admin/blog')}}"
            data-parsley-validate class="form-horizontal form-label-left">
            {{csrf_field()}}
            <div class="form-group">
              <label class="control-label" for="first-name">
                Heading <span class="required">*</span>
              </label>


              <input placeholder="Enter heading" type="text" id="first-name" name="heading" value="{{old('heading')}}"
                class="form-control col-md-12">



            </div>
            <div class="form-group">
              <label class="control-label" for="first-name"> Description <span class="required">*</span>
              </label>

              <textarea cols="2" id="editor1" name="des" rows="5">
              {{old('des')}}
             </textarea>
              <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(Please Enter
                Description)</small>


            </div>
            <div class="form-group">
              <label class="control-label" for="first-name"> Author Name <span class="required">*</span>
              </label>

              <input placeholder="Enter author name" type="text" id="first-name" name="user" value="{{old('user')}}"
                class="form-control col-md-12">




            </div>
            <div class="form-group">
              <label class="control-label" for="first-name"> About Author (optional)
              </label>

              <textarea placeholder="Write something about author" type="text" id="first-name" name="about"
                value="{{old('about')}}" class="form-control col-md-12"></textarea>



            </div>
            <div class="form-group">
              <label class="control-label" for="first-name"> Designation (optional)
              </label>

              <input placeholder="Author Designation eg. Admin, CEO" type="text" id="first-name" name="post"
                value="{{old('post')}}" class="form-control col-md-12">
              <p class="txt-desc">



            </div>
            <div class="form-group">
              <label class="control-label" for="first-name"> Image <span class="required">*</span>
              </label>
              <div class="input-group mb-3">

                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>


                <div class="custom-file">

                  <input type="file" name="image" class="inputfile inputfile-1"
                    aria-describedby="inputGroupFileAddon01" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>

              </div>
              <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(Choose Image for blog
                post)</small>

            </div>
            <div class="form-group">
              <label>
                Status:
              </label><br>
              <label class="switch">
                <input class="slider tgl tgl-skewed" type="checkbox" id="status" checked="checked">
                <span class="knob"></span>
              </label>
              <br>
              <input type="hidden" name="status" value="1" id="status3">
              <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(Choose status for your
                post)</small>

            </div>
            <div class="form-group">
              <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                Reset</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                Create</button>
            </div>

            <div class="clear-both"></div>
        </div>


        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection