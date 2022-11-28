@extends('layouts.box-app')

@section('box-title')
    {{ __('Post') . " " . $post->id }}
@endsection

@section('box-content')
    <img class="img-fluid" src="{{ asset('storage/'.$file->filepath) }}" title="Image preview"/>
    <table class="table">
            <tr>
                <td scope="col">{{ __('traduct.body') }}</td>
                <td>{{ $post->body }}</td>
            </tr>
            <tr>
            <td scope="col">{{ __('traduct.latitude') }}</td>
                <td>{{ $post->latitude }}</td>
            </tr>
            <tr>
                <td scope="col">{{ __('traduct.longitude') }}</td>
                <td>{{ $post->longitude }}</td>
            </tr>
            <tr>
                <td scope="col">{{ __('traduct.author_id') }}</td>
                <td>{{ $author->name }}</td>
            </tr>
            <tr>
                <td scope="col">{{ __('traduct.created_at') }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <td scope="col">{{ __('traduct.updated_at') }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
            <tr>
                <td scope="col">{{ __('traduct.visibility_id') }}</td>
                <td>{{ $visibility->name }}</td>
            </tr>
            <tr>
                <td scope="col">Likes</td>
                <td>{{ $likes }} <i class="fa-solid fa-heart"></i></td>
            </tr>
        </tbody>
    </table>

    <!-- Buttons -->
    <div class="container" style="margin-bottom:20px">
        <a class="btn" href="{{ route('posts.index') }}" role="button">⬅️ {{ _('Back to list') }}</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ _('Are you sure?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $post->id }}</p>
                    <p>{{ _('This action cannot be undone!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="confirm" type="button" class="btn btn-primary">{{ _('Confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/delete-modal.js')

@endsection
