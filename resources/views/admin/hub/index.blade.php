@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Hub Management</h4>
            <a href="{{ route('admin.hub.create') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i> Add Hub
            </a>
        </div>

        <!-- Search -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('admin.hub.index') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control form-control-sm"
                            placeholder="Search hub..." value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                        <a href="{{ route('admin.hub.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- hub Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">All Hubs</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success text-center">
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:20%">Name</th>
                                <th style="width:20%">Phone</th>
                                <th style="width:20%">Location</th>
                                <th style="width:20%">Address</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hubs as $key => $hub)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $hub->name }}</td>
                                    <td>{{ $hub->phone }}</td>
                                    <td>{{ $hub->location }}</td>
                                    <td>{{ $hub->address }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.hub.toggle.status', $hub->id) }}"
                                            class="btn btn-sm btn-{{ $hub->status ? 'success' : 'danger' }}"
                                            title="Toggle Status">
                                            <i class="fas fa-check-circle"></i>
                                        </a>

                                        <a href="{{ route('admin.hub.edit', $hub->id) }}" class="btn btn-sm btn-info"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $hub->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal_{{ $hub->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel_{{ $hub->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog">
                                                <form action="{{ route('admin.hub.destroy', $hub->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $hub->id }}">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title text-white"
                                                                id="deleteModalLabel_{{ $hub->id }}">
                                                                Confirm Deletion
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the hub
                                                            <strong>{{ $hub->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Yes,
                                                                Delete</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-success text-center">
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:20%">Name</th>
                                <th style="width:20%">Phone</th>
                                <th style="width:20%">Location</th>
                                <th style="width:20%">Address</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $hubs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
