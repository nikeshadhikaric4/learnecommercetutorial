@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Update Product  </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              {{-- <li><a class="dropdown-item" href="#">Settings 1</a>
              </li>
              <li><a class="dropdown-item" href="#">Settings 2</a>
              </li> --}}
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('customerDetail.update',$customerDetail->id)}}">
        @csrf
        @method('PUT')


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->f_name}}" name="f_name" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Last Name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->l_name}}" name="l_name" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Last Name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->company_name}}" name="company_name" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phone Number<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->phone}}" name="phone" required="required" class="form-control ">
            </div>
          </div>


          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="email" value="{{$customerDetail->email}}" name="email" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Country<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->country}}" name="country" required="required" class="form-control ">
            </div>
          </div>



          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="address1" required="required" class="form-control" name="address1" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
                    {{$customerDetail->address1}}
                </textarea>


            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 2<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="address2" required="required" class="form-control" name="address2" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
                    {{$customerDetail->address2}}
                </textarea>


            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Town<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->town}}" name="town" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Destrict<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->district}}" name="district" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Postal Code<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="{{$customerDetail->post_code}}" name="post_code" required="required" class="form-control ">
            </div>
          </div>


          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Other Notes<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <textarea id="other_notes" required="required" class="form-control" name="other_notes" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
                    {{$customerDetail->other_notes}}
                </textarea>


            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection

