@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
@endsection

@section('content')
    
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>

            <form method="POST" action="/articles/{{$article->id}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="" class="label">Title</label>
                    <div class="control">
                        <input type="text" name="title" class="input" value="{{$article->title}}">
                    </div>
                </div>
                <div class="field">
                    <label for="" class="label">Excerpt</label>
                    <div class="control">
                        <textarea name="excerpt" class="textarea">{{$article->excerpt}}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="" class="label">Body</label>
                    <div class="control">
                        <textarea name="body" class="textarea">{{$article->body}}</textarea>
                    </div>
                </div>
                <input type="submit" value="SUBMIT" class="button is-link">
            </form>
        </div>
    </div>

@endsection