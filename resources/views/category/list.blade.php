<table class="table table-bordered table-striped align-middle my-5">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Created_At</th>
    </tr>
    </thead>
    <tbody>

    @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td> {{ $category->user->name }}</td>
            <td>
                <a class="btn btn-sm btn-warning" href="{{ route('category.edit',$category->id) }}">
                    <i class="feather-edit"></i>Edit
                </a>
                <form class="d-inline" action="{{ route('category.destroy',$category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"><i class="feather-trash-2"></i>Delete</button>
                </form>
            </td>
            <td>
                <p class="mb-0 small"><i class="feather-calendar"></i>{{ $category->created_at->format('d m y') }}</p>
                <p class="mb0 small"><i class="feather-clock"></i>{{ $category->created_at->format('h m a') }}</p>
                {{ $category->created_at->diffForHumans() }}
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="5">There is no Category.</td>
        </tr>
    @endforelse
    </tbody>
</table>
{{ $categories->links() }}
