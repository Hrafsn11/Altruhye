@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Campaign</h1>
        <form method="POST" action="{{ route('campaigns.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="financial">Financial</option>
                    <option value="goods">Goods</option>
                    <option value="emotional">Emotional</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Campaign</button>
        </form>
    </div>
@endsection
