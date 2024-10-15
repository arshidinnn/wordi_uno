@extends('layouts.index')

@section('title', __('Tasks'))


@section('content')
    <h2 class="my-4">Table with Filters and Search</h2>

    <!-- Filters and Search form -->
    <form class="row g-3 mb-4">
        <!-- Select Option -->
        <div class="col-md-4">
            <label for="filterSelect" class="form-label">Filter by Category</label>
            <select class="form-select" id="filterSelect">
                <option selected>Choose category</option>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
            </select>
        </div>

        <!-- Search Box -->
        <div class="col-md-6">
            <label for="searchInput" class="form-label">Search</label>
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Enter search query">
                <button class="btn btn-primary" type="button">Search</button>
            </div>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Item 1</td>
                <td>Category 1</td>
                <td>$10</td>
                <td>100</td>
                <td><button class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Item 2</td>
                <td>Category 2</td>
                <td>$20</td>
                <td>50</td>
                <td><button class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Item 3</td>
                <td>Category 3</td>
                <td>$15</td>
                <td>75</td>
                <td><button class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">{{ __('Add group') }}</a>
    </div>
@endsection
