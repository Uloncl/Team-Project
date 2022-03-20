<x-app>
    admin panel
    <form method="POST" action="{{ route('admin.update') }}">
        @csrf
        <button type="submit" class="btn btn-primary" value="login">
            Update Database
        </button>
    </form>
</x-app>