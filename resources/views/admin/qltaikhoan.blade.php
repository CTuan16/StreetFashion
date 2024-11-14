@extends('admin.dashboard')
@section('title')
    Quản Lý Tài Khoản
@endsection
@section('body')
@livewireStyles
<script>
  
    // function toggleEditForm(userId) {
    //     const form = document.getElementById('editForm-' + userId);
    //     if (form.style.display === 'none' || form.style.display === '') {
    //         form.style.display = 'table-row';
    //     } else {
    //         form.style.display = 'none';
    //     }
    // }
</script>
@livewire('user-admin')

@livewireScripts
 @endsection
                  