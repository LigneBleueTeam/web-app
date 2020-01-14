@extends('layouts/blank')
@section('title', 'Ajouter une activité')

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
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nom</label>
              <input id="name" type="text" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Temps</label>
              <input id="time" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
              <label>Location</label>
              <select id="location" class="form-control">
              <option>Zone 1</option>
              <option>Zone 2</option>
              <option>Zone 3</option>
              <option>Zone 4</option>
              <option>Zone 5</option>
              <option>Zone 6</option>
            </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Type</label>
              <select id="type" class="form-control">
                <option>Type 1</option>
                <option>Type 2</option>
                <option>Type 3</option>
                <option>Type 4</option>
                <option>Type 5</option>
                <option>Type 6</option>
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

        <button id="add" type="button" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus"></i> Ajouter</button>
        </div>
        <div id="alertdiv" class="alert alert-warning alert-dismissible" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Veuillez remplir tous les champs.</h5>
        </div>
        <div id="successdiv" class="su alert-success alert-dismissible" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> L'activité a bien été créée.</h5>
        </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$("#add").click(function(){
  $("#alertdiv").hide();
  $("#successdiv").hide();


if($("#name").val() != "" && $("#time").val() != ""){
  $.ajax({
      type: "POST",
      url: '/addingactivity',
      data: {
        "_token": "{{ csrf_token() }}",
        "level": $("#level").val(),
        "location": $("#location").val(),
        "name": $("#name").val(),
        "time": $("#time").val(),
        "type": $("#type").val()
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
