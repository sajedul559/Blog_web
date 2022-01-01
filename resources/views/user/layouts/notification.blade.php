@if (session('success'))
    <div class="alert alert-success alert-dismissable fade show">
      <button class="close" data-dismiss="alert" aria-label="Close">X</button>
      {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissable fade show">
      <button class="close" data-dismiss="alert" aria-label="Close">X</button>
      {{session('error')}}

    </div>
@endif