@extends('layouts/blank')
@section('title', 'Liste des programmes')

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
        
        <a href="{{ route('addprogram') }}" target="_blank"><button type="button" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus-circle"></i> Ajouter un programme</button></a>
              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 170px;">Nom</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 114px;">Objective</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Niveau</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101px;">Opérations</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($programs as $program)
                  <tr role="row" class="odd">
                    <td class="sorting_1"> {{ $program->name }}</td>
                    <td>{{ $program->objective }}</td>
                    <td>{{ $program->level }}</td>
                    <td>
                    <a href="/editprogram/{{ $program->programId }}"target="_blank">
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