<form action="{{ route('product.quick.update',$id) }}" method="POST">
  @csrf
  <button type="button" class="btn btn-rounded btn-success-rgba"> {{ $status == '1' ? 'Active' : 'Deactive' }}</button>
  
</form> 