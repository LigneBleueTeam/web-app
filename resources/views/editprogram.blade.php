@extends('layouts/blank')
@section('title', 'Modifier un programme')

@section('content')

<div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

        <div class="row">
          <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
              <label>Nom</label>
              <input id="name" type="text" class="form-control" value="{{ $data->name }}">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Objectif</label>
              <select id="objective" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Niveau</label>
              <select id="level" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
            </div>
          </div>
        </div>

        <button id="add" type="button" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus"></i> Modifier</button>
        </div>
        <div id="alertdiv" class="alert alert-warning alert-dismissible" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Veuillez remplir tous les champs.</h5>
        </div>
        <div id="successdiv" class="su alert-success alert-dismissible" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Le programme a bien été créé.</h5>
        </div>
        
        <input hidden id="programId" type="text" class="form-control" value="{{ $data->programId }}">
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$("#add").click(function(){
  $("#alertdiv").hide();
  $("#successdiv").hide();


if($("#name").val() != ""){
  $.ajax({
      type: "POST",
      url: '/editingprogram',
      data: {
        "_token": "{{ csrf_token() }}",
        "level": $("#level").val(),
        "name": $("#name").val(),
        "objective": $("#objective").val(),
        "programId": $("#programId").val()
        },
        success: function(data) {
          if(data == 1){
            $("#successdiv").show();
          } else{
            $("#alertdiv").show();
          }
        
      }
  });
} else{
  $("#alertdiv").show();
}
     
});
</script>

@endsection
