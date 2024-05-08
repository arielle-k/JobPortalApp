@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 my-4"></div>
    </div>
</div>
<div class="container">
    <div class="row my-2">
        <div class="col-md-12 my-3">
                    <h2 class="text-center bg-info text-uppercase">Mes candidatures</h2>
                    @if ($candidatures->isEmpty())
                        <p class="text-center fw-bold">Vous n'avez postulé à aucune offre d'emploi.</p>
                    @else
                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th cl><button class="">Title</button></th>
                                <th>Position</th>
                                <th>company</th>
                                <th>salaire</th>
                                <th>adresse</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                    <tbody>
                    @if(!empty($candidatures))
                    @foreach ($candidatures as  $candidature )
                    <tr>
                        <td>{{ $candidature->job->title }}</td>
                        <td>{{ $candidature->job->position }}</td>
                        <td>{{ $candidature->job->company->cname }}</td>
                        <td>{{ $candidature->job->salary }}</td>
                        <td>{{ $candidature->job->address }}</td>
                        <td><a href="{{ route('jobs.show',$candidature->job->id) }}">Voir </a></td>

                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                    </table>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
