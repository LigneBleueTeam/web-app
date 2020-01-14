@extends('layouts/blank')
@section('title', 'Modifier un utilisateur')

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
              <label>Prénom</label>
              <input id="firstName" type="text" class="form-control" value="{{ $data->firstName }}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nom</label>
              <input id="lastName" type="text" class="form-control" value="{{ $data->lastName }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Adresse mail</label>
              <input id="email" type="text" class="form-control" value="{{ $data->email }}">
            </div>
          </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Type</label>
            <select id="typeUser" class="form-control">
              <option>Enfant</option>
              @if($data->typeUser == "Adult")
              <option selected>Adulte</option>
              @else
              <option>Adulte</option>
              @endif
            </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Taille</label>
              <input id="height" type="text" class="form-control"  value="{{ $data->height }}">
            </div>
          </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Poids</label>
            <input id="weight" type="text" class="form-control"  value="{{ $data->weight }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Numéro de téléphone</label>
              <input id="phoneNumber" type="text" class="form-control" value="{{ $data->phoneNumber }}">
            </div>
          </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Role</label></br>
            <input id="user" type="checkbox" checked> Utilisateur
            <input id="admin" type="checkbox"> Admin
            </div>
          </div>
        </div>
        <button id="add" type="button" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-user-plus"></i> Modifier</button>
        </div>

        <div id="successdiv" class="alert alert-success alert-dismissible" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> L'utilisateur a bien été modifié.
        </div>
        <div id="alertdiv" class="alert alert-warning alert-dismissible" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Veuillez remplir tous les champs.</h5>
        </div>
        
        <input hidden id="userId" type="text" class="form-control" value="{{ $data->userId }}">
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$("#add").click(function(){
  $("#alertdiv").hide();
  $("#successdiv").hide();
// typeUser
var typeUser;
if($("#typeUser").val() == "Enfant"){
  typeUser = "Kid";
}
if($("#typeUser").val() == "Adulte"){
  typeUser = "Adult";
}
var typeuser;
var roles;
if($("#user").is(':checked') == true || $("#admin").is(':checked') == true){
  typeuser = true;
}
if($("#user").is(':checked') == true && $("#admin").is(':checked') == true){
  roles=[
    { id: 1 , role: "USER" },
    { id: 2 , role: "ADMIN" }
    ];
}
if($("#user").is(':checked') == true && $("#admin").is(':checked') == false){
  roles=[
    { id: 1 , role: "USER" }
    ];
}
if($("#user").is(':checked') == false && $("#admin").is(':checked') == true){
  roles=[
    { id: 2 , role: "ADMIN" }
    ];
}
if($("#firstName").val() != "" && $("#lastName").val() != "" && $("#email").val() != "" && $("#height").val() != "" && $("#weight").val() != "" && $("#phoneNumber").val() != "" && typeuser == true){
  $.ajax({
      type: "POST",
      url: '/editinguser',
      data: {
        "_token": "{{ csrf_token() }}",
        "userId": $("#userId").val(),
        "firstName": $("#firstName").val(),
        "lastName": $("#lastName").val(),
        "email": $("#email").val(),
        "typeUser": typeUser,
        "height": $("#height").val(),
        "weight": $("#weight").val(),
        "phoneNumber": $("#phoneNumber").val(),
        "roles": roles
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
