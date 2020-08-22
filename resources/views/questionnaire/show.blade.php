@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          
          <div class="card-header">{{ $questionnaire->title }}</div>
            <div class="card-body">
              <a class="btn btn-dark" href="/questionnaires/{{ $questionnaire->id }}/questions/create">Ajouter une question</a>
              <a class="btn btn-dark" href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">Participez au sondage</a>
            </div>
          </div>

          <!-- pour chaque questions, affiche une carte + les choix de réponses -->
          @foreach($questionnaire->questions as $question)
            <div class="card mt-4">
              <div class="card-header">{{ $question->question }}</div>

                <div class="card-body">
                  <ul class="list-group">
                    <!-- choix de réponse -->
                    @foreach($question->answers as $answer)
                      <li class="list-group-item d-flex justify-content-between">
                        <div>{{ $answer->answer }}</div>
                        {{-- @if($question->responses->count())
                          <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                        @endif --}}
                      </li>
                    @endforeach
                  </ul>
                </div>

                <div class="card-footer">
                  <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="post">
                    @method('DELETE') <!-- bouton - supprime la question -->
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                  </form>
                </div>

            </div>
          @endforeach
      </div>
    </div>
  </div>
@endsection