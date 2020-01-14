@extends('layouts/blank')
@section('title', 'Liste des utilisateurs')

@section('content')

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Utilisateurs</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
        <a href="{{ route('adduser') }}" target="_blank"><button type="button" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-user-plus"></i> Ajouter un utilisateur</button></a>
              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 170px;">Nom complet</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 119px;">Adresse email</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 114px;">Type</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Taille</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Poids</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Numéro de téléphone</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 150px;">Role</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Opérations</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr role="row" class="odd">
                    <td class="sorting_1"> {{ $user->firstName }} {{ $user->lastName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if($user->typeUser == "Kid")
                      <i class="fas fa-child"></i> {{ $user->typeUser }}
                      @endif
                      @if($user->typeUser == "Adult")
                      <i class="fas fa-male"></i> {{ $user->typeUser }}
                      @endif
                    </td>
                    <td>
                    <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: {{ $user->height-130 }}%"></div>
                        </div>
                      {{ $user->height }} cm
                    </td>
                    <td>
                      @if($user->weight > 95)
                      <span class="badge bg-danger">{{ $user->weight }} kg</span>
                      @elseif($user->weight > 85)
                      <span class="badge bg-warning">{{ $user->weight }} kg</span>
                      @elseif($user->weight > 75)
                      <span class="badge bg-primary">{{ $user->weight }} kg</span>
                      @elseif($user->weight > 65)
                      <span class="badge bg-success">{{ $user->weight }} kg</span>
                      @elseif($user->weight < 65)
                      <span class="badge bg-secondary">{{ $user->weight }} kg</span>
                      @endif
                    </td>
                    <td>{{ $user->phoneNumber }}</td>
                    <td>@foreach($user->roles as $roles)
                          @if($roles->id == 1)
                          <i class="fas fa-user"></i> Utilisateur </br>
                          @elseif($roles->id == 2)
                          <i class="fas fa-user-cog"></i> Admin </br>
                          @endif
                        @endforeach
                    </td>
                    <td>
                    <a href="/edituser/{{ $user->userId }}"target="_blank">
                    <button type="button" class="btn btn-block btn-outline-primary btn-sm"><i class="fas fa-edit"></i>Modifier</button>
                    </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table></div></div>
            </div>
            <!-- /.card-body -->




        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        <!-- /.card-footer-->
      </div>
    

@endsection