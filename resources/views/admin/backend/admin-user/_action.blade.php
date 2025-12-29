<x-edit-button href="{{ route('admin-user.edit', $user->id) }}" class="btn btn-icon btn-sm btn-info">
    <i class="ti ti-edit"></i>
</x-edit-button>

<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn" data-url="{{ route('admin-user.destroy',$user->id) }}" style="background-color: red">
    <i class="ti ti-trash"></i>
</x-delete-button>