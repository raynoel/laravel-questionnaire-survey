@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h1>{{ $questionnaire->title }}</h1>

      <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
        @csrf

        <!-- Affiche chaque questions et le choix de réponses -->
        @foreach($questionnaire->questions as $key => $question)
          <div class="card mt-4">
            <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>

            <div class="card-body">

                @error('responses.' . $key . '.answer_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror

                <!-- Boutons radio pour les choix de réponses --> 
                <ul class="list-group">
                  @foreach($question->answers as $answer)
                    <label for="answer{{ $answer->id }}"> <!-- permet de cliquer n'importe où dans la boite --> 
                      <li class="list-group-item">
                        <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}"
                          {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                          class="mr-2" value="{{ $answer->id }}">
                        {{ $answer->answer }}

                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                      </li>
                    </label>
                  @endforeach
                </ul>
            </div>
          </div>
        @endforeach

        <!-- Nom / Email / bouton soumission -->
        <div class="card mt-4">
          <div class="card-header">Your Information</div>

            <div class="card-body">
              <div class="form-group">
                  <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Your Name">
                  @error('name')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="form-group">
                  <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                  @error('email')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div>
                  <button class="btn btn-dark" type="submit">Complete Survey</button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection