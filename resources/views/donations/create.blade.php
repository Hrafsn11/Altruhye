@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Donation</h1>
        <form method="POST" action="{{ route('donations.store') }}">
            @csrf
            <div class="form-group">
                <label for="campaign_id">Campaign</label>
                <select class="form-control" name="campaign_id" id="campaign_id" required>
                    @foreach ($campaigns as $campaign)
                        <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="financial">Financial</option>
                    <option value="goods">Goods</option>
                    <option value="emotional">Emotional</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Donation</button>
        </form>
    </div>
@endsection
