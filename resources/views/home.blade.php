@extends('layouts/blank')
@section('title', 'Accueil')

@section('content')

<div class="card">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $data['countprograms'] }}</h3>

          <p>Programmes</p>
        </div>
        <div class="icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <a href="{{ route('programs') }}" class="small-box-footer">Liste des programmes <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $data['countactivities'] }}</h3>
          <p>Activités</p>
        </div>
        <div class="icon">
          <i class="fas fa-snowboarding"></i>
        </div>
        <a href="{{ route('activities') }}" class="small-box-footer">Liste des activités <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $data['countusers'] }}</h3>

          <p>Utilisateurs inscrits</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('users') }}" class="small-box-footer">Liste des utilisateurs <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>-</h3>

          <p>-</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Utilisateurs récents</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>Nom complet</th>
                <th>Type</th>
                <th>Taille</th>
                <th>Poids</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>{{ $data['lastuser1']->firstName }} {{ $data['lastuser1']->lastName }}</td>
                <td>
                  @if($data['lastuser1']->typeUser == "Kid")
                  <i class="fas fa-child"></i> {{ $data['lastuser1']->typeUser }}
                  @endif
                  @if($data['lastuser1']->typeUser == "Adult")
                  <i class="fas fa-male"></i> {{ $data['lastuser1']->typeUser }}
                  @endif
                </td>
                <td>
                <div class="progress-bar progress-bar-danger" style="width: {{ $data['lastuser1']->height-130 }}%"></div>
                        </div>
                      {{ $data['lastuser1']->height }} cm
                </td>
                <td>
                     @if($data['lastuser1']->weight > 95)
                      <span class="badge bg-danger">{{ $data['lastuser1']->weight }} kg</span>
                      @elseif($data['lastuser1']->weight > 85)
                      <span class="badge bg-warning">{{ $data['lastuser1']->weight }} kg</span>
                      @elseif($data['lastuser1']->weight > 75)
                      <span class="badge bg-primary">{{ $data['lastuser1']->weight }} kg</span>
                      @elseif($data['lastuser1']->weight > 65)
                      <span class="badge bg-success">{{ $data['lastuser1']->weight }} kg</span>
                      @elseif($data['lastuser1']->weight < 65)
                      <span class="badge bg-secondary">{{ $data['lastuser1']->weight }} kg</span>
                      @endif
                </td>
              </tr>
              <tr>
                <td>{{ $data['lastuser2']->firstName }} {{ $data['lastuser2']->lastName }}</td>
                <td>
                  @if($data['lastuser2']->typeUser == "Kid")
                  <i class="fas fa-child"></i> {{ $data['lastuser2']->typeUser }}
                  @endif
                  @if($data['lastuser2']->typeUser == "Adult")
                  <i class="fas fa-male"></i> {{ $data['lastuser2']->typeUser }}
                  @endif
                </td>
                <td>
                <div class="progress-bar progress-bar-danger" style="width: {{ $data['lastuser2']->height-130 }}%"></div>
                        </div>
                      {{ $data['lastuser2']->height }} cm
                </td>
                <td>
                     @if($data['lastuser2']->weight > 95)
                      <span class="badge bg-danger">{{ $data['lastuser2']->weight }} kg</span>
                      @elseif($data['lastuser2']->weight > 85)
                      <span class="badge bg-warning">{{ $data['lastuser2']->weight }} kg</span>
                      @elseif($data['lastuser2']->weight > 75)
                      <span class="badge bg-primary">{{ $data['lastuser2']->weight }} kg</span>
                      @elseif($data['lastuser2']->weight > 65)
                      <span class="badge bg-success">{{ $data['lastuser2']->weight }} kg</span>
                      @elseif($data['lastuser2']->weight < 65)
                      <span class="badge bg-secondary">{{ $data['lastuser2']->weight }} kg</span>
                      @endif
                </td>
              </tr>
              <tr>
                <td>{{ $data['lastuser3']->firstName }} {{ $data['lastuser3']->lastName }}</td>
                <td>
                  @if($data['lastuser3']->typeUser == "Kid")
                  <i class="fas fa-child"></i> {{ $data['lastuser3']->typeUser }}
                  @endif
                  @if($data['lastuser3']->typeUser == "Adult")
                  <i class="fas fa-male"></i> {{ $data['lastuser3']->typeUser }}
                  @endif
                </td>
                <td>
                <div class="progress-bar progress-bar-danger" style="width: {{ $data['lastuser3']->height-130 }}%"></div>
                        </div>
                      {{ $data['lastuser3']->height }} cm
                </td>
                <td>
                     @if($data['lastuser3']->weight > 95)
                      <span class="badge bg-danger">{{ $data['lastuser3']->weight }} kg</span>
                      @elseif($data['lastuser3']->weight > 85)
                      <span class="badge bg-warning">{{ $data['lastuser3']->weight }} kg</span>
                      @elseif($data['lastuser3']->weight > 75)
                      <span class="badge bg-primary">{{ $data['lastuser3']->weight }} kg</span>
                      @elseif($data['lastuser3']->weight > 65)
                      <span class="badge bg-success">{{ $data['lastuser3']->weight }} kg</span>
                      @elseif($data['lastuser3']->weight < 65)
                      <span class="badge bg-secondary">{{ $data['lastuser3']->weight }} kg</span>
                      @endif
                </td>
              </tr>
              <tr>
                <td>{{ $data['lastuser4']->firstName }} {{ $data['lastuser4']->lastName }}</td>
                <td>
                  @if($data['lastuser4']->typeUser == "Kid")
                  <i class="fas fa-child"></i> {{ $data['lastuser4']->typeUser }}
                  @endif
                  @if($data['lastuser4']->typeUser == "Adult")
                  <i class="fas fa-male"></i> {{ $data['lastuser4']->typeUser }}
                  @endif
                </td>
                <td>
                <div class="progress-bar progress-bar-danger" style="width: {{ $data['lastuser4']->height-130 }}%"></div>
                        </div>
                      {{ $data['lastuser4']->height }} cm
                </td>
                <td>
                     @if($data['lastuser4']->weight > 95)
                      <span class="badge bg-danger">{{ $data['lastuser4']->weight }} kg</span>
                      @elseif($data['lastuser4']->weight > 85)
                      <span class="badge bg-warning">{{ $data['lastuser4']->weight }} kg</span>
                      @elseif($data['lastuser4']->weight > 75)
                      <span class="badge bg-primary">{{ $data['lastuser4']->weight }} kg</span>
                      @elseif($data['lastuser4']->weight > 65)
                      <span class="badge bg-success">{{ $data['lastuser4']->weight }} kg</span>
                      @elseif($data['lastuser4']->weight < 65)
                      <span class="badge bg-secondary">{{ $data['lastuser4']->weight }} kg</span>
                      @endif
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{ route('users') }}" class="btn btn-sm btn-secondary float-right">Liste des utilisateurs</a>
        </div>
        <!-- /.card-footer -->
      </div>
    </div>
  </div>
</div>
    
@endsection