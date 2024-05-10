<x-layout title="Modifica Articolo">
  <header class="header pt-5 articleCont">
    <div class="container-fluid">
      <div class="row justify-content-center align-content-center h-100 ">
        <div class="col-12 col-md-6 text-bg-light d-flex justify-content-center align-items-center">
          <h1 class="text-center text-bg-light p-2">MODIFICA ARTICOLO: {{$article->title}}</h1>
        </div>
      </div>
    </div>
  </header>
  
  {{-- Snippet per feedback positivo --}}
  <x-display-message/>
  
  {{-- Snippet per verificare errori --}}
  <x-display-error/>
  
  <div class="container mt-5 newArt">
    <div class="row mt-5 justify-content-center my-5">
      <div class="col-12 col-md-6">
        <form class="rounded-4 shadow bg-secondary-subtle  p-3 mb-5" action="{{route('article.update', compact('article'))}}" method="POST" enctype="multipart/form-data">
          
          {{--! enctype serve per inserire file nel form --}}
          
          @method('PUT') 
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Titolo articolo</label>
            <input name="title" type="text" class="form-control" id="title" value="{{$article->title}}">
          </div>
          <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo dell'articolo</label>
            <input name="subtitle" class="form-control" id="subtitle" value="{{$article->subtitle}}"></input>
          </div>
          
          <div class="mb-3">
            <label for="body" class="form-label">Corpo dell'articolo</label>
            <textarea name="body" class="form-control" id="body" >{{$article->body}}</textarea>
          </div>
          <div class="mb-3 ">
            <label for="img" class="form-label">Immagine attuale:</label>
            <img src="{{Storage::url($article->img)}}" alt="{{$article->img}}" width="300" >
          </div>
          <div class="mb-3 ">
            <label for="img" class="form-label">Inserisci immagina</label>
            <div class="d-flex ">
              <input name="img" type="file" class="form-control d-flex me-3" id="img" value="{{old('img')}}">
            </div>
          </div>
          <div class=" container mb-3">
            <div class="row">
              @foreach ($tags as $tag )
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault" name="tags[]" 
                  @if($article->tags->contains($tag)) checked @endif>
                  <label class="form-check-label" for="flexCheckDefault">
                    {{$tag->name}}
                  </label>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <button type="submit" class="btn mybtn mt-3">Salva</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>