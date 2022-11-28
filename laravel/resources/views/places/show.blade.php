@extends('layouts.box-app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="editpost">
    <img class="img-fluid" src="{{ asset('storage/'.$file->filepath) }}" title="Image preview"/>
    <table class="table">
            <tr>
                <td scope="col"><strong>ID<strong></td>
                <td>{{ $place->id }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.name') }}</strong></td>
                <td>{{ $place->name }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.description') }}</strong></td>
                <td>{{ $place->description }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.latitude') }}</strong></td>
                <td>{{ $place->latitude }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.longitude') }}</strong></td>
                <td>{{ $place->longitude }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.author_id') }}</strong></td>
                <td>{{ $author->name }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.created_at') }}</strong></td>
                <td>{{ $place->created_at }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.updated_at') }}</strong></td>
                <td>{{ $place->updated_at }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>{{ __('traduct.visibility_id') }}</strong></td>
                <td>{{ $visibility->name }}</td>
            </tr>
            <tr>
                <td scope="col"><strong>Favorites</strong></td>
                <td>{{ $favorites }} <i class="fa-solid fa-star"></i></td>
            </tr>
        </tbody>
    </table>

    <!-- Buttons -->
    <div class="container" style="margin-bottom:20px">
        <a class="btn" href="{{ route('places.index') }}" role="button">⬅️ {{ __('traduct.back') }}</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('traduct.sure') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $place->id }}</p>
                    <p>{{ _('This action cannot be undone!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="confirm" type="button" class="btn btn-primary">{{ __('traduct.confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
    @vite('resources/js/delete-modal.js')

@endsection
