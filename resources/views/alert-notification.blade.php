@if ($notification = Session::get('success'))
<div class="alert alert-success alert-dismissible mx-5">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>{{ $notification }}</strong>
  </div>
@endif
@if ($notification = Session::get('error'))
<div class="alert alert-danger alert-dismissible mx-5">
   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>   
        <strong>{{ $notification }}</strong>
</div>
@endif
@if ($notification = Session::get('warning'))
<div class="alert alert-warning alert-dismissible mx-5">
   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>   
   <strong>{{ $notification }}</strong>
</div>
@endif
@if ($notification = Session::get('info'))
<div class="alert alert-info alert-dismissible mx-5">
   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>   
   <strong>{{ $notification }}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger mx-5">
   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>   
   Please check the form under for errors
</div>
@endif