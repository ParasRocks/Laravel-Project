<div class="col-md-12">
@if(count($errors) > 0)

  <div class="alert alert-danger">

        <ul class="list-grou">
            @foreach($errors->all() as $error)

                <li><h4>{{$error}}</h4></li>

            @endforeach

        </ul>

  </div>

@endif
<div>
