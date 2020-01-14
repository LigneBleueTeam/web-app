@extends('layouts/blank')
@section('title', 'Liste des activités')

@section('content')

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Activités</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
        <a href="{{ route('addactivity') }}" target="_blank"><button type="button" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus-circle"></i> Ajouter une activité</button></a>
              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 170px;">Nom</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 119px;">Temps</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 114px;">Localisation</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Niveau</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Type</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Opérations</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                  <tr role="row" class="odd">
                    <td class="sorting_1"> {{ $activity->name }}</td>
                    <td><i class="fas fa-stopwatch"></i> {{ $activity->time }}</td>
                    <td><i class="fas fa-street-view"></i> {{ $activity->location }}</td>
                    <td>{{ $activity->level }}</td>
                    <td>{{ $activity->type }}</td>
                    <td>
                    <a href="/editactivity/{{ $activity->activityId }}"target="_blank">
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