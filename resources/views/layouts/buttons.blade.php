<a href="{{ route($edit, $company) }}" class="btn btn-info btn-xs edit">Edit</a>
<form id="delete-form-{{ $company }}" method="post" action="{{ route($destroy, $company) }}" style="display: none">
    @csrf
    @method('DELETE')
</form>
<a class="btn btn-danger btn-xs edit" href="" onclick="
    if(confirm('Are you sure, You Want to delete this?'))
    {
    event.preventDefault();
    document.getElementById('delete-form-{{ $company }}').submit();
    }
    else{
    event.preventDefault();
    }" ><span class="glyphicon glyphicon-trash"></span>Delete</a>

