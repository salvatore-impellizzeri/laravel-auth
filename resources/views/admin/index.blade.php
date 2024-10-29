@extends('layouts.app')

@section('main-content')

<table class="table table-hover">
    @foreach ($projects as $project)
        <div class="card mb-3">
            <img src="{{ $project->src }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $project->title }}
                </h5>
                <p class="card-text">
                    {{ $project->description }}
                </p>
                <p class="card-text">
                    <small class="text-body-secondary">
                        @if($project->visible==true)
                            Pubblicato
                        @else
                            Privato
                        @endif
                    </small>
                </p>
            </div>
        </div>
    @endforeach
        
      
    </tbody>
  </table>

@endsection